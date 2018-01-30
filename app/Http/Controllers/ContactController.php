<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact ;

class ContactController extends Controller
{
    public function newContact(){
         $c = new Contact();
         $c->name = "abdelhedi hlel";
         $c->email ="test@gmailcom";
         $c->meassage ="my message";

         $c->save();
    }

    public function getcontacts(){
        $c = Contact::all();
        dd($c);
    }
}
