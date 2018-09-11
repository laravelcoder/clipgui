<?php

namespace App\Http\Controllers\Api\V1;

use App\ClipFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClipFiltersRequest;
use App\Http\Requests\Admin\UpdateClipFiltersRequest;

class ClipFiltersController extends Controller
{
    public function index()
    {
        return ClipFilter::all();
    }

    public function show($id)
    {
        return ClipFilter::findOrFail($id);
    }

    public function update(UpdateClipFiltersRequest $request, $id)
    {
        $clip_filter = ClipFilter::findOrFail($id);
        $clip_filter->update($request->all());
        

        return $clip_filter;
    }

    public function store(StoreClipFiltersRequest $request)
    {
        $clip_filter = ClipFilter::create($request->all());
        

        return $clip_filter;
    }

    public function destroy($id)
    {
        $clip_filter = ClipFilter::findOrFail($id);
        $clip_filter->delete();
        return '';
    }
}
