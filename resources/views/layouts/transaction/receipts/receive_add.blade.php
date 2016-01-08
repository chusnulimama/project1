@extends('layouts.master')
@section('content')

    <h3>Tambah Pembelian Barang</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <form action="{{url('/receive/create')}}" method="POST" class="form-horizontal" >
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"><h4>Nama Pemasok *</h4></label>
                        <div class="col-sm-3">
                            <select name="supp[]" class="form-control" required>
                                <option value="">Pilih Pemasok</option>
                                @foreach($supps as $supp)
                                    <option value="{{$supp->id}}">{{$supp->detail_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"><h4>Buku</h4></label>
                        <div class="col-sm-3">
                            <select name="book[]" class="form-control">
                                <option value="">Pilih Buku</option>
                                @foreach($books as $book)
                                    <option value="{{$book->isbn}}">{{$book->name}} || {{$book->author}} || {{$book->publisher}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button class="btn-default btn-sm">Tambah Daftar</button>
                            <button class="btn-default btn-sm">Hapus Daftar</button>
                        </div>
                    </div>

                    <table class="table table-striped table-advance table-hover table-bordered">
                        <hr>
                        <thead>
                        <tr>
                            <th style="text-align: center">#</th>
                            <th style="text-align: center">Judul Buku</th>
                            <th style="text-align: center">Kuantitas</th>
                            <th style="text-align: center">Harga Satuan (Supplier)</th>
                            <th style="text-align: center;">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center"><input type="checkbox"></td>
                                <td class="col-md-4">
                                    <input type="text" class="form-control" disabled>
                                </td>
                                <td class="col-md-1">
                                    <input type="text" class="form-control">
                                </td>
                                <td class="col-md-3">
                                    <div class="input-group">
                                        <div class="input-group-addon">Rp</div>
                                        <input type="text" class="form-control" style="text-align: right">
                                    </div>
                                </td>
                                <td class="col-md-3">
                                    <div class="input-group">
                                        <div class="input-group-addon">Rp</div>
                                            <input type="text" class="form-control col-md-3" style="text-align: right" disabled>
                                    </div>
                                </td>
                            </tr>
                        <tr>
                            <th colspan="4" style="text-align: right">Grand Total</th>
                            <td class="col-md-3">
                                <div class="input-group">
                                    <div class="input-group-addon">Rp</div>
                                    <input type="text" class="form-control col-md-3" style="text-align: right" disabled>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <a href="{{url('/receive')}}" class="btn btn-warning">Batal</a>
                            <button type="submit" class="btn btn-default">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection