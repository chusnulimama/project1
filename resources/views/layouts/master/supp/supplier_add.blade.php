@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Pemasok</h3>

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb">Tambah Data Pemasok</h4>

                <form class="form-horizontal style-form" action="{{url('/supplier/create')}}" method="post">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[name]" value="{{old('detail.name')}}">
                            <input type="hidden" class="form-control" name="user[username]" value="SUPP.0">
                            <input type="hidden" class="form-control" name="user[password]" value="1234">
                            <input type="hidden" class="form-control" name="roles[]" value="3">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[address]" value="{{old('detail.address')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Kota</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[city]" value="{{old('detail.city')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">No. Telepon</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[phone]" value="{{old('detail.phone')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="user[email]" value="{{old('user.email')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">No. Fax</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[fax]" value="{{old('detail.fax')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="detail[note]" value="{{old('detail.note')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <a href="{!! URL::to('/supplier') !!}" class="btn btn-warning">Batal</a>
                            <input type="submit" name="btn_simpan" value="Simpan" class="btn btn-default">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop