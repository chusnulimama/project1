@extends('layouts.master')
@section('content')

    <h3>EDIT Pembelian Barang</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <div class="wrapper">
                    <form action="{{url('/receive/edit/',$transaction->id)}}" method="POST" class="form-horizontal" >
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"><h4>Tanggal</h4></label>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="transaction[date_trans]" value="{{$today}}">
                                    <span class="input-group-addon"><i class="glyphicon-calendar glyphicon"></i></span>
                                    <input type="hidden" name="transaction[type]" value="Receive">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"><h4>Nama Pemasok *</h4></label>
                            <div class="col-sm-3">
                                <select name="transaction[user_id]" class="form-control" required>
                                    <option value="">Pilih Pemasok</option>
                                    @foreach($supps as $supp)
                                        <option value="{{$supp->id}}">{{$supp->detail_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"><h4>Buku</h4></label>
                            <div class="col-sm-3">
                                <select id="BookSelection" class="form-control">
                                    <option value="">Pilih Buku</option>
                                    @foreach($books as $book)
                                        <option value="{{$book->id}}">{{$book->name}} || {{$book->author}} || {{$book->publisher}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <a href="javascript:void(null)" class="btn btn-default btn-sm btn-add-book">Tambah Buku</a>
                            </div>
                        </div>

                        <table class="table table-striped table-advance table-hover table-bordered" id="transactionDetails">
                            <hr>
                            <thead>
                            <tr class="heading">
                                <th style="text-align: center">Judul Buku</th>
                                <th style="text-align: center">Kuantitas</th>
                                <th style="text-align: center">Harga Satuan (Supplier)</th>
                                <th style="text-align: center;">Total</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction->trans_detail()->get() as $detail )
                                    @include('layouts.master.partial.book_receive', [ 'book' => $detail->book, 'detail' => $detail ])
                                @endforeach
                            </tbody>
                            <tfoot>
                            <th colspan="3" style="text-align: right">Grand Total</th>
                            <th class="col-md-3">
                                <div class="input-group">
                                    <div class="input-group-addon">Rp</div>
                                    <input type="text" class="form-control col-md-3" id="grandTotal" name="transaction[total]" value="{{old('transaction.total')}}" style="text-align: right" readonly>
                                </div>
                            </th>
                            </tfoot>
                        </table>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <a href="{{url('/receive')}}" class="btn btn-warning">Batal</a>
                                    <button type="submit" class="btn btn-default">Simpan</button>
                                </div>
                            </div>
                        </div>
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
            $('.btn-add-book').on('click', function(){
                var bookSelector = $('#BookSelection');

                if($(bookSelector).val() == null || $(bookSelector).val() == '')
                {
                    alert('Pilih Buku terlebih dahulu!');
                } else {
                    $.ajax({
                        type: 'GET',
                        url: '/book/receive-add/' + $(bookSelector).val(),
                        success: function(response)
                        {
                            var id = $('input.book_id', $($.parseHTML(response))).val();

                            if ($('table#transactionDetails tr#book_receive-' + id).length > 0)
                            {
                                alert('Buku sudah diambil!');
                            } else {
                                $('table#transactionDetails tbody').append(response);
                            }
                            calculateTotal();
                        }
                    });
                }
            });

            $('table#transactionDetails').on('click', '.btn-delete', function(){
                var tr = $(this).closest('tr');

                if (confirm('Anda yakin untuk menghapus item ini?'))
                {
                    $(tr).fadeOut().detach();
                    calculateTotal();
                }
            });

//            $('table#transactionDetails').on('change', '.input-qty', function(){
//                var tr = $(this).closest('tr');
//                $('.input-price', $(tr)).trigger('change');
//            });

            $('table#transactionDetails').on('change', '.input-price', function(){
                var tr = $(this).closest('tr');
                var price = $(this).val();
                var qty = $('.input-qty', $(tr)).val();

                var subTotal = qty * price;

                $('.sub_total', $(tr)).val(subTotal);

                calculateTotal();
            });

            function calculateTotal(){
                var total = 0;

                $('.sub_total').each(function(i,e) {
                    total = total + parseFloat($(e). val());
                })

                $('input[id=grandTotal]').val(total);
            };

            calculateTotal();
        });
    </script>
@endsection