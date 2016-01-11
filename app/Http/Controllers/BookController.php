<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Jobs\Book\CreateBook;
use App\Jobs\Book\UpdateBook;
use App\Http\Requests\Book\CreateRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::table('books')->paginate(5);
        $books =
            [
              'books' => $books
            ];
        return view('/layouts/master/books/books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/layouts/master/books/books_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        try {
            $this->dispatch(new CreateBook($request));
        } catch (\Exception $msgerror){
            dd($msgerror->getMessage());
        }

        Session::flash('message', 'Data berhasil ditambahkan');
        return redirect()->route('book');
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
    public function edit($id)
    {
        $book = Book::find($id);
        return view('/layouts/master/books/books_edit')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

//    public function update(Book $book, Request $request)
//    {
//        try{
//            $this->dispatch(new UpdateBook($request, $book));
//        } catch(\Exception $msgerror){
//            dd($msgerror->getMessage());
//        }
//        return redirect()->route('book.update');
//    }

    public function update($id, Request $request)
    {
        $book = Book::find($id);
        try{
            $this->dispatch(new UpdateBook($request, $book));
        } catch(\Exception $msgerror){
            dd($msgerror->getMessage());
        }

        Session::flash('message', 'Data Berhasil diperbaharui');
        return redirect()->route('book');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
        Session::flash('message', 'Data berhasil dihapus');
        return redirect()->route('book');
    }

    public function modal($id)
    {
        $book = Book::find($id);

        if(! $book instanceof Book  ) abort(404);

        return view('layouts.master.modal.book', ['book'=> $book]);
    }

    public function addSale($id)
    {
        $book = Book::find($id);

        if (! $book instanceof Book) return response()->json([], 400);

        return view('layouts.master.partial.book', [ 'book' => $book]);
    }

    public function addReceive($id)
    {
        $book = Book::find($id);

        if (! $book instanceof Book) return response()->json([], 400);

        return view('layouts.master.partial.book_receive', [ 'book' => $book]);
    }
}