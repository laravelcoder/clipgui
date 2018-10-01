<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClipsRequest;
use App\Http\Requests\Admin\UpdateClipsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class AjaxController extends Controller
{
    use FileUploadTrait;

    // public function uploadSubmit(Request $request)
    // { // https://laraveldaily.com/laravel-ajax-file-upload-blueimp-jquery-library/
    //     $clips = [];
    //     foreach ($request->clips as $clip) {
    //         $filename = $clip->store('clips');
    //         $product_clip = Clip::create([
    //             'filename' => $filename
    //         ]);
     
    //         $clip_object = new \stdClass();
    //         $clip_object->name = str_replace('clips/', '', $clip->getClientOriginalName());
    //         $clip_object->size = round(Storage::size($filename) / 1024, 2);
    //         //$clip_object->fileID = $clip->id;
    //         $clips[] = $photo_object;
    //     }
     
    //     return response()->json(array('files' => $clips), 200);
     
    // }


// public function postProduct(Request $request)
// {
//     $product = Product::create($request->all());
//     ProductPhoto::whereIn('id', explode(",", $request->file_ids))
//         ->update(['product_id' => $product->id]);
//     return 'Product saved successfully';
// }


    function postdata(Request $request)
    {

        $request = $this->saveFiles($request);

 
        $validation = Validator::make($request->all(), [
            'clip_upload' => 'required'
        ]);

        $errors = [];
        $success_output = '';
        if($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $errors[] = $messages;
            }
        }
        else 
        {
            if($request->get('button') ==  "insert")
            {
                $clip = new Clip([
                    'clip_upload' => $request->get('clip_upload')
                ]);

                $clip->save();

                $success_output = '<div class="alert alert-sucess">Clip Uploaded Successfully</div>';
            }
        }
        $output = [
            'error' => $errors,
            'success' => $success_output
        ];

        echo json_encode($output);

    }

    function processclip(Request $request)
    {
            $request = $this->processClip($request);
    }
}
