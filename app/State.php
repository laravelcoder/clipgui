<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class State
 *
 * @package App
 * @property string $state
 * @property string $slug
*/
class State extends Model
{
    use SoftDeletes;

    protected $fillable = ['state', 'slug'];
    protected $hidden = [];
    
    
    
}
