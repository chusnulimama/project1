@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Pemasok</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <div class="padding-10">
                    <table class="table table-striped table-advance table-hover">
                        <h4>Daftar Pemasok</h4>
                        @if(Session::has('message'))
                            {!! Session::get('message') !!}
                        @endif

                        <h4><a href="{!! URL::to('/supplier/create') !!}" class="btn btn-primary btn-xs" role="button">Tambah</a></h4>
                        <hr>
                        <thead>
                        <tr>
                            <th style="text-align: center">No</th>
                            <th>Kode Pemasok</th>
                            <th>Nama</th>
                            <th>E-mail</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th style="text-align: center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            {{--*/$perPage = $suppliers->perPage(5);/*--}}
                            {{--*/$currentPage = $suppliers->currentPage(1);/*--}}
                            {{--*/$startNumber = ($currentPage - 1) * $perPage;/*--}}
                            @forelse($suppliers as $key => $supplier)
                                {{--*/$number = $startNumber + ($key + 1);/*--}}
                                <td style="text-align: center">{{$number}}</td>
                                <td>{{$supplier->username}}</td>
                                <td>{{$supplier->detail_name}}</td>
                                <td>{{$supplier->email}}</td>
                                <td>{{$supplier->status}}</td>
                                <td>{{$supplier->detail_note}}</td>
                                <td style="text-align: center">
                                    <a href="{{url('/supplier/view/'.$supplier->id)}}" class="btn btn-primary btn-xs" role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('/supplier/edit/'.$supplier->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('/supplier/destroy/'.$supplier->id)}}" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o"></i></a>
                                </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="12">Tidak ada data</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <form action="" id="formDelete" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </form>
                </div>
            </div>
            {!! $suppliers->render() !!}
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
        $(document).ready(function(){
            //target link delete
            $('a.btn-delete').on('click',function(e){
                //block default action ke href
                e.preventDefault();

                //ambil form delete
                var form = $("#formDelete");

                //ganti form action atribute dengan a href attribute
                form.attr('action', $(this).attr('href'));

                //submit form
                form.submit();
            });
        });
    </script>
@endsection