<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class DedupsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('dedup_access')) {
            return abort(401);
        }
        return view('admin.dedups.index');
    }
}
