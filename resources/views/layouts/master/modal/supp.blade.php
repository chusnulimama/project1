<div class="modal-header">
    <button class="close" data-dismiss="modal" aria-label="true"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail Pemasok</h4>
</div>
<div class="modal-body">
    <h5>{{$supplier->detail_name}}</h5>
    <p>Alamat / Kota  : {{$supplier->detail_address}} / {{$supplier->detail_city}}</p>
    <p>No.Telp        : {{$supplier->detail_phone}}</p>
    <p>No.Fax         : {{$supplier->detail_fax}}</p>
    <p>E-mail         : {{$supplier->email}}</p>
    <p>Keterangan     : {{$supplier->detail_note}}</p>
</div>
<div class="modal-footer">
    <a href="{!! URL::to('/supplier') !!}" class="btn btn-default" role="button">Ok</a>
    {{--<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">--}}
    {{--<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>--}}
</div>