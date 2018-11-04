<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Testimonial extends Model
{
    protected $fillable = ['name', 'comment', 'order'];

	public static function sort($order)
	{

		foreach($order as $k=>$v){
			DB::table('testimonials')
				->where('id', '=', $v)
				->update(['order' => $k]);
		}

		return true;
	}
}
