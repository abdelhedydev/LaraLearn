<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productcategorie extends Model
{
  public function produits(){
    return $this->hasMany('App\Produit');
  }
}
