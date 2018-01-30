@extends('layouts.app')

@section('content')
<style >
body, html {
height: 100%;
width: 100%;
}

#map {
width: 100%;
}
</style>
<div id="map"style="width:100%;height:500px;margin-right:0px"></div>
<script>
         // This example requires the Places library. Include the libraries=places
         // parameter when you first load the API. For example:
         // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

         var map;
         var infowindow;


         function initMap() {
           var pyrmont = {lat: 36.796728, lng: 10.174641};
           var styledMapType = new google.maps.StyledMapType(
                      [
                        {elementType: 'geometry', stylers: [{color: '#ebe3cd'}]},
                        {elementType: 'labels.text.fill', stylers: [{color: '#523735'}]},
                        {elementType: 'labels.text.stroke', stylers: [{color: '#f5f1e6'}]},
                        {
                          featureType: 'administrative',
                          elementType: 'geometry.stroke',
                          stylers: [{color: '#c9b2a6'}]
                        },
                        {
                          featureType: 'administrative.land_parcel',
                          elementType: 'geometry.stroke',
                          stylers: [{color: '#dcd2be'}]
                        },
                        {
                          featureType: 'administrative.land_parcel',
                          elementType: 'labels.text.fill',
                          stylers: [{color: '#ae9e90'}]
                        },
                        {
                          featureType: 'landscape.natural',
                          elementType: 'geometry',
                          stylers: [{color: '#dfd2ae'}]
                        },
                        {
                          featureType: 'poi',
                          elementType: 'geometry',
                          stylers: [{color: '#dfd2ae'}]
                        },
                        {
                          featureType: 'poi',
                          elementType: 'labels.text.fill',
                          stylers: [{color: '#93817c'}]
                        },
                        {
                          featureType: 'poi.park',
                          elementType: 'geometry.fill',
                          stylers: [{color: '#a5b076'}]
                        },
                        {
                          featureType: 'poi.park',
                          elementType: 'labels.text.fill',
                          stylers: [{color: '#337530'}]
                        },
                        {
                          featureType: 'road',
                          elementType: 'geometry',
                          stylers: [{color: '#f9f1e6'}]
                        },
                        {
                          featureType: 'road.arterial',
                          elementType: 'geometry',
                          stylers: [{color: '#fdfcf8'}]
                        },
                        {
                          featureType: 'road.highway',
                          elementType: 'geometry',
                          stylers: [{color: '#f5c967'}]
                        },
                        {
                          featureType: 'road.highway',
                          elementType: 'geometry.stroke',
                          stylers: [{color: '#e9bc62'}]
                        },
                        {
                          featureType: 'road.highway.controlled_access',
                          elementType: 'geometry',
                          stylers: [{color: '#e08d58'}]
                        },
                        {
                          featureType: 'road.highway.controlled_access',
                          elementType: 'geometry.stroke',
                          stylers: [{color: '#db8555'}]
                        },
                        {
                          featureType: 'road.local',
                          elementType: 'labels.text.fill',
                          stylers: [{color: '#806b63'}]
                        },
                        {
                          featureType: 'transit.line',
                          elementType: 'geometry',
                          stylers: [{color: '#dfd2ae'}]
                        },
                        {
                          featureType: 'transit.line',
                          elementType: 'labels.text.fill',
                          stylers: [{color: '#8f7d77'}]
                        },
                        {
                          featureType: 'transit.line',
                          elementType: 'labels.text.stroke',
                          stylers: [{color: '#ebe3cd'}]
                        },
                        {
                          featureType: 'transit.station',
                          elementType: 'geometry',
                          stylers: [{color: '#dfd2ae'}]
                        },
                        {
                          featureType: 'water',
                          elementType: 'geometry.fill',
                          stylers: [{color: '#b9d3c2'}]
                        },
                        {
                          featureType: 'water',
                          elementType: 'labels.text.fill',
                          stylers: [{color: '#92998d'}]
                        }
                      ],
                      {name: 'Styled Map'});

                  // Create a map object, and include the MapTypeId to add
                  // to the map type control.

           map = new google.maps.Map(document.getElementById('map'), {
             center: pyrmont,
             zoom: 14,
             mapTypeControlOptions: {
               mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                       'styled_map']
             }
           });
           map.mapTypes.set('styled_map', styledMapType);
         map.setMapTypeId('styled_map');

           infowindow = new google.maps.InfoWindow();
           var service = new google.maps.places.PlacesService(map);
           service.nearbySearch({
             location: pyrmont,
             radius: 50000,
             type: ['food']
           }, callback);

           var service1 = new google.maps.places.PlacesService(map);
           service.nearbySearch({
             location: pyrmont,
             radius: 50000,
             type: ['restaurant']
           }, callback1);

           var service2 = new google.maps.places.PlacesService(map);
           service.nearbySearch({
             location: pyrmont,
             radius: 50000,
             type: ['cafe']
           }, callback2);
         }

         function callback(results, status) {
           if (status === google.maps.places.PlacesServiceStatus.OK) {
             for (var i = 0; i < results.length; i++) {
               createMarker(results[i]);
             }
           }
         }

         function callback1(results, status) {
           if (status === google.maps.places.PlacesServiceStatus.OK) {
             for (var i = 0; i < results.length; i++) {
               createMarker1(results[i]);
             }
           }
         }

         function callback2(results, status) {
           if (status === google.maps.places.PlacesServiceStatus.OK) {
             for (var i = 0; i < results.length; i++) {
               createMarker2(results[i]);
             }
           }
         }

         function createMarker(place) {
           var placeLoc = place.geometry.location;
           var image = "{{ asset('images/cutlery.png') }}";

           var marker = new google.maps.Marker({
             map: map,
             icon:image,
             position: place.geometry.location
           });

           google.maps.event.addListener(marker, 'click', function() {
             infowindow.setContent(place.name);
             infowindow.open(map, this);
           });
         }

         function createMarker1(place) {
           var placeLoc = place.geometry.location;
           var image = "{{ asset('images/cutlery.png') }}";

           var marker = new google.maps.Marker({
             map: map,
             icon:image,
             position: place.geometry.location
           });

           google.maps.event.addListener(marker, 'click', function() {
             infowindow.setContent(place.name);
             infowindow.open(map, this);
           });
         }

         function createMarker2(place) {
           var placeLoc = place.geometry.location;
           var image = "{{ asset('images/coffee.png') }}";

           var marker = new google.maps.Marker({
             map: map,
             icon:image,
             position: place.geometry.location
           });

           google.maps.event.addListener(marker, 'click', function() {
             infowindow.setContent(place.name);
             infowindow.open(map, this);
           });
         }




       </script>

     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIhpJq020_wC4lU6ich8NxfgRGJz9uf1U&libraries=places&callback=initMap" async defer></script>

     </script>

@endsection
