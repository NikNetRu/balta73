@extends('template')

@section('content')

<div class = "row">
 @foreach ($category as $container)
 
 <div class="col-3">
     <button>
         <a href="container/{{$container->name}}" >
            <image class="img-fluid" src = " {{asset('storage/'.$container->picture)}}">
            {{$container->name}}
         </a>
     </button>
 </div> 

  @endforeach
    
</div>

@endsection