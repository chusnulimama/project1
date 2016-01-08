@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Pelanggan</h3>

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb">Ubah Data Pelanggan</h4>

                <form action="{{url('/customer/update/'.$user->id)}}" method="post" class="form-horizontal style-form">
                    <div class="form-group {{$errors->has('user.username') ? 'has-error' : ''}}">
                        <label for="" class="col-sm-2 control-label">No Pelanggan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="user[username]" value="{{old('user.username', $user->username)}}">
                            <input type="hidden" class="form-control" name="user[password]" value="1234">
                            <input type="hidden" class="form-control" name="roles[]" value="id_Cust">
                            {!! $errors->first('user.username', '<p class="help-block"> :message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[name]" value="{{old('detail.name', $user->detail_name)}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[address]" value="{{old('detail.address', $user->detail_address)}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Kota</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[city]" value="{{old('detail.city', $user->detail_city)}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">No Telepon</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[phone]" value="{{old('detail.phone', $user->detail_phone)}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="user[email]" value="{{old('user.email', $user->email)}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="detail[note]" value="{{old('detail.note', $user->detail_note)}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <a href="{!! URL::to('/customer') !!}" class="btn btn-warning">Batal</a>
                            <input type="submit" name="btn_update" value="Simpan" class="btn btn-default">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop