<div class="modal-header">
    <button class="close" data-dismiss="modal" aria-label="true"><span aria-hidden="true">&times;</span></button>
    <h5 class="modal-title">Detail Buku</h5>
</div>
<div class="modal-body" style="text-align: center">
    <h4>{{$book->name}}</h4>
    <img src="{{asset('/img'.$book->cover.'jpg')}}" height="180" width="150" class="img-rounded"> <!--memunculkan gambar cover-->
    <h5>Rp {{number_format($book->price)}}</h5>
    <p>{{$book->release}}</p>
    <p>Penulis/Penerbit/Pemasok : {{$book->author}} / {{$book->publisher}} / {{$book->supplier}}</p>
    <p>Stok : {{$book->stock}}</p>
</div>
<div class="modal-footer">
    <a href="{!! URL::to('/book') !!}" class="btn btn-default" role="button">Ok</a>
    {{--<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">--}}
    {{--<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>--}}
</div>