<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    /////////////////////
    protected $table ='roles';   //aqui decios se conecte a la tabla  roles
    protected $primaryKey = "id";
    protected $fillable = ['titulo'];  //fillable guarda todos los datos en la tabla sirve para insersiones o modificaciones
    public $timestamps = false;     //decimos q la tabla no iene los campos created_at y updated_at
}
