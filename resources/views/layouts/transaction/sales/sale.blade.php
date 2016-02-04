@extends('layouts.master')
@section('content')

    <h3>Data Penjualan Barang</h3>
    <a href="{{url('/sale/create')}}" class="btn btn-success btn-lg" role="button"><i class="fa fa-plus-circle"></i>  Tambah</a>
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
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th class="centered">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        {{--*/$perPage = $sales->perPage(5);/*--}}
                        {{--*/$currentPage = $sales->currentPage(1);/*--}}
                        {{--*/$startNumber = ($currentPage - 1) * $perPage;/*--}}
                        @forelse($sales as $key => $sale)
                            {{--*/$number = $startNumber + ($key + 1);/*--}}
                        <td>{{$number}}</td>
                        <td>{{$sale->transaction_id}}</td>
                        <td>{{$sale->user_id}}</td>
                        <td>{{$sale->date_trans}}</td>
                        <td class="centered">
                            <a href="{{url('/sale/view/'.$sale->id)}}" class="btn btn-primary btn-xs" role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>
                            {{--<a href="{{ url('/receive/edit/'.$sale->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>--}}
                            <a href="{{url('/sale/destroy/'.$sale->id)}}" class="btn btn-danger btn-xs btn-delete"><i class="glyphicon glyphicon-remove"></i></a>
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
            {!! $sales->render() !!}
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
                var del = confirm('Apakah anda yakin untuk melakukan pembatalan transaksi penjualan ini?');
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