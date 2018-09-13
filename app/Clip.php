<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\Traits\FileUploadTrait;

/**
 * Class Clip
 *
 * @package App
 * @property string $title
 * @property string $original_name
 * @property string $disk
 * @property string $path
 * @property string $label
 * @property text $description
 * @property string $clip_upload
 * @property string $industry
 * @property string $brand
 * @property string $states
 * @property string $products
 * @property text $notes
 * @property string $converted_for_downloading_at
 * @property string $converted_for_streaming_at
*/
class Clip extends Model
{
    use SoftDeletes;
    use FileUploadTrait;

    protected $fillable = ['title', 'original_name', 'disk', 'path', 'label', 'description', 'clip_upload', 'notes', 'converted_for_downloading_at', 'converted_for_streaming_at', 'industry_id', 'brand_id', 'states_id', 'products_id'];
    protected $hidden = [];

    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setIndustryIdAttribute($input)
    {
        $this->attributes['industry_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setBrandIdAttribute($input)
    {
        $this->attributes['brand_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setStatesIdAttribute($input)
    {
        $this->attributes['states_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProductsIdAttribute($input)
    {
        $this->attributes['products_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setConvertedForDownloadingAtAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['converted_for_downloading_at'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['converted_for_downloading_at'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getConvertedForDownloadingAtAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setConvertedForStreamingAtAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['converted_for_streaming_at'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['converted_for_streaming_at'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getConvertedForStreamingAtAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }
    
    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id')->withTrashed();
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id')->withTrashed();
    }
    
    public function states()
    {
        return $this->belongsTo(State::class, 'states_id')->withTrashed();
    }
    
    public function products()
    {
        return $this->belongsTo(Product::class, 'products_id')->withTrashed();
    }
    
    public function images()
    {
        return $this->belongsToMany(Image::class, 'clip_image')->withTrashed();
    }
    
}
