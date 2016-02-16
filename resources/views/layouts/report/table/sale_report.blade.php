@extends('layouts.master')
@section('content')

    <h3>Laporan Transaksi Penjualan Barang</h3>

    <form class="form-inline mb" action="{{url('/report/sale')}}" >
        {{--<fieldset>--}}
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
            <div class="wrapper">
                <table class="table table-striped table-advance table-hover table-bordered">
                    <thead>
                    <tr class="heading">
                        <th style="text-align: center">Tanggal</th>
                        <th style="text-align: center">ID Transaksi</th>
                        <th style="text-align: center">Pelanggan</th>
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
                            <td>{{ $data->qty}}</td>
                            <td style="text-align: right;">{{ number_format($data->price) }}</td>
                            <td style="text-align: right">{{ number_format($total) }}</td>
                            {{-- */$grand = $grand + $total;/* --}}
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6" style="text-align: right"><h4>TOTAL</h4></td>
                        <td style="text-align: right;"><h4>Rp {{ number_format($grand) }}</h4></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    @parent
    <script type="text/javascript">
        $(document).ready(function(){
            $('.form_date').datetimepicker({
                format: 'mm/dd/yyyy',
            });
        });
    </script>
@endsection

