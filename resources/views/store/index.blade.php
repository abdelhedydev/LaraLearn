@extends('layouts.app')

@section('content')
<div class="ui container">
  <a href="store/create">
    <button type="button" class="ui blue button " name="button ">New Store</button>
  </a>

@if ($stores)
  <table class="ui striped table">

      <thead>
    <td>
      State
    </td>
    <td>
      Name
    </td>
    <td>
      Type
    </td>
    <td>
      Phone
    </td>
    <td>Photo</td>
    <td>Produits</td>
    <td></td>
    <td></td>
  </thead>
  <tbody>
  @foreach ($stores as $store )
      <tr>
        <td><a class="ui label">
          {{$store->state}}
        </a></td>
        <td>{{$store->name}}</td>
        <td>{{$store->type }} </td>
        <td>{{$store->phone}}</td>
        @if ($store->photo)
          <td><img class="ui tiny image"  src="{{asset('storage/images/'.$store->photo)}}" alt=""></td>
        @else
            <td>No photo</td>
        @endif
        <td>
          <a href="{{url($store->id.'/produit')}}">
            <button class="ui icon blue button">
              <i class="sidebar icon"></i>
            </button>
          </a>
  </td>
        <td>
          <a href="{{url('store/'.$store->id.'/edit')}}">
            <button class="ui icon green button">
              <i class="setting icon"></i>
            </button>
          </a>
  </td>
        <td>
          <form class="" action="{{url('store/'.$store->id)}}" method="post">
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
@else
  <h3>Sorry you don't still have stores</h3>
@endif
</div>

@endsection
