<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Brand
 *
 * @package App
 * @property string $name
*/
class Brand extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
    
    
    
}
