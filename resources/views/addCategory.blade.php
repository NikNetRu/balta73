@extends('template')

@section('content')
<form method="POST" action="{{ route(('load.category')) }}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Наименование</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name ="inputName" placeholder="Наименование">
    </div>
    
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