@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Penerbit</h3>

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb">Ubah Data Penerbit</h4>

                <form class="form-horizontal style-form" action="{{url('/publisher/update/'.$user->id)}}" method="post">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">No. Penerbit</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="user[username]" value="{{old('user.username', $user->username)}}">
                            <input type="hidden" class="form-control" name="user[password]" value="1234">
                            <input type="hidden" class="form-control" name="roles[]" value="id_Publish">

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
                        <label for="" class="col-sm-2 control-label">No. Telepon</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[phone]" value="{{old('detail.phone', $user->detail_phone)}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">No. Fax</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[fax]" value="{{old('detail.fax', $user->detail_fax)}}">
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
                            <a href="{!! URL::to('/publish') !!}" class="btn btn-warning">Batal</a>
                            <input type="submit" name="btn_simpan" value="Simpan" class="btn btn-default">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop