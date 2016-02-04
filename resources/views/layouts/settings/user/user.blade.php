@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Pengguna</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <div class="padding-10">
                    <table class="table table-striped table-advance table-hover">
                        <h4>Daftar Pengguna</h4>
                        @if(Session::has('message'))
                            {!! Session::get('message') !!}
                        @endif


                        <h4><a href="{{url('/user/create')}}" class="btn btn-primary btn-xs">Tambah</a></h4>
                        <hr>
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>E-mail</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>Telepon</th>
                            <th>No.Fax</th>
                            <th>Role</th>
                            <th class="centered">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--*/$perPage = $users->perPage(5);/*--}}
                        {{--*/$currentPage = $users->currentPage(1);/*--}}
                        {{--*/$startNumber = ($currentPage - 1) * $perPage;/*--}}
                        @forelse($users as $key => $user)
                            {{--*/$number = $startNumber + ($key + 1);/*--}}
                            <tr>
                                <td>{{$number}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->detail_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->detail_address}}</td>
                                <td>{{$user->detail_city}}</td>
                                <td>{{$user->detail_phone}}</td>
                                <td>{{$user->detail_fax}}</td>
                                <td>{{$user->role}}</td>
                                <td class="centered">
                                    <a href="{{url('/user/edit/'.$user->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('/user/destroy/'.$user->id)}}" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o"></i></a>
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
            {!! $users->render() !!}
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

                form.attr('action', $(this).attr('href'));

                form.submit();
            });
        });
    </script>

@endsection