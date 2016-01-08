@extends('layouts.master')
@section('content')

    <h3>Tambah Penjualan Buku</h3>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <form action="{{url('/sale/create')}}" method="POST" class="form-horizontal" >
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"><h4>No.Faktur *</h4></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="" value="" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"><h4>Pelanggan *</h4></label>
                        <div class="col-sm-3">
                            <select name="" class="form-control">
                                <option value="">Pilih Pelanggan</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"><h4>Pembayaran *</h4></label>
                        <div class="col-sm-3">
                            <select name="" class="form-control">
                                <option value="">Pilih Cara Pembayaran</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"><h4>Buku</h4></label>
                        <div class="col-sm-3">
                            <select id="BookSelection" class="form-control">
                                <option value="">Pilih Buku</option>
                                @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button class="btn-default btn-sm btn-add-book">Tambah Buku</button>
                        </div>
                    </div>

                    <table class="table table-striped table-advance table-hover" id="transactionDetails">
                        <hr>
                        <thead>
                        <tr class="heading">
                            <th>Judul Buku</th>
                            <th>Penerbit</th>
                            <th>Kuantitas</th>
                            <th>Harga Satuan</th>
                            <th>Diskon</th>
                            <th>SubTotal</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr id="total">
                                <td colspan="5" style="text-align: right">TOTAL</td>
                                <td><input name='grandTotal' type="text" class="span3" style="text-align: right" readonly></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <a href="{{url('/sale')}}" class="btn btn-warning">Batal</a>
                            <button type="submit" class="btn btn-default">Simpan</button>
                        </div>
                    </div>
                </form>
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
                            $('table#transactionDetails tbody').append(response);
                            calculateTotal();
                        }
                    });
                }
            });

            $('table#transactionDetails tbody .btn-delete').on('click', function() {
                var tr = $(this).closest('tr');

                if (confirm('Anda yakin mau menghapus item ini?!'))
                {
                    $(tr).fadeOut().detach();
                }
            });

            $('.input-qty').on('change', function() {
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

            $('.input-discount').on('change', function() {
                var tr = $(this).closest('tr');
                $('.input-qty', $(tr)).trigger('change');
            });

            function calculateTotal() {
                var total = 0;

                $('.sub_total').each(function (i, e) {
                    total = total + parseFloat($(e).html());
                });

                $('input[name=grandTotal]').val(total);
            };
        });
    </script>
@endsection