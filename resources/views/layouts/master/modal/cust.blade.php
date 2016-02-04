<div class="modal-header">
    <button class="close" data-dismiss="modal" aria-label="true"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail Pelanggan</h4>
</div>
<div class="modal-body">
    <h3 style="text-align: center">{{$cust->detail_name}}</h3>
    <h4 style="text-align: center">{{$cust->detail_city}}</h4>
    <hr>
    <table>
        <tr>
            <td style="padding-left: 20px">
                <p>E-mail : {{$cust->email}}</p>
                <p>Alamat : {{$cust->detail_address}}</p>
            </td>
            <td style="padding-left: 20px">
                <p>No.Telp        : {{$cust->detail_phone}}</p>
                <p>No.Fax         : {{$cust->detail_fax}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <p>Keterangan     : {{$cust->detail_note}}</p>
            </td>
        </tr>
    </table>
</div>
<div class="modal-footer">
    <a href="{!! URL::to('/customer') !!}" class="btn btn-default" role="button">Ok</a>
    {{--<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">--}}
    {{--<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>--}}
</div>