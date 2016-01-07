@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Karyawan</h3>

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb">Ubah Data Karyawan</h4>

                <form action="{{url('/employee/update/'.$user->id)}}" method="post" class="form-horizontal style-form">
                    <div class="form-group {{$errors->has('user.username') ? 'has-error' : ''}}">
                        <label for="" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="user[username]" value="{{old('user.username', $user->username)}}">
                            {!! $errors->first('user.username', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('detail.name') ? 'has-error' : ''}}">
                        <label for="" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[name]" value="{{old('detail.name', $user->detail_name)}}">
                            {!! $errors->first('detail.name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Jabatan</label>
                        <div class="col-sm-3">
                            <select name="roles[]" class="form-control">
                                <option value="">Pilih Jenis Jabatan</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ array_key_exists($role->id ,$user->roles->keyBy('id')->all() ) ? ' selected' : ''}}>{{ $role->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('user.email') ? 'has-errors' : ''}}">
                        <label for="" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" name="user[email]" value="{{old('user.email', $user->email)}}">
                            {!! $errors->first('user.email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('user.password') ? 'has-errors' : ''}}">
                        <label for="" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="user[password]" value="{{old('user.password', $user->password)}}">
                            {!! $errors->first('user.password', '<p class="help-block">:message</p>') !!}
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
                        <label for="" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[note]" value="{{old('detail.note', $user->detail_note)}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <a href="{!! URL::to('/employee') !!}" class="btn btn-warning">Batal</a>
                            <input type="submit" name="btn_update" value="Simpan" class="btn btn-default" >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection