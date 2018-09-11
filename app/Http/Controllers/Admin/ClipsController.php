<?php

namespace App\Http\Controllers\Admin;

use App\Clip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClipsRequest;
use App\Http\Requests\Admin\UpdateClipsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class ClipsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Clip.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('clip_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('clip_delete')) {
                return abort(401);
            }
            $clips = Clip::onlyTrashed()->get();
        } else {
            $clips = Clip::all();
        }

        return view('admin.clips.index', compact('clips'));
    }

    /**
     * Show the form for creating new Clip.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('clip_create')) {
            return abort(401);
        }
        
        $industries = \App\Industry::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $brands = \App\Brand::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.clips.create', compact('industries', 'brands'));
    }

    /**
     * Store a newly created Clip in storage.
     *
     * @param  \App\Http\Requests\StoreClipsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClipsRequest $request)
    {
        if (! Gate::allows('clip_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $clip = Clip::create($request->all());



        return redirect()->route('admin.clips.index');
    }


    /**
     * Show the form for editing Clip.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('clip_edit')) {
            return abort(401);
        }
        
        $industries = \App\Industry::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $brands = \App\Brand::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $clip = Clip::findOrFail($id);

        return view('admin.clips.edit', compact('clip', 'industries', 'brands'));
    }

    /**
     * Update Clip in storage.
     *
     * @param  \App\Http\Requests\UpdateClipsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClipsRequest $request, $id)
    {
        if (! Gate::allows('clip_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $clip = Clip::findOrFail($id);
        $clip->update($request->all());



        return redirect()->route('admin.clips.index');
    }


    /**
     * Display Clip.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('clip_view')) {
            return abort(401);
        }
        
        $industries = \App\Industry::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $brands = \App\Brand::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');$clip_filters = \App\ClipFilter::where('filters_id', $id)->get();$states = \App\State::whereHas('clips',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();$brands = \App\Brand::whereHas('clips',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();$products = \App\Product::whereHas('clips',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();

        $clip = Clip::findOrFail($id);

        return view('admin.clips.show', compact('clip', 'clip_filters', 'states', 'brands', 'products'));
    }


    /**
     * Remove Clip from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('clip_delete')) {
            return abort(401);
        }
        $clip = Clip::findOrFail($id);
        $clip->delete();

        return redirect()->route('admin.clips.index');
    }

    /**
     * Delete all selected Clip at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('clip_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Clip::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Clip from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('clip_delete')) {
            return abort(401);
        }
        $clip = Clip::onlyTrashed()->findOrFail($id);
        $clip->restore();

        return redirect()->route('admin.clips.index');
    }

    /**
     * Permanently delete Clip from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('clip_delete')) {
            return abort(401);
        }
        $clip = Clip::onlyTrashed()->findOrFail($id);
        $clip->forceDelete();

        return redirect()->route('admin.clips.index');
    }
}
