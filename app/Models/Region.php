<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
        //La tabla a conectar a este modelo
        protected $table="Regions";
        //La clave primaria de esa tabla
        protected $primaryKey= "region_id";
        //omitir campo de autoria
        public $timestamps=false;
        use HasFactory;

        //relacion entre regiones y contienente
        public function continente(){
            //belongsTo: Parametros
            //1. El modelo a Relacionar
            //2. la Fk del modelo a relacionar
            //En el modelo actual
            return $this->belongsTo(Continent::class, 'continent_id');
        }

        //relacion entre region 1 - M paises
        public function paises(){
            return $this->hasMany(Country::class, 'region_id');
        }
}
