<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Brand
 *
 * @package App
 * @property string $name
 * @property string $slug
*/
class Brand extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug'];
    protected $hidden = [];
    
    
    
    public function clips()
    {
        return $this->belongsToMany(Clip::class, 'brand_clip')->withTrashed();
    }
    
}
