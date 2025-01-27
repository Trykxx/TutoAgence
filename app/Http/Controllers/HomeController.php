<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $properties = Property::orderBy('created_at', 'desc')->limit(4)->get();
        return view('front/home',[
            'properties' => $properties
        ]);
    }
}
