@extends('layouts.app')

@section('content')
<div class="ui container">
  <form class="ui form" action ="{{ url('productcategorie/'. $productcategorie->id)}}" enctype="multipart/form-data"  method="post">
  <input type="hidden" name="_method" value="PUT">
   {{csrf_field()}}
    <div class="field">
      <label> Name</label>
      <input type="text" value="{{$productcategorie->name}}" name="name" placeholder="First Name">
    </div>

    <div class="field">
      <label> Icon please ... </label>
      <img class="ui tiny image"  src="{{asset('storage/images/'.$productcategorie->icon)}}" alt=""/>
      <input type="file" name="icon" placeholder="photo please">
    </div>

    <button class="ui yellow button" type="submit">Modifier</button>
  </form>
</div>
@endsection
