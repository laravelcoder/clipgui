<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClipFilter
 *
 * @package App
 * @property string $filter_by
*/
class ClipFilter extends Model
{
    use SoftDeletes;

    protected $fillable = ['filter_by'];
    protected $hidden = [];
    
    
    
}
