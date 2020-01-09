@extends('template')

@section('content')
<form method="POST" action="{{ route(('load.product')) }}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Наименование</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name ="inputName" placeholder="Наименование">
    </div>
    
    <label for="inputProperty" class="col-sm-2 col-form-label">Описание</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="textArea" name="textArea" rows="3"></textarea>
    </div>
    
    <label for="inputCost" class="col-sm-2 col-form-label">Стоимость</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="inputCost" name ="inputCost" placeholder="Стоимость">

    
   
      <label class="mr-sm-2" for="inlineFormCustomSelect">Категория</label>
      <select class="custom-select mr-sm-2" id="category" name="category">
        <option selected>Категория</option>
        @foreach ($category as $container)
        <option value="{{$container->name}}">{{$container->name}}</option>
        @endforeach
      </select>
    
  <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputFile">Загрузить изображение</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputFile" name="inputFile" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputFile">Выберите файл</label>
  </div>
</div>
      
       <button type="submit" class="btn btn-primary">Отправить</button>
    </div>


</form>

    
@endsection