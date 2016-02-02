<div class="modal-header">
    <button class="close" data-dismiss="modal" aria-label="true"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail Transaksi Penerimaan Barang</h4>
</div>
<div class="modal-body">
    <h5>{{$receipt->transaction_id}}</h5>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Judul Buku</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td>{{$receipt->trans_detail()->name}}</td>
            <td>{{$receipt->trans_detail()->qty}}</td>
            <td>{{$receipt->trans_detail()->price}}</td>
            <td>{{$receipt->trans_detail()->subtotal}}</td>
        </tr>
        </tbody>
        <tfoot>
        <th colspan="4" style="text-align: right">TOTAL</th>
        <th class="col-md-3">
            <div class="input-group">
                <div class="input-group-addon">Rp</div>
                <input type="text" class="form-control col-md-3" name="transaction[total]" value="{{$receipt->total}}" style="text-align: right" readonly>
            </div>
        </th>
        </tfoot>
    </table>
</div>
<div class="modal-footer">
    <a href="{!! URL::to('/receive') !!}" class="btn btn-default" role="button"><i class="fa fa-check">Ok</i></a>
    <a href="#" class="btn btn-primary"><i class="fa fa-print">Print</i></a>
    {{--<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">--}}
    {{--<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>--}}
</div>