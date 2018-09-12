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
 * @property string $clip_upload
 * @property string $industry
 * @property string $brand
 * @property string $states
 * @property string $products
 * @property text $notes
*/
class Clip extends Model
{
    use SoftDeletes;

    protected $fillable = ['label', 'description', 'clip_upload', 'notes', 'industry_id', 'brand_id', 'states_id', 'products_id'];
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
    
}
