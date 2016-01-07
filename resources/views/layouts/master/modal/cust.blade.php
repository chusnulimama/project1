<div class="modal-header">
    <button class="close" data-dismiss="modal" aria-label="true"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail Pelanggan</h4>
</div>
<div class="modal-body">
    <h5>{{$cust->detail_name}}</h5>
    <p>Alamat / Kota  : {{$cust->detail_address}} / {{$cust->detail_city}}</p>
    <p>No.Telp        : {{$cust->detail_phone}}</p>
    <p>No.Fax         : {{$cust->detail_fax}}</p>
    <p>E-mail         : {{$cust->email}}</p>
    <p>Keterangan     : {{$cust->detail_note}}</p>
</div>
<div class="modal-footer">
    <a href="{!! URL::to('/customer') !!}" class="btn btn-default" role="button">Ok</a>
    {{--<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">--}}
    {{--<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>--}}
</div>