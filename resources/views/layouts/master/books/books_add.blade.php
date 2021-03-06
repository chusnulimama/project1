@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Buku</h3>

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb">Input Data Buku</h4>

                <form action="{{url('/book/create')}}" method="POST" class="form-horizontal style-form" enctype="multipart/form-data">
                    <div class="form-group {{$errors->has('book.ISBN') ? 'has-error' : ''}}">
                        <label for="" class="col-sm-2 control-label">ISBN</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="book[ISBN]" value="{{old('book.ISBN')}}">
                            {!! $errors->first('book.ISBN', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Judul Buku</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="book[name]" value="{{old('book.name')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-3">
                            {{--<input type="text" class="form-control" name="book[category]" value="{{old('book.category')}}">--}}
                            <select class="form-control chosen" name="book[category]" value="{{old('book.category')}}" data-placeholder="Pilih Kategory" tabindex="1">
                                <option value="">Pilih Kategori Jenis Buku</option>
                                <option value="sastra">Bahasa</option>
                                <option value="comp">Teknologi</option>
                                <option value="sains">Ilmu Pengetahuan Alam</option>
                                <option value="school">Pelajaran Sekolah</option>
                                <option value="lks">Lembar Kerja Siswa</option>
                                <option value="healty">Kesehatan</option>
                                <option value="import">Text Books</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Penulis</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="book[author]" value="{{old('book.author')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Penerbit</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="book[publisher]" value="{{old('book.publisher')}}">
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label for="" class="col-sm-2 control-label">Pemasok</label>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<select name="book[publisher]" class="form-control">--}}
                                {{--<option value="">Pilih Pemasok</option>--}}
                                {{--@foreach($suppliers as $supplier)--}}
                                    {{--<option value="{{$supplier->id}}">{{$supplier->name}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Tahun Terbitan Buku</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="book[release]" value="{{old('book.release')}}">
                            <input type="hidden" class="form-control" name="book[stock]" value="0">
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
                            <a href="{!! URL::to('/book') !!}" class="btn btn-warning">Batal</a>
                            <button type="submit" class="btn btn-default">Simpan</button>
                            {{--<input type="submit" name="btn_simpan" value="Simpan" class="btn btn-default">--}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection