@extends('layouts.master')
@section('content')
    
    <h3>Laporan Transaksi Penerimaan Barang</h3>

    <form action="{{url('/report/receive'.$report->id)}}" method="post">
        <fieldset>
            <div class="row">
                <div class="form-group">
                    <label for="dtp-input2" class="col-sm-1 control-label">Tanggal</label>
                    <div class="input-group input-group-sm date input-datarange col-md-5" data-provide="datepicker">
                    {{--<div class="input-group date form-inputdate col-md-5">--}}
                        <input type="text" class="form-control" name="from" value="">
                        <span class="input-group-addon">sampai</span>
                        <input type="text" class="form-control" name="until" value="">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <button type="submit" class="btn btn-default btn-sm">Tampilkan</button>
                    </div>
                    <input type="hidden" id="dtp-input2" value=""/>
                </div>
            </div>
        </fieldset>
    </form>

    <div class="col-md-12">
        <div class="content-panel">
            <div class="wrapper">
                <table class="table table-striped table-advance table-hover table-bordered">
                    <thead>
                    <tr class="heading">
                        <th style="text-align: center">#</th>
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
                    @foreach($report as $data)
                        <tr>no</tr>
                        <tr>{{$data->date_trans}}</tr>
                        <tr>{{$data->transaction_id}}</tr>
                        <tr>{{$data->user_id}}</tr>
                        <tr>{{$data->$data(is_object($this->trans_detail)) ? $this->trans_detail->book_id : ''}}</tr>
                        <tr>{{$data->$data(is_object($this->trans_detail)) ? $this->trans_detail->qty : ''}}</tr>
                        <tr>{{$data->$data(is_object($this->trans_detail)) ? $this->trans_detail->price : ''}}</tr>
                        <tr>{{$data->$data(is_object($this->trans_detail)) ? $this->trans_detail->subtotal : ''}}</tr>
                    @endforeach
                    </tbody>
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
