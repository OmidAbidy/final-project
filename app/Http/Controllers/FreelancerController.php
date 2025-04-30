<?php

namespace App\Http\Controllers;

use App\Models\FreelancerProfile;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
  public function index()
  {
    $freelancers = FreelancerProfile::with('user')->get();
    return view('frontend.JobProMan.freelancers', compact('freelancers'));
  }

  public function show()
  {
    $freelancers = FreelancerProfile::with('user')->get();
    return view('backend.freelancer.visit', compact('freelancers'));
  }

  public function publicShow($id)
{
    $freelancer = \App\Models\FreelancerProfile::with('user')->findOrFail($id);
    return view('backend.freelancer.publicShow', compact('freelancer'));
}

}
