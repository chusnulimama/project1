@extends('layouts.master')
@section('content')

    <h3>Data Pembelian Barang</h3>
    <a href="{{url('/receive/create')}}" class="btn btn-success btn-lg" role="button"><i class="fa fa-plus-circle"></i>  Tambah</a>
    @if(Session::has('message'))
        {!! Session::get('message') !!}
    @endif

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>No.Faktur</th>
                        <th>Supplier</th>
                        <th>Tanggal Masuk</th>
                        <th class="centered">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>no</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="centered">
                            <a href="{{url('/receive/view/')}}" class="btn btn-primary btn-xs" role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>
                            <a href="{{ url('/receive/edit/') }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="{{url('/receive/destroy/')}}" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection