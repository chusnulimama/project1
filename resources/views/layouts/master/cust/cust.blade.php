@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Pelanggan</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4>Daftar Pelanggan</h4>
                    <h6><a href="{!! URL::to('/cust/create') !!}" class="btn btn-primary btn-xs" role="button"></a></h6>
                    <hr>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>No. Telepon</th>
                        <th>E-mail</th>
                        <th>Note</th>
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
                    <td></td>
                    <td>
                        <a href="{!! URL::to('/cust#myModal') !!}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                        <button class="btn btn-xs btn-primary"><a href="{!! URL::to('/cust/edit') !!}"></a><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button>

                    </td>
                    </tbody>
                </table>
            </div>
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modalfade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail Pelanggan</h4>
                        </div>
                        <div class="modal-body">
                            <h5>Nama Pelanggan</h5>
                            <p>Alamat, Kota : ***, ***</p>
                            <p>No Telepon : ***</p>
                            <p>E-mail : ***</p>
                            <p>Note : ***</p>
                        </div>
                        <div class="modal-footer">
                            <a href="{!! URL::to('/cust') !!}" class="btn btn-default" role="button"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop