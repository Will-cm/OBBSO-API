<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;
    /////////////////////
    protected $table ='permisos';   
    protected $primaryKey = "id";
    protected $fillable = ['rol_id', 'modulo_id', 'estado'];  
    public $timestamps = false;
}
