<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        return view('home');
    }*/
    public function index()
    {
        $home = \App\Page::where('id', 1)->first();
        $about = \App\Page::where('id', 2)->first();
        $contact = \App\Page::where('id', 3)->first();
        $map = \App\Page::where('id', 4)->first();
        $social = \App\Page::where('id', 5)->first();
        $partners = \App\Partner::all();
        $properties = \App\Property::all();
        return view('welcome', [
          'home' => $home, 'about' => $about,
          'contact' => $contact, 'map' => $map,
          'partners' => $partners, 'social' => $social,
          'properties' => $properties
        ]);
    }

    public function contact(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email',
          'phone' => 'required',
          'message' => 'required'
      ]);
        $requestData = $request->all();

        \App\Message::create($requestData);

        return back()->with('flash_message', 'We have received your message and one of our advisors will contact you as soon as possible!');
    }
}
