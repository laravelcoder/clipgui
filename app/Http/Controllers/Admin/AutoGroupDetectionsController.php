<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class AutoGroupDetectionsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('auto_group_detection_access')) {
            return abort(401);
        }
        return view('admin.auto_group_detections.index');
    }
}
