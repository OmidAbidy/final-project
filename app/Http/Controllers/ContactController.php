<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class ContactController extends Controller
{
   public function index(){
    return view('home.contact');
   }
}
