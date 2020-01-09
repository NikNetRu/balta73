@extends('template')

@section('content')

<form method = "POST" id = 'buyThis' name = 'buyThis' action = "{{route('buyThis')}}">
    {{csrf_field()}}
<table class="table" id ="orderTable">
  <thead>
    <tr>
      <th>#</th>
      <th>Наименование</th>
      <th>Стоимость</th>
      <th>Количество</th>
      <th>Суммарно</th>
    </tr>
  </thead>
  <tfoot>
        <th></th>
        <th></th>
        <th></th>
       <th>Суммарно</th>
       <th>{{$summaryCost}}</th>
  </tfoot>
  @php $i = 0  
  @endphp 
  @foreach ($orders as $order)
  @php $i++  
  @endphp 
  <tbody>
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$order['name']}}</td>
      <td>{{$order['cost']}}</td>
      <td>{{$order['num']}}</td>
      <td>{{$order['summary']}}</td>
    </tr>

  </tbody>
  @endforeach
</table>
<button type="submit" >
    Купить онлайн
</button>
</form>


@endsection