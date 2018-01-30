@extends('layouts.app')

@section('content')
<div class="ui container">
<h6>  Only the admin can access to this page ! </h6>  
  <a href="productcategorie/create">
    <button type="button" class="ui blue button " name="button ">New Categorie</button>
  </a>


  @if ($productcategories)
    <table class="ui striped table">

        <thead>
      <td>
        Name
      </td>
      <td>
        Icon
      </td>
      <td></td>
      <td></td>
    </thead>
    <tbody>
    @foreach ($productcategories as $productcategorie )
        <tr>
          <td>{{$productcategorie->name}}</td>
          @if ($productcategorie->icon)
            <td><img class="ui mini image"  src="{{asset('storage/images/'.$productcategorie->icon)}}" alt=""></td>
          @else
              <td>No icon</td>
          @endif
          <td>
            {{$productcategorie->description }}
          </td>
          <td>
            <a href="{{url('productcategorie/'.$productcategorie->id.'/edit')}}">
              <button class="ui icon green button">
                <i class="setting icon"></i>
              </button>
            </a>
    </td>
          <td>
            <form class="" action="{{url('productcategorie/'.$productcategorie->id)}}" method="post">
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
    <h3>Sorry you don't still have productcategories</h3>
  @endif

</div>

@endsection
