<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Testimonial;
use App\Models\BlogModel;
use App\Models\contactModel;
use App\Models\TeamModel;
use App\Models\ShopModel;

class HomeController extends Controller
{
    public function home()
    {
        $testimonials=testimonial::all();
        $blogs=blogmodel::latest()->take(3)->get();
        return view('webpages.home',compact('testimonials','blogs'));
        // dd(Auth::user());
    }

    public function shop()
    {
        $shops= ShopModel::all();
        return view('webpages.shop',compact('shops'));
    }
    
    public function aboutus()
    {
        $testimonials=testimonial::all();
        $teams=teammodel::all();
        return view('webpages.aboutus',compact('testimonials','teams'));
    }

    public function services()
    {
        return view('webpages.services');
    }
    
    public function blog()
    {
        $blogs=blogmodel::latest()->get();
        return view('webpages.blog',compact('blogs'));
    }

    public function contact()
    {
        return view('webpages.contact');
    }

    public function contactus(Request $request)
    {
        $contact= new contactmodel;
        $contact->fname=$request->fname;
        $contact->lname=$request->lname;
        $contact->email=$request->email;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->back();

    }

    public function cart()
    {
        return view('webpages.cart');
    }

}
