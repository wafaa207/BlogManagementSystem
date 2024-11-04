<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
   public function index(){

        return view('front.pages.contact_us');
    }

    public function store(Request $request){

        $contact = new ContactUs();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        session()->flash('success', 'Your Message Sent Successfully !!');
        return redirect()->route('contact_us.index');
    }

}
