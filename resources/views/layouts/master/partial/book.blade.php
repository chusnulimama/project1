<tr id="book-{{ $book->id }}">
    <td>{{ $book->name }}</td>
    <td>{{ $book->publisher }}</td>
    <td style="width: 20px;">
        <input type="number" max="100" class="form-control input-sm input-qty" name="items[qty][]" value="1">
    </td>
    <td class="text-center">
        <span class="book_price">{{ $book->price }}</span>
    </td>
    <td style="width: 100px;" class="text-center">
        <div class="input-group">
            <input type="number" class="form-control input-sm input-discount" max="99" value="0">
            <span class="input-group-addon">%</span>
        </div>
    </td>
    <td class="text-right">
        <span class="sub_total">{{ $book->price }}</span>
    </td>
    <td style="text-align: center">
        <a href="javascript:void(null)" class="btn-delete btn btn-danger"><i class="fa fa-trash-o"></i></a>
    </td>
    <input type="hidden" name="item[id][]" class="book_id" value="{{ $book->id }}">
</tr>