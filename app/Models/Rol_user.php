<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol_user extends Model
{
    use HasFactory;
    /////////////////////
    protected $table ='rol_users';   
    protected $primaryKey = "id";
    protected $fillable = ['rol_id','user_id'];  
    public $timestamps = false;
}
