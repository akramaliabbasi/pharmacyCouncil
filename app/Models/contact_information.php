<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact_information extends Model
{
    use HasFactory;
	public $table = "contact_informations";
	
	 protected $fillable = [

        'id','user_id','type', 'address','country','city','created_at','updated_at'
		

    ];
}
