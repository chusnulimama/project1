@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Pengguna</h3>

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb">Mengubah Akun Pengguna</h4>

                <form action="{{ route('user.update', $user->id) }}" method="POST" class="form-horizontal style-form">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="user[username]" value="{{$user->username}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Nama Lengkap</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[name]" value="{{$detail->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" name="user[email]" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="user[password]" value="{{$user->password}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[address]" value="{{$detail->address}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Kota</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[city]" value="{{$detail->city}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">No.Telepon</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="detail[phone]" value="{{$detail->phone}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">No.Fax</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="detail[fax]" value="{{$detail->fax}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="detail[note]" value="{{$detail->note}}">
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                    {{--<label for="" class="col-sm-2 control-label">Cover</label>--}}
                    {{--<div class="col-sm-5">--}}
                    {{--<input type="file" name="book[cover]" value="{{old('book.cover')}}">--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <a href="{!! URL::to('/user') !!}" class="btn btn-warning">Batal</a>
                            <button type="submit" class="btn btn-default">Simpan</button>
                            {{--<input type="submit" name="btn_simpan" value="Simpan" class="btn btn-default">--}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection