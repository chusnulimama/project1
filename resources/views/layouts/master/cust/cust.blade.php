@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Pelanggan</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4>Daftar Pelanggan</h4>
                    @if(Session::has('message'))
                        {!! Session::get('message') !!}
                    @endif

                    <h6><a href="{{url('/customer/create')}}" class="btn btn-primary btn-xs" role="button">Tambah</a></h6>
                    <hr>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Member</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>No. Telepon</th>
                        <th>No. Fax</th>
                        <th>E-mail</th>
                        <th>Note</th>
                        <th width="146">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--$no = 1;--}}
                        @forelse($custs as $cust)
                            <tr>
                                <td>$no. ""</td>
                                <td>No.Member</td>
                                <td>{{$cust->detail_name}}</td>
                                <td>{{$cust->detail_address}}</td>
                                <td>{{$cust->detail_city}}</td>
                                <td>{{$cust->detail_phone}}</td>
                                <td>{{$cust->detail_fax}}</td>
                                <td>{{$cust->email}}</td>
                                <td>{{$cust->detail_note}}</td>
                                <td>
                                    <a href="{{url('/customer/view/'.$cust->id)}}" class="btn btn-primary btn-xs" role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('/customer/edit/'.$cust->id)}}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('/customer/destroy/'.$cust->id)}}" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="12">Tidak ada data</td>
                                </tr>
                            @endforelse
                    {{--$no++;--}}
                    </tbody>
                </table>
                <form action="" id="formDelete" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" >
                </form>
            </div>
            {!! $custs->render() !!}
            <div role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @parent
    <script type="text/javascript">
        $(document).ready(function () {
            //target link
            $('a.btn-delete').on('click', function(e){
                //blok default action ke href
                e.preventDefault();

                //ambil form delete
                var form = $("#formDelete");

                //ganti form action attribute dengan href attribute
                form.attr('action', $(this).attr('href'));

                //form submit
                form.submit();
            });
        });
    </script>
    @endsection