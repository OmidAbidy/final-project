<?php

namespace App\Http\Controllers;

use App\Models\FreelancerProfile;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    public function index(){
      $freelancers = FreelancerProfile::with('user')->get();
      return view('frontend.JobProMan.freelancers', compact('freelancers'));
    }
}
