<div class="modal-header">
    <button class="close" data-dismiss="modal" aria-label="true"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail Pemasok</h4>
</div>
<div class="modal-body">
    <h3 style="text-align: center">{{$supplier->detail_name}}</h3>
    <h4 style="text-align: center">{{$supplier->detail_city}}</h4>
    <hr>
    <table>
        <tr>
            <td style="padding-left: 20px">
                <p>E-mail : {{$supplier->email}}</p>
                <p>Alamat : {{$supplier->detail_address}}</p>
            </td>
            <td style="padding-left: 20px">
                <p>No.Telp        : {{$supplier->detail_phone}}</p>
                <p>No.Fax         : {{$supplier->detail_fax}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <p>Keterangan     : {{$supplier->detail_note}}</p>
            </td>
        </tr>
    </table>
</div>
<div class="modal-footer">
    <a href="{!! URL::to('/supplier') !!}" class="btn btn-default" role="button">OK</a>
    {{--<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">--}}
    {{--<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>--}}
</div>