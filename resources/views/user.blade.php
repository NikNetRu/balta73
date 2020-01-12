@extends ('template')

@section ('content')
Личный кабинет
{{$user->name}}
<form method = "POST" action = "{{Route('editUserData')}}" enctype="multipart/form-data">
    <input id = "nameUser" name = "nameUser" value="{{$user->realName}}">
    <input id = "surnameUser" name = "surnameUser" value="{{$user->realSurname}}">
    <input id = "phone" name = "phone" value="{{$user->phone}}">
    <input id = "adress" name = "adress" value="{{$user->adress}}">
    <button>Обновить</button>
</form>
@endsection



@section('panel')

@endsection