<tr id="book_receive-{{ $book->id }}">
    <td class="col-md-4">
        <input type="text" class="form-control" value="{{$book->name}}" readonly>
    </td>
    <td class="col-md-1">
        <input type="number" max="100" class="form-control input-sm input-qty" name="items[qty][]" value="1">
    </td>
    <td class="col-md-3">
        <div class="input-group">
            <div class="input-group-addon">Rp</div>
            <input type="number" class="form-control input-price" max="1000000" value="0" style="text-align: right">
        </div>
    </td>
    <td class="col-md-3">
        <div class="input-group">
            <div class="input-group-addon">Rp</div>
            <input type="text" class="form-control col-md-3 sub_total" style="text-align: right" value="0" readonly>
        </div>
    </td>
    <td style="text-align: center">
        <a href="javascript:void(null)" class="btn-delete btn btn-danger"><i class="fa fa-trash-o"></i></a>
    </td>
    <input type="hidden" name="item[id][]" class="book_id" value="{{ $book->id }}">
</tr>