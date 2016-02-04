@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Pelanggan</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <div class="padding-10">
                    <table class="table table-striped table-advance table-hover">
                        <h4>Daftar Pelanggan</h4>
                        @if(Session::has('message'))
                            {!! Session::get('message') !!}
                        @endif

                        <h4><a href="{{url('/customer/create')}}" class="btn btn-primary btn-xs" role="button">Tambah</a></h4>
                        <hr>
                        <thead>
                        <tr>
                            <th style="text-align: center">No</th>
                            <th>Kode Pelanggan</th>
                            <th>Nama</th>
                            <th>E-mail</th>
                            <th>Status</th>
                            <th style="text-align: center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--*/$perPage = $custs->perPage(5);/*--}}
                        {{--*/$currentPage = $custs->currentPage(1);/*--}}
                        {{--*/$startNumber = ($currentPage - 1) * $perPage;/*--}}
                        @forelse($custs as $key => $cust)
                            {{--*/$number = $startNumber + ($key + 1);/*--}}
                                <tr>
                                    <td style="text-align: center">{{$number}}</td>
                                    <td>{{$cust->username}}</td>
                                    <td>{{$cust->detail_name}}</td>
                                    <td>{{$cust->email}}</td>
                                    <td>{{$cust->status}}</td>
                                    <td style="text-align: center">
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