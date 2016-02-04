@extends('layouts.master')
@section('content')

    <h3>Data Pembelian Barang</h3>
    <a href="{{url('/receive/create')}}" class="btn btn-success btn-lg" role="button"><i class="fa fa-plus-circle"></i> Tambah</a>
    @if(Session::has('message'))
        {!! Session::get('message') !!}
    @endif

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>No.Faktur</th>
                        <th>Supplier</th>
                        <th>Tanggal Masuk</th>
                        <th class="centered">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        {{--*/$perPage = $receipts->perPage(5);/*--}}
                        {{--*/$currentPage = $receipts->currentPage(1);/*--}}
                        {{--*/$startNumber = ($currentPage - 1) * $perPage;/*--}}
                        @forelse($receipts as $key => $receive)
                            {{--*/$number = $startNumber + ($key + 1);/*--}}
                        <td>{{$number}}</td>
                        <td>{{$receive->transaction_id}}</td>
                        <td>{{$receive->user_id}}</td>
                        <td>{{$receive->date_trans}}</td>
                        <td class="centered">
                            <a href="{{url('/receive/view/'.$receive->id)}}" class="btn btn-primary btn-xs" role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>
{{--                            <a href="{{ url('/receive/edit/'.$receive->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>--}}
                            <a href="{{url('/receive/destroy/'.$receive->id)}}" class="btn btn-danger btn-xs btn-delete"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="12">Tidak ada data transaksi</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <form action="" id="formDelete" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>
            </div>
            {!! $receipts->render() !!}
            <div role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {{--ambil body dari modal di--}}
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
                var del = confirm('Apakah anda yakin untuk melakukan pembatalan transaksi penerimaan ini?');
                if(del==true)
                {
                    //ganti form action attribute dengan href attribute
                    form.attr('action', $(this).attr('href'));
                } else {
                    return del;
                }
                //form submit
                form.submit();
            });
        });
    </script>
@endsection