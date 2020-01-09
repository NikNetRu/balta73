
<form method = "POST" action="{{ route(('get.orderPage')) }}" id = "orderForm" enctype="multipart/form-data">
           @csrf
           
           <ul>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('storage/uploads/buyOrder.png')}}" class="img-responsive" width="25" height="25" alt="" />
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" id ="orderFlow" >
                   
            @if(Session::has('cart'))
                @foreach (Session::get('cart') as $container)
                <a class = "dropdown-item" id = "product{{$container['id'][0]}}}">
                    <div class = "row" ><input id = "{{$container['name'][0]}}" name = "{{$container['name'][0]}}" value = "{{$container['name'][0]}}" disabled>
                    <input id = "{{$container['cost'][0]}}" name = "{{$container['cost'][0]}}" value = "{{$container['cost'][0]}}" disabled> 
                    <input id = "num{{$container['id'][0]}}{{$container['name'][0]}}" value = "{{$container['num'][0]}}">
                    </div>
                </a>
                @endforeach
            @endif
                </div>
                
                <div   id ="aceptOrder">
                    <button type="submit" class="btn btn-primary">Оформить</button>
                </div>
            
             </li>
           </ul>   
      </form>

                