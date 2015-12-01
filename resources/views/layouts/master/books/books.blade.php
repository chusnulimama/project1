@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Buku</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4>Daftar Buku</h4>
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
                        <th>Stok Barang</th>
                        <th width="146">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="#myModal" class="btn btn-primary btn-xs" role="button" data-toggle="modal"><i class="fa fa-eye"></i></a>
                        {{--<button class="btn btn-success btn-xs"><a href="{!! URL::to('/book#myModal') !!}"><i class="fa fa-eye"></i></a></button>--}}
                        <button class="btn btn-warning btn-xs"><a href="{!! URL::to('/book/edit') !!}"><i class="fa fa-pencil"></i></a></button>
                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                    </td>
                    </tbody>
                </table>
            </div>
            <div role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal" aria-label="true"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Detail Buku</h4>
                        </div>
                        <div class="modal-body">
                            <h5>Judul Buku ***</h5>
                            <img src="" alt=""> <!--memunculkan gambar cover-->
                            <p>Tahun ***</p>
                            <p>Kategori Buku ***</p>
                            <p>Penulis/Penerbit/Pemasok : ***/***/***</p>
                            <p>Harga/Stok : ***/***</p>
                        </div>
                        <div class="modal-footer">
                            <a href="{!! URL::to('/book') !!}" class="btn btn-default" role="button">Ok</a>
                            {{--<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">--}}
                            {{--<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop