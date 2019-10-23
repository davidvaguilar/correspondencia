<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $table = 'expedientes';

    protected $fillable = [
        'fecha_registro', 'user_id'
    ];

    public function documentos(){
        return $this->hasMany("App\Documento");
    }

    

}
