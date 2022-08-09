<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //La tabla a conectar a este modelo
    protected $table="countries";
    //La clave primaria de esa tabla
    protected $primaryKey= "country_id";
    //omitir campo de autoria
    public $timestamps=false;
    use HasFactory;

    //relacion M:M entre paises e idiomas
    public function idiomas(){
        //belongrToMany : parametros
        //1. modelo a relacionar 
        //2. la tabla pivote
        //3. FK del modelo actual en el pivote
        //FK del modelo a relacionar en el pivote
        return $this->belongsToMany(Idioma::class, 'country_languages', 'country_id', 'language_id')->withPivot('official');
    }
}
