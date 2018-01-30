<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;

use App\store ;

use Auth ;

class StoreController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

    //lister les stores
     public function index()
     {
        //$stores =  Store::all();
        $stores = Auth::user()->stores;
        //$stores =  Store::where('user_id',Auth::user()->id)->get();
        return view('store.index',['stores'=>$stores]);
     }

    //affiche le formulaire de creation
     public function create()
     {
         return view('store.create');
     }

    //saving a store
     public function store(Request $req)
     {
         //return $res->all();
         $store = new Store();
         $store->name = $req->input('name');
         $store->cover = $req->input('cover');
         $store->logo = $req->input('logo');
         $store->phone = $req->input('phone');
         $store->type = $req->input('type');

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

              $store->photo = $fileNameToStore;
          }

         $store->store_longitude=$req->input('mylong');

         $store->store_laltitude=$req->input('mylat');

         $store->user_id= Auth::user()->id ;

         $store->state = 'encours_de_confirmtion';

         $store->save();

         return redirect('store');
     }

    //recupéerer un Store
     public function show($id)
     {
         //
     }

    //recupérer un cv et de le mettre on a form
     public function edit($id)
     {
       $store = Store::find($id);
         return view('store.edit',['store'=>$store]);
     }

    //Modifier un Store
     public function update(Request $req,$id)
     {
         $store = Store::find($id);

         $store->name = $req->input('name');
         $store->cover = $req->input('cover');
         $store->logo = $req->input('logo');
         $store->phone = $req->input('phone');
         $store->type = $req->input('type');

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

              $store->photo = $fileNameToStore;
          }

         $store->save();

         return redirect('store');
     }

    //supprimer un Store
     public function destroy($id)
     {
         $store = Store::find($id);
         $store->delete();

         return redirect('store');
     }
}
