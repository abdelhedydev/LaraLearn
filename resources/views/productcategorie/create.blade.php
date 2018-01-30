@extends('layouts.app')

@section('content')

<div class="ui container">
  <form class="ui form" action ="{{ url('productcategorie') }}" enctype="multipart/form-data" method="post">
   {{csrf_field()}}
    <div class="field">
      <label>Name</label>
      <input type="text" name="name" placeholder="First Name">
    </div>
    <div class="field">
      <label> Icon please ... </label>
      <input type="file" name="icon" placeholder="photo please">
    </div>

    <button class="ui green button" type="submit">Submit</button>
  </form>
</div>
@endsection
