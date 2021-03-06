@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Role</h3>

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb">Menambahkan Data Role</h4>

                <form action="{{url('/role/create')}}" method="post" class="form-horizontal style-form">
                    <div class="form-group {{$errors->has('role') ? 'has-error' : ''}}">
                        <label for="" class="col-sm-2 control-label">Nama Jabatan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="role[name]" value="{{old('role.name')}}">
                            {!! $errors->first('role.name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="role[description]" value="{{old('role.description')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <a href="{!! URL::to('/role') !!}" class="btn btn-warning">Batal</a>
                            <button type="submit" class="btn btn-default">Simpan</button>
                            {{--<input type="submit" name="btn_simpan" value="Simpan" class="btn btn-default">--}}
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @endsection