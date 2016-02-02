@extends('layouts.master')
@section('content')

    <h3>Tambah Penjualan Buku</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <div class="wrapper">
                    <form action="{{url('/sale/create')}}" method="POST" class="form-horizontal" >
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"><h4>Tanggal</h4></label>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="transaction[date_trans]" value="">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input type="hidden" name="transaction[type]" value="Sale">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"><h4>Nama Pelanggan *</h4></label>
                            <div class="col-sm-3">
                                <select name="transaction[user_id]" class="form-control" required>
                                    <option value="">Pilih Pelanggan</option>
                                    @foreach($custs as $cust)
                                        <option value="{{$cust->id}}">{{$cust->detail_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"><h4>Pembayaran *</h4></label>
                            <div class="col-sm-3">
                                <select name="" class="form-control" required>
                                    <option value="">Pilih Cara Pembayaran</option>
                                    <option value="Cash">Tunai</option>
                                    <option value="Credit">Kredit</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"><h4>Buku</h4></label>
                            <div class="col-sm-3">
                                <select id="BookSelection" class="form-control">
                                    <option value="">Pilih Buku</option>
                                    @foreach ($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->name }} || {{ $book->author }} || {{ $book->publisher }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <a href="javascript:void(null)" class="btn btn-default btn-sm btn-add-book">Tambah Buku</a>
                            </div>
                        </div>

                        <table class="table table-striped table-advance table-hover" id="transactionDetails">
                            <hr>
                            <thead>
                            <tr class="heading">
                                <th >Judul Buku</th>
                                <th>Penerbit</th>
                                <th>Kuantitas</th>
                                <th>Harga Satuan</th>
                                <th>Diskon</th>
                                <th>SubTotal</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--detail barang--}}
                            </tbody>
                            <tfoot>
                            <th id="total">
                                <div class="input-group">
                                    <td colspan="4" style="text-align: right">Grand Total</td>
                                    <td>
                                        <div class="input-group-addon">Rp</div>
                                        <input type="text" class="span3 form-control" style="text-align: right" id='grandTotal' name="transaction[total]" value="{{old('transaction.total')}}" readonly>
                                    </td>
                                </div>
                            </th>
                            </tfoot>
                        </table>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <div class="input-group">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <a href="{{url('/sale')}}" class="btn btn-warning">Batal</a>
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
        $(document).ready(function() {
            $('.btn-add-book').on('click', function() {
                var bookSelector = $('#BookSelection');

                if ($(bookSelector).val() == null || $(bookSelector).val() == '')
                {
                    alert('Pilih Buku terlebih dahulu!');
                } else {
                    $.ajax({
                        type: 'GET',
                        url: '/book/sale-add/' + $(bookSelector).val(),
                        success: function(response)
                        {
                            var id = $('input.book_id', $($.parseHTML(response))).val();

                            if ($('table#transactionDetails tr#book-' + id).length > 0)
                            {
                                alert('ojok ditambahi maneh cak');
                            } else {
                                $('table#transactionDetails tbody').append(response);
                            }

                            calculateTotal();
                        }
                    });
                }
            });

            $('table#transactionDetails').on('click', '.btn-delete', function() {
                var tr = $(this).closest('tr');

                if (confirm('Anda yakin mau menghapus item ini?!'))
                {
                    $(tr).fadeOut().detach();
                    calculateTotal();
                }
            });

            $('table#transactionDetails').on('change', '.input-qty', function() {
                var tr = $(this).closest('tr');
                var price = $('.book_price', $(tr)).html();
                var discount = $('.input-discount').val();

                if (discount > 0) {
                    price = price - (price * (discount/100));
                }

                var subTotal = price * $(this).val();

                $('.sub_total', $(tr)).html(subTotal);
                calculateTotal();
            });

            $('table#transactionDetails').on('change', '.input-discount', function() {
                var tr = $(this).closest('tr');
                $('.input-qty', $(tr)).trigger('change');
            });

            function calculateTotal() {
                var total = 0;

                $('.sub_total').each(function (i, e) {
                    total = total + parseFloat($(e).html());
                });

                $('input[id=grandTotal]').val(total);
            };
        });
    </script>
@endsection