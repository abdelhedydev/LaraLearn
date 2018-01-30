<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;

use App\produit ;

use App\productcategorie ;

use App\store;

use Auth ;

class ProduitController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

    //lister les produits
     public function index($id)
     {
       $store = Store::find($id);
       $produits =  produit::where('store_id',$store->id)->get();
       return view('produit.index',['produits'=>$produits,'store'=>$store]);
     }

    //affiche le formulaire de creation
     public function create($id)
     {
        $productcategories =  Productcategorie::all();
        $store = Store::find($id);
         return view('produit.create',['store'=>$store,'productcategories'=>$productcategories]);
     }

    //saving a produit
     public function store($id,Request $req)
     {
       //return $res->all();
       $produit = new produit();
       $produit->store_id = $id;
       $produit->name = $req->input('name');
       $produit->categorie_id = $req->input('categorie');
       $produit->description = $req->input('description');
       $produit->price = $req->input('price');

       if($req->hasFile('photo')){
            // Get filename with the extension
            $filenameWithExt = $req->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $req->file('photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $req->file('photo')->storeAs('public/images', $fileNameToStore);

            $produit->photo = $fileNameToStore;
        }

       $produit->save();

       return redirect($id.'/produit');
     }

    //recupéerer un produit
     public function show($id)
     {
         //
     }

    //recupérer un cv et de le mettre on a form
     public function edit($store_id,$id)
     {
      $store = Store::find($store_id);
      $produit = Produit::find($id);
      $productcategories =  Productcategorie::all();
         return view('produit.edit',['produit'=>$produit,'store'=>$store,'productcategories'=>$productcategories]);
     }

    //Modifier un produit
     public function update($store_id,$id,Request $req)
     {
       $store = Store::find($store_id);
       $produit = produit::find($id);

       $produit->name = $req->input('name');
       $produit->description = $req->input('description');
       $produit->price = $req->input('price');
       $produit->categorie_id = $req->input('categorie');

       if($req->hasFile('photo')){
            // Get filename with the extension
            $filenameWithExt = $req->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $req->file('photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $req->file('photo')->storeAs('public/images', $fileNameToStore);

            $produit->photo = $fileNameToStore;
        }

       $produit->save();

       return redirect($store->id.'/produit');
     }

    //supprimer un produit
     public function destroy($store_id,$id)
     {
       $store = Store::find($store_id);
       $produit = Produit::find($id);
       $produit->delete();
         return redirect($store->id.'/produit');
     }
}
