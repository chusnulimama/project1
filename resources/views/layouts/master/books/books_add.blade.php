@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Buku</h3>

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb">Input Data Buku</h4>

                <form class="form-horizontal style-form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">ISBN</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="book[isbn]" value="{{old('book.isbn')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Judul Buku</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="book[title]" value="{{old('book.title')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="book[cat]" value="{{old('book.cat')}}">
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
                            <input type="text" class="form-control" name="book[pub]" value="{{old('book.pub')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Pencetak</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="book[supp]" value="{{old('book.supp')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Tahun Terbitan Buku</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="book[realese]" value="{{old('book.realese')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Jumlah</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="book[total]" value="{{old('book.total')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Cover</label>
                        <div class="col-sm-5">
                            <input type="file" name="book[cover]" value="{{old('book.cover')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <a href="{!! URL::to('/book') !!}" class="btn btn-warning">Batal</a>
                            <input type="submit" name="btn_simpan" value="Simpan" class="btn btn-default">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop