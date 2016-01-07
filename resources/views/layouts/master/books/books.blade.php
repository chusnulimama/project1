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

                    <h6><a href="{{url('/book/create')}}" class="btn btn-primary btn-xs" role="button">Tambah</a></h6>
                    <hr>
                    <thead>
                    <tr>
                        <th>ISBN</th>
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
                    @forelse($books as $book)
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
                                <a href="{{ url('/book/edit/'.$book->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                <a href="{{url('/book/destroy/'.$book->id)}}" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="12">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <form action="" id="formDelete" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>
            </div>
            <div role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @parent
    <script type="text/javascript">
        $(document).ready(function(){
            //target link delete ketika di click
            $('a.btn-delete').on('click', function(e){
//                block default action ke href
                e.preventDefault();

                //ambil form delete
                var form = $("#formDelete");

                //ganti form action attribute dengan a href attribute
                form.attr('action', $(this).attr('href'));

                //submit form
                form.submit();
            });
        });
    </script>
    @endsection