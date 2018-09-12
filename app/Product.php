<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 *
 * @package App
 * @property string $name
 * @property string $slug
*/
class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug'];
    protected $hidden = [];
    
    
    
}
