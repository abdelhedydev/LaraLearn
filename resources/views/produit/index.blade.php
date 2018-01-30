@extends('layouts.app')

@section('content')
<div class="ui container">
<h1>
  {{$store->name}}
</h1>
  <a href="{{url($store->id.'/produit/create')}}">
    <button type="button" class="ui blue button " name="button ">New produit</button>
  </a>

  <table class="ui striped table">

      <thead>
    <td>
      Name
    </td>
  
    <td>
      Price
    </td>
    <td>
      Photo
    </td>
    <td></td>
    <td></td>
  </thead>
  <tbody>
  @foreach ($produits as $produit )
      <tr>
        <td>{{$produit->name}}</td>
        <td>{{$produit->price }} </td>

        @if ($produit->photo)
          <td><img class="ui tiny image"  src="{{asset('storage/images/'.$produit->photo)}}" alt=""></td>
        @else
            <td>No photo</td>
        @endif
        <td>
          <a href="{{url($store->id.'/'.'produit/'.$produit->id.'/edit')}}">
            <button class="ui icon green button">
              <i class="setting icon"></i>
            </button>
          </a>
  </td>
        <td>
          <form class="" action="{{url($store->id.'/'.'produit/'.$produit->id)}}" method="post">
              {{csrf_field()}}
            <input type="hidden" name="_method" value="DELETE" >
            <a href="#">
              <button type="submit" class="ui icon red button">
        <i class="trash icon"></i>
      </button>
            </a>
          </form>
  </td>
      </tr>

    @endforeach
    </tbody>
  </table>
</div>

@endsection
