@extends('layouts.master')
@section('content')

    <h3>Data Master Buku</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <form action="{{url('/receive/edit/')}}" method="POST" class="form-horizontal" >
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"><h4>No.Faktur *</h4></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="" value="" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"><h4>Supplier *</h4></label>
                        <div class="col-sm-3">
                            <select name="" class="form-control">
                                <option value="">Pilih Supplier</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"><h4>Buku</h4></label>
                        <div class="col-sm-3">
                            <select name="" class="form-control">
                                <option value="">Pilih Buku</option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div>
                            <button class="btn-default btn-sm">Tambah Daftar</button>
                            <button class="btn-default btn-sm">Hapus Daftar</button>
                        </div>
                    </div>

                    <table class="table table-striped table-advance table-hover">
                        <hr>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul Buku</th>
                            <th>Kuantitas</th>
                            <th>Harga Satuan (Supplier)</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <a href="" class="btn btn-warning">Batal</a>
                            <button type="submit" class="btn btn-default">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection