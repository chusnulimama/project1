@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Role</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <div class="padding-10">
                    <table class="table table-striped table-advance table-hover">
                        <h4>Daftar Role</h4>
                        @if(Session::has('message'))
                            {!! Session::get('message') !!}
                            @endif

                        <h4><a href="{{url('/role/create')}}" class="btn btn-primary btn-xs">Tambah</a></h4>
                        <hr>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Jabatan</th>
                            <th>Keterangan</th>
                            <th class="centered">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->description}}</td>
                            <td class="centered">
                                <a href="{{ url('/role/edit/'.$role->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                <a href="{{url('/role/destroy/'.$role->id)}}" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o"></i></a>
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