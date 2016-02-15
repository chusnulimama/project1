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
    <table class="col-md-12">
        <tr>
            <td style="padding-left: 45px">
                <p>E-mail</p>
                <p>No.Telp</p>
            </td>
            <td>
                <p>: {{$employee->email}}</p>
                <p>: {{$employee->detail_phone}}</p>
            </td>
            <td>
                <p>Alamat</p>
                <p>Kota</p>
            </td>
            <td>
                <p>: {{$employee->detail_address}}</p>
                <p>: {{$employee->detail_city}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center">
                <p>Keterangan     : {{$employee->detail_note}}</p>

                <div>
                    <div class="switch switch-square" data-on-label="<i class=' fa fa-check'></i>" data-off-label="<i class='fa fa-times'></i>">
                        <input type="checkbox" checked="Actived">
                        <input type="checkbox" checked="true">
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="modal-footer">
    <a href="{!! URL::to('/employee') !!}" class="btn btn-default" role="button">OK</a>
    {{--<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">--}}
    {{--<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>--}}
</div>