<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 *
 * @package App
 * @property string $name
*/
class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
    
    
    
}
