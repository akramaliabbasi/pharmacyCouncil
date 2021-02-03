<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class experience_information extends Model
{
    use HasFactory;
	public $table = "experience_informations";
	
	 protected $fillable = [

        'id','user_id','qualification_level', 'year_of_passing','name_of_institute','board_university','certificate_image','created_at','updated_at'
		

    ];
}
