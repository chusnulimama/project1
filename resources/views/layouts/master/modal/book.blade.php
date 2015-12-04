<div class="modal-header">
    <button class="close" data-dismiss="modal" aria-label="true"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail Buku</h4>
</div>
<div class="modal-body">
    <h5>{{$book->name}}</h5>
    <img src="{{asset('/img'.$book->cover.'jpg')}}" height="180" width="150" class="img-rounded"> <!--memunculkan gambar cover-->
    <p>Tahun Terbit {{$book->release}}</p>
    <p>Penulis/Penerbit/Pemasok : {{$book->author}} / {{$book->publisher}} / {{$book->supplier}}</p>
    <p>Stok : {{$book->stock}}</p>
</div>
<div class="modal-footer">
    <a href="{!! URL::to('/book') !!}" class="btn btn-default" role="button">Ok</a>
    {{--<input type="button" class="btn btn-default" value="Cancel" data-dismiss="modal">--}}
    {{--<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>--}}
</div>