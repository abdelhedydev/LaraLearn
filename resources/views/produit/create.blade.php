@extends('layouts.app')

@section('content')

<div class="ui container">
  <form class="ui form" action="{{url($store->id.'/produit')}}" enctype="multipart/form-data" method="post">
   {{csrf_field()}}

<div class="field">
   <label>Catégorie</label>
   <div class="inline fields">
     @foreach ($productcategories as $productcategorie)
       <div class="field">
       <div class="ui radio checkbox">
         <input type="radio" value="{{$productcategorie->id}}" name="categorie" checked="false">
         <label>{{$productcategorie->name}}<img class="ui mini image"  src="{{asset('storage/images/'.$productcategorie->icon)}}" alt=""></label>
       </div>
     </div>
     @endforeach
   </div>
</div>

    <div class="field">
      <label>Name</label>
      <input type="text" name="name" placeholder="nom ">
    </div>

    <div class="field">
      <label> Photo please ... </label>
      <input type="file" name="photo" placeholder="photo please">
    </div>

    <div class="field">
      <label>Price</label>
      <input type="number" name="price" placeholder="prix en DT">
    </div>
     <div class="field">
      <label>Description</label>
      <input type="text" name="description" placeholder="Last Name">
    </div>


    <button class="ui green button" type="submit">Submit</button>
  </form>
</div>
@endsection
