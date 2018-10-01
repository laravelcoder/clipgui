<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

trait FileUploadTrait-saved
{

    /**
     * File upload trait used in controllers to upload files
     */
    public function saveFiles(Request $request)
    {
        $clipPath = public_path(env('CLIP_PATH'));
        $uploadPath = public_path(env('UPLOAD_PATH'));
        $imagePath = public_path(env('UPLOAD_PATH').'/images');
        $thumbPath = public_path(env('UPLOAD_PATH').'/thumb');
        $caiPath = public_path(env('UPLOAD_PATH').'/cai');

        if (! file_exists($uploadPath)) {
            mkdir($clipPath, 0775);
            mkdir($uploadPath, 0775);
            mkdir($thumbPath, 0775);
            mkdir($imagePath, 0775);
            mkdir($caiPath, 0775);
        }

        if (! file_exists($caiPath)) {
            mkdir($caiPath, 0775);
        }

        $getcai = env('CAI_SERVER');
        $transcoder = "/TOCAI.php?";

        $finalRequest = $request;

        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {
                if ($request->has($key . '_max_width') && $request->has($key . '_max_height')) {
                    // Check file width
                    $filename = time() . '-' . $request->file($key)->getClientOriginalName();
                    $file     = $request->file($key);
                    $image    = Image::make($file);
                    if (! file_exists($thumbPath)) {
                        mkdir($thumbPath, 0775, true);
                    }
                    Image::make($file)->resize(50, 50)->save($thumbPath . '/' . $filename);
                    $width  = $image->width();
                    $height = $image->height();
                    if ($width > $request->{$key . '_max_width'} && $height > $request->{$key . '_max_height'}) {
                        $image->resize($request->{$key . '_max_width'}, $request->{$key . '_max_height'});
                    } elseif ($width > $request->{$key . '_max_width'}) {
                        $image->resize($request->{$key . '_max_width'}, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    } elseif ($height > $request->{$key . '_max_height'}) {
                        $image->resize(null, $request->{$key . '_max_height'}, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }
                    $image->save($imagePath . '/' . $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                } else {
                    $filename = $request->file($key)->getClientOriginalName();
                    if(preg_match('/^.*\.(mp4|mov|mpg|mpeg|wmv|mkv)$/i', $filename)){
                        $filename = $request->file($key)->getClientOriginalName();
                        $filename = preg_replace('/([^.a-z0-9]+)/i', '-', $filename);
                        $filename = str_replace(' ', '_', strtolower($filename));
                        $basename = substr($filename, 0, strrpos($filename, "."));





                        /**
                         * THIS IS THE CALL TO THE TRANSCODE SERVER RUNNING WGET IN PHP EXEC
                         */
                        exec("wget -q " . $getcai . $transcoder . url("/") . "/" . $filename ." -O " . $caiPath . "/" . $basename . ".cai");





                        $request->file($key)->move($clipPath, $filename);
                        $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                    }else{
                        $filename = $request->file($key)->getClientOriginalName();
                        $filename = preg_replace('/([^.a-z0-9]+)/i', '-', $filename);
                        $filename = str_replace(' ', '_', strtolower($filename));
                        $request->file($key)->move($uploadPath, $filename);
                        $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));
                    }
                }
            }
        }

        return $finalRequest;
    }
}
