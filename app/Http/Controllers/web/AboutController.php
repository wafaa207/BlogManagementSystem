<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about_us(){
        return view('front.pages.about_us');
    }

}
