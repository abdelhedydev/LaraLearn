<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
  }
  //2 eme methode

  public function produits(){
    return $this->hasMany('App\Produit');
  }
}
