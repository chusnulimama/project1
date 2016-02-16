@extends('layouts.master')
@section('content')

    <form class="form-inline mb range" action="{{url('/report/receive')}}" >
        {{--<fieldset>--}}
        <h3>Laporan Transaksi Penerimaan Barang</h3>
        <div class="form-group">
            <label for="dtp-input2" class="control-label">Tanggal</label>
            <input type="text" class="form-control" name="from" value="{{ $from }}">
        </div>
        <div class="form-group">
            <label>sampai</label>
            <div class="input-group">
                <input type="text" class="form-control" name="until" value="{{ $until }}">
                <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
            </div>

        </div>

        <button type="submit" class="btn btn-default btn-sm">Tampilkan</button>
        {{--</fieldset>--}}
    </form>

    <div class="col-md-12">
        <div class="content-panel">
            <div class="padding-10">
                <h4 style="text-align: center">Toko Buku</h4>
                <h4 style="text-align: center">IBOE Mitra Media</h4>
                <h4 style="text-align: center">Laporan Rekapitulasi Transaksi Pembelian Barang</h4>
                <h5 style="text-align: center">{{$from}} s.d {{$until}}</h5>
                <h6 style="text-align: right">Cetak : {{$today}}</h6>
                <hr>
                <table class="table table-striped table-advance table-hover table-bordered">
                    <thead>
                    <tr class="heading">
                        <th style="text-align: center">Tanggal</th>
                        <th style="text-align: center">ID Transaksi</th>
                        <th style="text-align: center">Pemasok</th>
                        <th style="text-align: center">Buku</th>
                        <th style="text-align: center">Jumlah</th>
                        <th style="text-align: center">Harga</th>
                        <th style="text-align: center">Sub-Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--*/$grand = 0;/*--}}
                    @foreach($report as $data)
                        {{--*/$total = $data->subtotal;/*--}}
                        <tr>
                            <td>{{ $data->master->date_trans}}</td>
                            <td>{{ $data->master->transaction_id}}</td>
                            <td>{{ $data->master->user->detail->name}}</td>
                            <td>{{ $data->book->name}}</td>
                            <td style="text-align: right">{{ $data->qty}}</td>
                            <td style="text-align: right">{{ number_format($data->price) }}</td>
                            <td style="text-align: right">{{ number_format($total) }}</td>
                        </tr>
                        {{-- */$grand = $grand + $total;/* --}}
                    </tbody>
                    @endforeach
                    <tfoot>
                    <tr>
                        <td colspan="6" style="text-align: right"><h4>TOTAL</h4></td>
                        <td style="text-align: right;"><h4>Rp {{ number_format($grand) }}</h4></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <br>
        <button type="button" class="btn btn-default hidden-print" onclick="window.print()">Cetak <i class="fa fa-print"></i></button>
    </div>

@endsection

