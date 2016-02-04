<div class="modal-header">
    <button class="close" data-dismiss="modal" aria-label="true"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail Karyawan</h4>
</div>
<div class="modal-body">
    <h3 style="text-align: center">{{$employee->detail_name}}</h3>
    <h4 style="text-align: center">Jabatan {{$employee->roles_name}}</h4>
    <h5 style="text-align: center">Username       : {{$employee->username}}</h5>
    <h5 style="text-align: center">Password       : ******</h5>
    <hr>
    <table>
        <tr>
            <td style="padding-left: 50px">
                <p>E-mail         : {{$employee->email}}</p>
                <p>Alamat         : {{$employee->detail_address}}</p>
                <p>Kota           : {{$employee->detail_city}}</p>
            </td>
            <td style="padding-left: 60px">
                <p>No.Telp        : {{$employee->detail_phone}}</p>
                <p>Keterangan     : {{$employee->detail_note}}</p>
            </td>
        </tr>
    </table>
</div>
<div class="modal-footer">
    <a href="{!! URL::to('/employee') !!}" class="btn btn-default" role="button">OK</a>
    {{--<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">--}}
    {{--<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>--}}
</div>