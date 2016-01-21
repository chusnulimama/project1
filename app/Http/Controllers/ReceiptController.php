<?php

namespace App\Http\Controllers;

use App\Book;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use App\Jobs\Transaction\CreateTransaction;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts = Transaction::type('Receive')->paginate(5);

        return view('/layouts/transaction/receipts/receive', ['receipts' => $receipts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $today = date("d M Y");
        $supps = User::whereHas('roles', function($query){
            $query->where('description', 'Supplier');
        })->get();
        $books = Book::all();
        return view('layouts.transaction.receipts.receive_add')->with('supps', $supps)->with('books', $books)->with('today', $today);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//            $this->dispatch(new CreateTransaction($request));
          try{
            $this->dispatch(new CreateTransaction($request));
        } catch(\Exception $msgerror){
            dd($msgerror->getMessage());
        }

        return redirect()->route('receive');
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
        $today = date("d M Y");
        $supps = User::whereHas('roles', function($query){
            $query->where('description', 'Supplier');
        })->get();
        $books = Book::all();

        return view('layouts.transaction.receipts.receive_edit', [
            'today' => $today,
            'supps' => $supps,
            'books' => $books,
            'transaction' => $transaction
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
        return redirect()->route('receive');
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
}
