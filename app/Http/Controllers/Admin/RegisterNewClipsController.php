<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class RegisterNewClipsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('register_new_clip_access')) {
            return abort(401);
        }
        return view('admin.register_new_clips.index');
    }
}
