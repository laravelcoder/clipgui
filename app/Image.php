<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Image
 *
 * @package App
 * @property string $image
*/
class Image extends Model
{
    use SoftDeletes;

    protected $fillable = ['image'];
    protected $hidden = [];
    
    
    
}
