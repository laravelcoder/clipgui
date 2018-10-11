<?php 
namespace App\Http\Utilities;

class Brand extends Parent implements NameInterface
{

	protected static $brands = []

	public static function all()
	{
		return array_keys(static::$countries);
	}
 
	 public function list()
	 {
	 	return $this->countries;
	 }
 
	public static function names()
	{
		return array_keys(static::$countries);
	}

 
	public static function load()
	{
		return (static::$countries);
	}


}