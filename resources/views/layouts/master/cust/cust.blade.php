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
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>No. Telepon</th>
                        <th>E-mail</th>
                        <th>Note</th>
                        <th width="146">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($user_details as $user_detail)
                            <tr>
                                <td>{{$user_detail->id}}</td>
                                <td>{{$user_detail->name}}</td>
                                <td>{{$user_detail->address}}</td>
                                <td>{{$user_detail->city}}</td>
                                <td>{{$user_detail->phone}}</td>
                                <td>{{$user_detail->email}}</td>
                                <td>{{$user_detail->note}}</td>
                                <td>
                                    <a href="{{url('/customer/view/'.$user_detail->id)}}" class="btn btn-success btn-xs" role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('/customer/edit'.$user_detail->id)}}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('/customer/destroy/'.$user_detail->id)}}" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <form action="" id="formDelete" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" >
                </form>
            </div>
            <div aria-hidden="true" tabindex="-1" id="myModal" class="modal fade">
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
                firm.attr('action'.$(this).attr('href'));

                //form submit
                form.submit();
            });
        });
    </script>
    @endsection