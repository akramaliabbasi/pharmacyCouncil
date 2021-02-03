<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicants extends Model
{
    use HasFactory;
	
	    protected $fillable = [

        'id','user_id','title', 'first_name','middle_name','last_name','father_name','occupation','marital_status','gender',
		'date_of_birth','domicile','country_of_birth','religion','permission','profile_image','comments','degree_calculation_status',
		'status','created_at','updated_at'
		

    ];
}
