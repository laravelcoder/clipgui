<?php

namespace App\Http\Controllers\Admin;

use App\ClipFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClipFiltersRequest;
use App\Http\Requests\Admin\UpdateClipFiltersRequest;

class ClipFiltersController extends Controller
{
    /**
     * Display a listing of ClipFilter.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('clip_filter_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('clip_filter_delete')) {
                return abort(401);
            }
            $clip_filters = ClipFilter::onlyTrashed()->get();
        } else {
            $clip_filters = ClipFilter::all();
        }

        return view('admin.clip_filters.index', compact('clip_filters'));
    }

    /**
     * Show the form for creating new ClipFilter.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('clip_filter_create')) {
            return abort(401);
        }
        
        $filters = \App\Clip::get()->pluck('label', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.clip_filters.create', compact('filters'));
    }

    /**
     * Store a newly created ClipFilter in storage.
     *
     * @param  \App\Http\Requests\StoreClipFiltersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClipFiltersRequest $request)
    {
        if (! Gate::allows('clip_filter_create')) {
            return abort(401);
        }
        $clip_filter = ClipFilter::create($request->all());



        return redirect()->route('admin.clip_filters.index');
    }


    /**
     * Show the form for editing ClipFilter.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('clip_filter_edit')) {
            return abort(401);
        }
        
        $filters = \App\Clip::get()->pluck('label', 'id')->prepend(trans('global.app_please_select'), '');

        $clip_filter = ClipFilter::findOrFail($id);

        return view('admin.clip_filters.edit', compact('clip_filter', 'filters'));
    }

    /**
     * Update ClipFilter in storage.
     *
     * @param  \App\Http\Requests\UpdateClipFiltersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClipFiltersRequest $request, $id)
    {
        if (! Gate::allows('clip_filter_edit')) {
            return abort(401);
        }
        $clip_filter = ClipFilter::findOrFail($id);
        $clip_filter->update($request->all());



        return redirect()->route('admin.clip_filters.index');
    }


    /**
     * Display ClipFilter.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('clip_filter_view')) {
            return abort(401);
        }
        $clip_filter = ClipFilter::findOrFail($id);

        return view('admin.clip_filters.show', compact('clip_filter'));
    }


    /**
     * Remove ClipFilter from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('clip_filter_delete')) {
            return abort(401);
        }
        $clip_filter = ClipFilter::findOrFail($id);
        $clip_filter->delete();

        return redirect()->route('admin.clip_filters.index');
    }

    /**
     * Delete all selected ClipFilter at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('clip_filter_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ClipFilter::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ClipFilter from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('clip_filter_delete')) {
            return abort(401);
        }
        $clip_filter = ClipFilter::onlyTrashed()->findOrFail($id);
        $clip_filter->restore();

        return redirect()->route('admin.clip_filters.index');
    }

    /**
     * Permanently delete ClipFilter from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('clip_filter_delete')) {
            return abort(401);
        }
        $clip_filter = ClipFilter::onlyTrashed()->findOrFail($id);
        $clip_filter->forceDelete();

        return redirect()->route('admin.clip_filters.index');
    }
}
