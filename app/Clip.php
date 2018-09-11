<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Clip
 *
 * @package App
 * @property string $label
 * @property text $description
 * @property text $notes
 * @property string $clip_upload
 * @property string $industry
 * @property string $brand
*/
class Clip extends Model
{
    use SoftDeletes;

    protected $fillable = ['label', 'description', 'notes', 'clip_upload', 'industry_id', 'brand_id'];
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
    
    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id')->withTrashed();
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id')->withTrashed();
    }
    
}
