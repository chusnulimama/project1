@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Pengguna</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <h4>Daftar Pengguna</h4>
                    @if(Session::has('message'))
                        {!! Session::get('message') !!}
                    @endif

                    <h6><a href="{{url('/user/create')}}" class="btn btn-primary btn-xs">Tambah</a></h6>
                    <hr>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Telepon</th>
                        <th>No.Fax</th>
                        <th>Keterangan</th>
                        <th class="centered">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->city}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->fax}}</td>
                            <td>{{$user->note}}</td>
                            <td class="centered">
                                <a href="{{ url('/user/edit/'.$user->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                <a href="{{url('/user/destroy/'.$user->id)}}" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <form action="" id="formDelete" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @parent
    <script type="text/javascript">
        $(document).ready(function(){
            $('a.btn-delete').on('click', function(e){
                e.preventDefault();

                var form = $('#formDelete');

                form.submit();
            });
        });
    </script>

@endsection