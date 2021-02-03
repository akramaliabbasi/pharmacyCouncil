<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application_form extends Model
{
    use HasFactory;
	public $table = "application_forms";
	
	 protected $fillable = [

        'id','user_id','applicants_id', 'contact_information_id','qualification_information_id','application_title','created_at','updated_at'
		

    ];
}
