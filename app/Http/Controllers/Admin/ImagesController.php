<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreImagesRequest;
use App\Http\Requests\Admin\UpdateImagesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class ImagesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Image.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('image_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('image_delete')) {
                return abort(401);
            }
            $images = Image::onlyTrashed()->get();
        } else {
            $images = Image::all();
        }

        return view('admin.images.index', compact('images'));
    }

    /**
     * Show the form for creating new Image.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('image_create')) {
            return abort(401);
        }
        return view('admin.images.create');
    }

    /**
     * Store a newly created Image in storage.
     *
     * @param  \App\Http\Requests\StoreImagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImagesRequest $request)
    {
        if (! Gate::allows('image_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $image = Image::create($request->all());



        return redirect()->route('admin.images.index');
    }


    /**
     * Show the form for editing Image.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('image_edit')) {
            return abort(401);
        }
        $image = Image::findOrFail($id);

        return view('admin.images.edit', compact('image'));
    }

    /**
     * Update Image in storage.
     *
     * @param  \App\Http\Requests\UpdateImagesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImagesRequest $request, $id)
    {
        if (! Gate::allows('image_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $image = Image::findOrFail($id);
        $image->update($request->all());



        return redirect()->route('admin.images.index');
    }


    /**
     * Display Image.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('image_view')) {
            return abort(401);
        }
        $videos = \App\Video::whereHas('images',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();$clips = \App\Clip::whereHas('images',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();

        $image = Image::findOrFail($id);

        return view('admin.images.show', compact('image', 'videos', 'clips'));
    }


    /**
     * Remove Image from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('image_delete')) {
            return abort(401);
        }
        $image = Image::findOrFail($id);
        $image->delete();

        return redirect()->route('admin.images.index');
    }

    /**
     * Delete all selected Image at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('image_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Image::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Image from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('image_delete')) {
            return abort(401);
        }
        $image = Image::onlyTrashed()->findOrFail($id);
        $image->restore();

        return redirect()->route('admin.images.index');
    }

    /**
     * Permanently delete Image from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('image_delete')) {
            return abort(401);
        }
        $image = Image::onlyTrashed()->findOrFail($id);
        $image->forceDelete();

        return redirect()->route('admin.images.index');
    }
}
