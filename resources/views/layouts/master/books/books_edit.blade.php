@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Buku</h3>

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i>Mengubah Data Buku</h4>

                <form method="post" action="{{route('book.update',$book->id)}}" class="form-horizontal style-form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">ISBN</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="book[ISBN]" value="{{$book->ISBN}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Judul Buku</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="book[name]" value="{{$book->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Penulis</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="book[author]" value="{{$book->author}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Penerbit</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="book[publisher]" value="{{$book->publisher}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Pemasok</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="book[supplier]" value="{{$book->supplier}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Tahun Terbitan Buku</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="book[release]" value="{{$book->release}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Jumlah</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="book[stock]" value="{{$book->stock}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Cover</label>
                        <div class="col-sm-5">
                            <input type="file" name="book[cover]" value="{{$book->cover}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <a href="{!! URL::to('/book') !!}" class="btn btn-warning">Batal</a>
{{--                            <a href="{{url('/book/update/'.$book->id)}}" class="btn btn-default">Simpan</a>--}}
                            <button type="submit" class="btn btn-default">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection