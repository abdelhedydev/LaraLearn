<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
  public function store(){
    return $this->belongsTo('App\store');
  }
  public function Productcategorie(){
    return $this->belongsTo('App\productcategorie');
  }
}
