<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClipFilter
 *
 * @package App
 * @property string $filter_by
 * @property string $filters
*/
class ClipFilter extends Model
{
    use SoftDeletes;

    protected $fillable = ['filter_by', 'filters_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setFiltersIdAttribute($input)
    {
        $this->attributes['filters_id'] = $input ? $input : null;
    }
    
    public function filters()
    {
        return $this->belongsTo(Clip::class, 'filters_id')->withTrashed();
    }
    
}
