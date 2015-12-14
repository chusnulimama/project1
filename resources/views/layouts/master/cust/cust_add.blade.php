@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Pelanggan</h3>

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb">Input Data Pelanggan</h4>

                <form class="form-horizontal style-form" action="{{url('/customer/create')}}" method="post">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="cust[name]" value="{{old('cust.name')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Nama</label>
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
                        <div class="col-sm-3">
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <a href="{!! URL::to('/cust') !!}" class="btn btn-warning">Batal</a>
                            <input type="submit" name="btn_simpan" value="Simpan" class="btn btn-default">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection