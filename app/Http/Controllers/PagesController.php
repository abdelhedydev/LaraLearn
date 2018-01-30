<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function toprofile(){
        $title ="Profile";
        return view('profile')->with('title',$title);
    }
    public function toabout(){
        $title =array(
            'id' => 1,
            'name'=>'laravel test'
        );
        return view('about')->with('title',$title);
    }
}
