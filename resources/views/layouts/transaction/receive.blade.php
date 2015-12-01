@extends('layouts.master')
@section('content')

    <h3><i class="fa fa-angle-right"></i>Data Penerimaan Barang</h3>
    <a href="{!! URL::to('/receive#create') !!}"></a>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <?php
                    echo date("d-m-Y")?>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>No.Faktur</th>
                        <th></th>
                    </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>

@stop