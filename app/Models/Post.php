<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	// Add your validation rules here
	public static $rules = [
		'title' => 'required|between:3,255',
		'body' => 'required',
		'user_id' => 'integer',
	];

	
	protected $fillable = ['title', 'body', 'user_id'];

	public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
