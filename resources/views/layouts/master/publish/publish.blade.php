@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Master Penerbit</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4>Daftar Penerbit</h4>
                    @if(Session::has('message'))
                        {!! Session::get('message') !!}
                    @endif

                    <h6><a href="{!! URL::to('/publisher/create') !!}" class="btn btn-primary btn-xs" role="button">Tambah</a></h6>
                    <hr>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Penerbit</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>No.Telepon</th>
                        <th>No.Fax</th>
                        <th>E-mail</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @forelse($publishers as $publisher)
                            <td>no</td>
                            <td>id_penerbit</td>
                            <td>{{$publisher->detail_name}}</td>
                            <td>{{$publisher->detail_address}}</td>
                            <td>{{$publisher->detail_city}}</td>
                            <td>{{$publisher->detail_phone}}</td>
                            <td>{{$publisher->detail_fax}}</td>
                            <td>{{$publisher->email}}</td>
                            <td>{{$publisher->detail_status}}</td>
                            <td>{{$publisher->detail_note}}</td>
                            <td>
                                <a href="{{url('/publisher/view/'.$publisher->id)}}" class="btn btn-primary btn-xs" role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>
                                <a href="{{url('/publisher/edit/'.$publisher->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                <a href="{{url('/publisher/destroy/'.$publisher->id)}}" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o"></i></a>
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
            {!! $publishers->render() !!}
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