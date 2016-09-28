<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data= array(
            'title' =>'Dashboard',
            'active' =>'dashboard',
            'meta' => 'dashboard'
            );
        return view('admin/pages/blank')->with('data',$data);
    }

}
