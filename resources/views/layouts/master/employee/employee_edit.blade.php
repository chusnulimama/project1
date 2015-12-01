@extends('layouts.master)
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Karyawan</h3>

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i>Input Data Karyawan</h4>

                <form class="form-horizontal style-form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">NIK</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Jabatan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Kota</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">No. Telepon</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <a href="{!! URL::to('/employee') !!}" class="btn btn-warning">Batal</a>
                            <input type="submit" name="btn_update" value="Simpan" class="btn btn-default" >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop