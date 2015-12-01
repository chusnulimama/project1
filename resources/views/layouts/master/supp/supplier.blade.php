@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right">Data Master Pemasok</i></h3>
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4><i class="fa fa-angle-right"></i>Daftar Pemasok</h4>
                    <hr>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemasok</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>No.Telepon</th>
                        <th>E-mail</th>
                        <th>No.Fax</th>
                        <th>Note</th>
                        <th>Aksi</th>
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
                    <td></td>
                    <td>
                        <button class="btn btn-success btn-xs"><i class="fa fa-th-list"></i></button>
                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                    </td>
                    </tbody>
                </table>
            </div>
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modalfade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail Pemasok</h4>
                        </div>
                        <div class="modal-body">
                            <h5>Nama Pemasok : ...</h5>
                            <p>Alamat, Kota : .../...</p>
                            <p>No Telepon/Fax : .../...</p>
                            <p>E-mail : ...</p>
                            <p>Note : ...</p>
                        </div>
                        <div class="modal-footer">
                            <a href="{!! URL::to('/supp') !!}" class="btn btn-default" role="button">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop