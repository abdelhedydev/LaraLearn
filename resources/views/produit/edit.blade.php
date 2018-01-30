@extends('layouts.app')

@section('content')
<div class="ui container">
  <form class="ui form" action ="{{ url($store->id .'/produit/'. $produit->id)}}" enctype="multipart/form-data" method="post">
  <input type="hidden" name="_method" value="PUT">
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
      <label> Name</label>
      <input type="text" value="{{$produit->name}}" name="name" placeholder="product name">
    </div>
    <div class="field">
      <label>Photo</label>
      <img class="ui tiny image"  src="{{asset('storage/images/'.$produit->photo)}}" alt=""/>
      <input type="file" value="" name="photo" placeholder="">
    </div>
    <div class="field">
      <label>Price</label>
      <input type="text" value="{{$produit->price}}" name="price" placeholder="product price">
    </div>
     <div class="field">
      <label>Description</label>
      <input type="text" value="{{$produit->description}}" name="description" placeholder="product price">
    </div>

    <button class="ui yellow button" type="submit">Modifier</button>
  </form>
</div>
@endsection
