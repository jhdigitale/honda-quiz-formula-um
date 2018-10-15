<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegulationController extends Controller
{
    //
    public function index(){

        return view('site.regulamento');

    }

    public function indexAdmin(){

        return view('admin.regulation.index');

    }
}
