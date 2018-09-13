<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVideosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'images.*' => 'exists:images,id',
            'converted_for_downloading_at' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
            'converted_for_streaming_at' => 'nullable|date_format:'.config('app.date_format').' H:i:s',
        ];
    }
}