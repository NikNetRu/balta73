<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>BALTA</title>
        <link rel="stylesheet" href="{!! asset('css/welcome.css') !!}" media="all" type="text/css">
        <script src="{{asset('jsForUser/BuyAndOrder.js')}}" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    
<body>

    <header> 
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center" >
          <strong>BALTA73</strong></a>
        
        
                <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    {{Auth::user()->name}}
                   
                    @If (Auth::user()->admin == true)
                    <a href="{{ url('add') }}">Добавить в категорию</a>
                    <a href="{{ url('addCategory') }}">Добавить категорию</a>
                    @endif
                    <a href="{{ url('/logout') }}">выйти</a>
                    

@component('userCart')
  
@endcomponent
                    
                    
                    
                    @else
                        <a href="{{ route('login') }}">Войти</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Регистрация</a>
                        @endif
                    @endauth
                    
                    <div class = "top-right links">          
                    </div>
                    
                </div>
            @endif
            
                </div>
            </div>
      

                    
        </div>
        

</header>



<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1>Мы предлагаем широкий перечень работ</h1>
      <p class="lead text-muted">Добавьте в корзину товар, и мы с вами свяжемся!</p>
    </div>
  </section>
</main>

   
 <div class = "row">
 <div class ="col-sm-3">   
<div class="panel panel-default" >
  <!-- Обычное содержимое панели -->
  <div class="panel-heading"></div>
  <div class="panel-body">
    
  </div>
  <!-- Групповой список -->
  <div class="list-group">
    <a href="{{ url('main') }}" class="list-group-item">Главная <span class="badge"></span></a>
    <a href="{{ url('infoPayment') }}" class="list-group-item">Оплата и Доставка <span class="badge"></span></a>
    <a href="{{ url('about') }}" class="list-group-item">О нас<span class="badge"></span></a>
  </div>
</div>
</div> 
     <div class ="col-sm-9">
@yield('content')
 </div>
</div>


<footer class="text-muted">
  <div class="container">
      <p>Для связи NikNetRu@list.ru</p>
  </div>
</footer>
</body>
</html>
