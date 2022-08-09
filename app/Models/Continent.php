<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //La tabla a conectar a este modelo
    protected $table="continents";
    //La clave primaria de esa tabla
    protected $primaryKey= "continent_id";
    //omitir campo de autoria
    public $timestamps=false;
    use HasFactory;

    //Relacion entre continente y region
    public function regiones(){
        //has Many parametros:
        //1. El modelo a relacionar
        //2. La clave fk del modelo actual en
        //El modelo a relacionar 
        return $this->hasMany(region::class, 'continent_id');
}
        

        //relacion entre continente y sus pises
        //Abuelo: Continent
        //Papa: Region
        //Nieto Country
        public function paises(){
            //hasManyThrough parametros
            //1. modelo Nieto
            //2.Modelo Papa
            //3.Fk Abuelo en el papa
            //4.FK del papa en el nieto
            return $this->hasManyThrough(Country::Class, Region::class,'continent_id','region_id');
        }
    
}
