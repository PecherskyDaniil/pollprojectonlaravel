<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
class SiteController extends Controller
{
    //
    public function info():View{
        return view('info');
    }
    public function hello($name):View{
        return view('greeting', ['name' => $name]);
    }
    public function helloempty():View{
        return view('greeting', ['name' => "somebody"]);
    }
}
