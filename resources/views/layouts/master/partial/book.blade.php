<tr id="book-{{ $book->id }}">
    <td>
        <input type="text" class="form-control" name="items[book_id][]" value="{{ $book->name }}" readonly>
    </td>
    <td>
        <input type="text" class="form-control" value="{{ $book->publisher }}" readonly>
    </td>
    <td style="width: 20px;">
        <input type="number" class="form-control input-sm input-qty" max="{{ $book->stock }}" name="items[qty][]" value="{{ is_object($detail) ? $detail->qty : "0" }}">
    </td>
    <td class="col-md-3">
        <div class="input-group">
            <div class="input-group-addon">Rp</div>
            <input type="text" style="text-align: right" class="form-control book_price" name="items[price][]" value="{{ $book->price }}" readonly>
        </div>
    </td>
    <td style="width: 105px;" class="text-center">
        <div class="input-group">
            <input type="number" class="form-control input-sm input-discount" name="items[disc][]" max="99" value="{{ is_object($detail) ? $detail->disc : "0" }}">
            <span class="input-group-addon">%</span>
        </div>
    </td>
    <td>
        <div class="input-group">
            <div class="input-group-addon">Rp</div>
            <input type="text" class="form-control sub_total" style="text-align: right" name="items[subtotal][]" value="{{ $book->price }}" readonly>
        </div>
    </td>
    <td style="text-align: center">
        <a href="javascript:void(null)" class="btn-delete btn btn-danger"><i class="fa fa-trash-o"></i></a>
    </td>
    <input type="hidden" name="items[id][]" class="book_id" value="{{ $book->id }}">
</tr>