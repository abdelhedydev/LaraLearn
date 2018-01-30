@extends('layouts.app')

@section('content')
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
      height: 200px;
    }

  </style>

<div class="ui container">
  <form class="ui form" action ="{{ url('store') }}" enctype="multipart/form-data" method="post">
   {{csrf_field()}}
    <div class="field">
      <label>Name</label>
      <input type="text" name="name" placeholder="First Name">
    </div>
    <div class="field">
     <label>Type</label>
     <div class="inline fields">

     <div class="field">
     <div class="ui radio checkbox">
       <input type="radio" value="resto" name="type" checked="checked">
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
      <label> Photo please ... </label>
      <input type="file" name="photo" placeholder="First Name">
    </div>

    <div class="field">
      <label>Position </label>
      <div id="map"></div>
    </div>
        <script>

          function initMap() {
            var myLatLng = {lat: 36.7909887, lng: 10.1759287};
            var mylat =document.getElementById('mylat');
            var mylong =document.getElementById('mylong');

            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 11,
              center: myLatLng
            });
            mylat.value=myLatLng.lat;
            mylong.value=myLatLng.lng;

            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              title: 'Merci de choissir une position exacte :) ',
              draggable:true
            });
            marker.addListener('dragend', function() {

              mylat.value=marker.lat();
              mylong.value=marker.lng();
            });
          }
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIhpJq020_wC4lU6ich8NxfgRGJz9uf1U&callback=initMap">
        </script>
    <div class="field">
      <label>cover</label>
      <input type="text" name="cover" placeholder="Last Name">
    </div>
     <div class="field">
      <label>logo</label>
      <input type="text" name="logo" placeholder="Last Name">
    </div>
     <div class="field">
      <label>phone</label>
      <input type="text" name="phone" placeholder="Last Name">
    </div>

    <input type="mylat" id="mylat" value="10" name="mylat" hidden="true" >
    <input type="mylong" id="mylong" value="10" name="mylong" hidden="true">


    <button class="ui green button" type="submit">Submit</button>
  </form>
</div>
@endsection
