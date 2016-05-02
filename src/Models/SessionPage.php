<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SessionPage extends Model
{
    use SoftDeletes;

	public $table = "sessionPages";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "parent_id",
		"name",
		"url",
		"newpage",
		"content"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "parent_id" => "integer",
		"name" => "string",
		"url" => "string",
		"newpage" => "boolean",
		"content" => "string"
    ];

	public static $rules = [
	    "parent_id" => "required",
		"name" => "required"
	];

}
