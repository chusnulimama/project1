@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right">Data Master Karyawan</i></h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4>Daftar Karyawan</h4>
                    <h6><a href="{!! URL::to('/employee/create') !!}" class="btn btn-primary btn-xs" role="button"></a></h6>
                    <hr>
                    <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>No.Telepon</th>
                        <th>E-mail</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th>Note</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{!! URL::to('/employee#myModal') !!}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                            <button class="btn btn-xs btn-primary"><a href="{!! URL::to('/employee/edit') !!}"><i class="fa fa-pencil"></i></a></button>
                            <button class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modalfade">
                <div class="modal-dialog">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Karyawan</h4>
                    </div>
                    <div class="modal-body">
                        <h5>Nama Karyawan</h5>
                        <p>Jabatan : ...</p>
                        <p>Alamat, Kota : ..../....</p>
                        <p>No. Telepon : ...</p>
                        <p>E-mail : ...</p>
                        <p>Note : ...</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{!! URL::to('/employee') !!}" class="btn btn-default" role="button">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop