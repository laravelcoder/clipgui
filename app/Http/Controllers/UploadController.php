<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
	public function uploadForm()
	{
	    return view('upload_form');
	}
	 
	public function uploadSubmit(Request $request)
	{
	    // This method will cover file upload
	}
	 
	public function postClip(Request $request)
	{
	    // This method will cover whole product submit
	}
}
