<?php

namespace App\Http\Controllers;

use App\Book;
use App\Jobs\Transaction\CreateTransaction;
use App\Jobs\Transaction\UpdateTransaction;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Transaction::type('Sale')->paginate(5);
        return view('/layouts/transaction/sales/sale', ['sales' => $sales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = date('d M Y');
        $books = Book::where('stock', '!=', 0)->get();
        $custs = User::whereHas('roles', function($query){
           $query->where('description', 'Customer');
        })->get();

        return view('/layouts/transaction/sales/sale_add')->with('books', $books)->with('custs', $custs)->with('date', $date);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $book)
    {
//        if($book->stock < 1 )
//        {
//            throw new \Exception('Stok Buku tidak mencukupi! Silahkan periksa stok Buku yg tersedia');
//        }

        try{
            $this->dispatch(new CreateTransaction($request));
        } catch(\Exception $msgerror){
            dd($msgerror->getMessage());
        }

        return redirect()->route('sale');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $books = Book::where('stock', '!=', 0)->get();
        $custs = User::whereHas('roles', function($query){
            $query->where('description', 'Customer');
        })->get();

        return view('/layouts/transaction/sales/sale_edit', [
            'custs' => $custs,
            'books' => $books,
            'transaction' => $transaction,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        try{
            $this->dispatch(new UpdateTransaction($transaction, $request));
        } catch(\Exception $msgerror){
            dd($msgerror->getMessage());
        }
        return redirect()->route('sale');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function modal(Transaction $sales)
    {
        return view('layouts.master.modal.sale', ['sales'=>$sales]);
    }

    public function faktur(Transaction $sales)
    {
        $today = date('d M Y');
        return view('layouts.report.print.faktur.sale_print', ['sales'=>$sales])->with('today', $today);
    }
}
