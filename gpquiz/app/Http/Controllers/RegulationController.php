<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegulationController extends Controller
{
    //
    public function index(){

        $page = request()->route()->getPrefix();
        $sucessPage = "site.regulamento";

        if($page == "/semana2019") {
            $sucessPage = "semana2019.regulamento";
        }

        if($page == "/gp2019") {
            $sucessPage = "site2019.regulamento";
        }

        return view($sucessPage);

    }

    public function indexAdmin(){

        return view('admin.regulation.index');

    }
}
