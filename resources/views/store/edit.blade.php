@extends('layouts.app')

@section('content')
<div class="ui container">
  <form class="ui form" action ="{{ url('store/'. $store->id)}}" enctype="multipart/form-data" method="post">
  <input type="hidden" name="_method" value="PUT">
   {{csrf_field()}}
    <div class="field">
      <label> Name</label>
      <input type="text" value="{{$store->name}}" name="name" placeholder="First Name">
    </div>
    <div class="field">
     <label>Type</label>
     <div class="inline fields">
     <div class="field">
     <div class="ui radio checkbox">
       <input type="radio" value="resto" name="type"  >
       <label>Resto</label>
     </div>
   </div>

   <div class="field">
     <div class="ui radio checkbox">
       <input type="radio" value="café" name="type">
       <label>Café</label>
     </div>
   </div>
   <div class="field">
     <div class="ui radio checkbox">
       <input type="radio" value="café_resto" name="type">
       <label>Café Resto</label>
     </div>
   </div>
   <div class="field">
     <div class="ui radio checkbox">
       <input type="radio" value="patisserie" name="type">
       <label>Patisserie</label>
     </div>
   </div>
   </div>
 </div>
 <div class="field">
   <label>cover</label>
   <img class="ui tiny image"  src="{{asset('storage/images/'.$store->photo)}}" alt=""/>
   <input type="file" value="" name="photo" placeholder="">
 </div>
    <div class="field">
      <label>cover</label>
      <input type="text" value="{{$store->cover}}" name="cover" placeholder="Last Name">
    </div>
     <div class="field">
      <label>logo</label>
      <input type="text" value="{{$store->logo}}" name="logo" placeholder="Last Name">
    </div>
     <div class="field">
      <label>phone</label>
      <input type="text" value="{{$store->phone}}" name="phone" placeholder="Last Name">
    </div>


    <button class="ui yellow button" type="submit">Modifier</button>
  </form>
</div>
@endsection
