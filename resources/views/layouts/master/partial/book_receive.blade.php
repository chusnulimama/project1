<tr id="book_receive-{{ $book->id }}">
    <td class="col-md-4">
        <input type="text" class="form-control" name="items[book_id][]" value="{{$book->name}}" readonly>
    </td>
    <td class="col-md-1">
        <input type="number" max="100" class="form-control input-sm input-qty" name="items[qty][]" value="{{ is_object($detail) ? $detail->qty : "1" }}">
    </td>
    <td class="col-md-3">
        <div class="input-group">
            <div class="input-group-addon">Rp</div>
            <input type="number" class="form-control input-price" max="1000000" name="items[price][]" value="{{ is_object($detail) ? $detail->price : "0" }}" style="text-align: right">
        </div>
    </td>
    <td class="col-md-3">
        <div class="input-group">
            <div class="input-group-addon">Rp</div>
            <input type="text" class="form-control col-md-3 sub_total" style="text-align: right" name="items[subtotal][]" value="{{ is_object($detail) ? $detail->subtotal : "0" }}" readonly>
        </div>
    </td>
    <td style="text-align: center">
        <a href="javascript:void(null)" class="btn-delete btn btn-danger"><i class="fa fa-trash-o"></i></a>
    </td>
    <input type="hidden" name="items[id][]" class="book_id" value="{{ $book->id }}">
</tr>