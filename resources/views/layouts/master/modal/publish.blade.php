<div class="modal-header">
    <button class="close" data-dismiss="modal" aria-label="true"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail Penerbit</h4>
</div>
<div class="modal-body">
    <h5>{{$publisher->detail_name}}</h5>
    <p>Alamat / Kota  : {{$publisher->detail_address}} / {{$publisher->detail_city}}</p>
    <p>No.Telp        : {{$publisher->detail_phone}}</p>
    <p>No.Fax         : {{$publisher->detail_fax}}</p>
    <p>E-mail         : {{$publisher->email}}</p>
    <p>Keterangan     : {{$publisher->detail_note}}</p>
</div>
<div class="modal-footer">
    <a href="{!! URL::to('/publisher') !!}" class="btn btn-default" role="button">Ok</a>
    {{--<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">--}}
    {{--<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>--}}
</div>