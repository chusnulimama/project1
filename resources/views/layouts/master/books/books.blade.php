@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Buku</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4>Daftar Buku</h4>
                    @if(Session::has('message'))
                        {!! Session::get('message') !!}
                    @endif

                    <h6><a href="{!! URL::to('/book/create') !!}" class="btn btn-primary btn-xs" role="button">Tambah</a></h6>
                    {{--<p><a href="#" class="btn btn-primary" role="button">Tambah Buku</a></p>--}}
                    <hr>
                    <thead>
                    <tr>
                        <th>>ISBN</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Pemasok</th>
                        <th class="text-right">Stok Barang</th>
                        <th class="centered">Cover Buku</th>
                        <th width="150" class="centered">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{$book->ISBN}}</td>
                            <td>{{$book->name}}</td>
                            <td>{{$book->author}}</td>
                            <td>{{$book->publisher}}</td>
                            <td>{{$book->supplier}}</td>
                            <td class="text-right">{{$book->stock}}</td>
                            <td class="centered"><img src="{{asset('img/'.$book->cover.'.jpg')}}" height="35" width="30"></td>
                            <td class="centered">
                                <a href="{{url('/book/view/'. $book->id)}}" class="btn btn-primary btn-xs" role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>
                                {{--<button class="btn btn-success btn-xs"><a href="{!! URL::to('/book#myModal') !!}"><i class="fa fa-eye"></i></a></button>--}}
                                <button class="btn btn-warning btn-xs"><a href="{{ url('/book/edit/'.$book->id) }}"><i class="fa fa-pencil"></i></a></button>
                                <form action="{{url('/book/destroy/'.$book->id)}}" method="POST" >
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <button type="submit" class="btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                                </form>



                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop