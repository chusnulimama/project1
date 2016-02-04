@extends('layouts.master')
@section('content')

    <div class="mt">
        <div class="content-panel">
            <div class="wrapper">
                <form action="{{url('/report/sale/print/',$sales->transaction_id)}}">
                    <h4 style="text-align: center">Bukti Transaksi Penjualan Barang</h4>
                    <h5 style="text-align: center">Toko Buku</h5>
                    <h5 style="text-align: center">IBOE Mitra Media</h5>
                    <hr>
                    <table class="col-md-12">
                        <thead>
                        <tr>
                            <th class="col-md-2">
                                <h5>No. Faktur</h5>
                                <h5>Pelanggan</h5>
                            </th>
                            <th class="col-md-10">
                                <h5>: {{$sales->transaction_id}}</h5>
                                <h5>: {{$sales->user_id}}</h5>
                            </th>
                        </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered table table-responsive">
                        <thead>
                        <tr>
                            <th style="text-align: center">Judul Buku</th>
                            <th style="text-align: center">Jumlah</th>
                            <th style="text-align: center">Harga</th>
                            <th style="text-align: center">Total</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($sales->trans_detail()->get() as $sale)
                            <tr>
                                <td>{{$sale->book_id}}</td>
                                <td>{{$sale->qty}}</td>
                                <td style="text-align: right">{{$sale->price}}</td>
                                <td style="text-align: right">{{$sale->subtotal}}</td>
                            </tr>
                        </tbody>
                        @endforeach
                        <tfoot>
                        <th colspan="3" style="text-align: right">TOTAL</th>
                        <th class="col-md-3">
                            <div class="input-group">
                                <div class="input-group-addon">Rp</div>
                                <input type="text" class="form-control col-md-3" name="transaction[total]" value="{{$sales->total}}" style="text-align: right" readonly>
                            </div>
                        </th>
                        </tfoot>
                    </table>
                    <div style="text-align: right">
                        <label for="">Surabaya, {{$today}}</label><br><br><br><br>
                        <label for="">{{$sale->user_id}}</label>
                    </div>
                    <button type="button" class="btn btn-default hidden-print" onclick="window.print()">Cetak <i class="fa fa-print"></i></button>
                    {{--<a href="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print--}}

                    {{--</a>--}}
                </form>
            </div>
        </div>
    </div>
@endsection