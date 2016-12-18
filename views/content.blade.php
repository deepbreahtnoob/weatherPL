@extends('master')
@section('content')
@if ($city != '')
<div class="container">
  <div class="mt-1">
    <h1>Pogoda</h1>
  </div>
  <p class="lead">Temperatura w {{ $city }} wynosi {{ $temp }} stopni celsiusz</p>
</div>
@endif
@if ($city == '')
<div class="container">
  <div class="mt-1">
    <h1>Pogoda</h1>
  </div>
<form action="index.php" method="post">
  <div class="form-group">
    <label for="city">Podaj miasto</label>
    <input type="text" class="form-control" name='city' placeholder="Podaj Miasto:">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endif
@endsection
