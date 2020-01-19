@extends ('template')

@section ('content')
Личный кабинет
{{$user->name}}
<form method = "POST" action = "{{Route('editUserData')}}" enctype="multipart/form-data">
    @csrf
    <input id = "nameUser" name = "realName" value="{{$user->realName}}">
    <input id = "surnameUser" name = "realSurame" value="{{$user->realSurname}}">
    <input id = "phone" name = "phone" value="{{$user->phone}}">
    <input id = "adress" name = "adress" value="{{$user->adress}}">
    <button>Обновить</button>
</form>
<div>
    Заказы:
    
    @foreach ($orders as $order)
        @foreach ($order as $content)
        {{$content['name']}}
        {{$content['num']}}
        {{$content['cost']}}
        {{$content['status']}}
        @endforeach
    @endforeach
</div>
@endsection



@section('panel')

@endsection