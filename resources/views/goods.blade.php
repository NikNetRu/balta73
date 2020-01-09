@extends('template')
@section('content')
<div class = "row">
 @foreach ($goodsContainer as $container)
 
 <div class="col-3">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$container->id}}">
  <image class="img-fluid" src = " {{asset('storage/'.$container->picture)}}" >
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$container->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$container->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h6>Описание:</h6>
        {{$container->about}}
          <h6>Стоимость:</h6>
        {{$container->cost}}
      </div>
      <div class="modal-footer">
          количество
        <input id = "numId{{$container->id}}" name = "numId{{$container->id}}" value = "1">      
        <button type="button" class="btn btn-primary" id = "{{$container->id}}" onclick = "BuyAndOrder.sendToCart({{$container}})">В корзину</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>

     
</div>
  @endforeach

</div>

@endsection
