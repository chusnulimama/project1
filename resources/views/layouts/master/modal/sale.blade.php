<div class="modal-header">
    <button class="close" data-dismiss="modal" aria-label="true"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail Transaksi Penjualan</h4>
</div>
<div class="modal-body">
    <h4>No Faktur : {{$sales->transaction_id}}</h4>
    <br>
    <table class="table table-bordered">
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
                <td>{{$sale->book->name}}</td>
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
</div>
<div class="modal-footer">
    <a href="{!! URL::to('/sale') !!}" class="btn btn-default" role="button"><i class="fa fa-check">OK</i></a>
    <a href="{{url('/report/sale/print/'.$sales->id)}}" class="btn btn-primary"><i class="fa fa-print"> Faktur</i></a>
    {{--<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">--}}
    {{--<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>--}}
</div>