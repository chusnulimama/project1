<div class="modal-header">
    <button class="close" data-dismiss="modal" aria-label="true"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail Karyawan</h4>
</div>
<div class="modal-body">
    <h5>{{$employee->detail_name}}</h5>
    <p>Jabatan {{$employee->roles_name}}</p>
    <p>Alamat / Kota  : {{$employee->detail_address}} / {{$employee->detail_city}}</p>
    <p>No.Telp        : {{$employee->detail_phone}}</p>
    <p>E-mail         : {{$employee->email}}</p>
    <p>Keterangan     : {{$employee->detail_note}}</p>
</div>
<div class="modal-footer">
    <a href="{!! URL::to('/employee') !!}" class="btn btn-default" role="button">Ok</a>
    {{--<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">--}}
    {{--<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>--}}
</div>