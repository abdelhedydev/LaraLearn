<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;

use Auth ;

use App\productcategorie ;

class ProductcategorieController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

    //lister les productcategories
     public function index()
     {
       $productcategories =  productcategorie::all();
       //$productcategories =  productcategorie::where('user_id',Auth::user()->id)->get();
       return view('productcategorie.index',['productcategories'=>$productcategories]);
     }

    //affiche le formulaire de creation
     public function create()
     {
         return view('productcategorie.create');
     }

    //saving a productcategorie
     public function store(Request $req)
     {
       //return $res->all();
       $productcategorie = new productcategorie();
       $productcategorie->name = $req->input('name');

       if($req->hasFile('icon')){
            // Get filename with the extension
            $filenameWithExt = $req->file('icon')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $req->file('icon')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $req->file('icon')->storeAs('public/images', $fileNameToStore);

            $productcategorie->icon = $fileNameToStore;
        }

       $productcategorie->save();

       return redirect('productcategorie');
     }

    //recupéerer un productcategorie
     public function show($id)
     {
         //
     }

    //recupérer un cv et de le mettre on a form
     public function edit($id)
     {
       $productcategorie = productcategorie::find($id);
         return view('productcategorie.edit',['productcategorie'=>$productcategorie]);
     }

    //Modifier un productcategorie
     public function update(Request $req,$id)
     {
       $productcategorie = productcategorie::find($id);

       $productcategorie->name = $req->input('name');

       if($req->hasFile('icon')){
            // Get filename with the extension
            $filenameWithExt = $req->file('icon')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $req->file('icon')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $req->file('icon')->storeAs('public/images', $fileNameToStore);

            $productcategorie->icon = $fileNameToStore;
        }

       $productcategorie->save();

       return redirect('productcategorie');
     }

    //supprimer un productcategorie
     public function destroy($id)
     {
         return redirect('productcategorie');
     }
}
