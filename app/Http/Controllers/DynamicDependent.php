<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class DynamicDependent extends Controller
{
    function index()
    {
		$country_list = DB::table('countries')->groupBy('country')->get();

		return view('dynamic_dependent', compact('brands'));
    }
}
