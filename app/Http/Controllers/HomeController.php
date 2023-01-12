<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index() 
    {
        return view('home.index');
    }
    public function listUsersReferralPoints(){
        $referalList = User::where('role_id',2)->get();
        return view('home.view_referral_point',compact('referalList'));
    }
}