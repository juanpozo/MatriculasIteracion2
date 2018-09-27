<?php

namespace App\Enums;
use App\Enums;
use Illuminate\Support\Facades\DB;
use App\Models\FichaAlumno;

abstract class NivelEducacionalEnum extends Enum {

 static function getPossibleENUM(){

        //Se rellena la cadena con los datos por parámetro
        $cadena = 'SHOW COLUMNS FROM ' . 'apoderados' . ' WHERE Field = "' . 'nivelEducacional' . '"';

        $type = DB::select(DB::raw($cadena))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();

        foreach(explode(',', $matches[1]) as $value){
            $values[trim($value, "'")] = trim($value, "'");
            
        }
        return $values;
    }

}

?>