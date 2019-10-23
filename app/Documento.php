<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use SoftDeletes;

    protected $table = 'documentos';

    protected $fillable = [
        'fecha_registro', 'tipo', 'numero','envia', 'recibe',
            'materia', 'algo', 'fecha', 'respuesta', 'fecha_respuesta',
            'expediente_id', 'user_id'
    ];

    public function archivos(){
        return $this->hasMany('App\Archivo');
    }

    public function recibidos(){
      return $this->belongsToMany(Usuario::class);
    }

    /*public function getFeaturedImageUrlAttribute(){
        $featuredImage = $this->images()->where('featured', true)->first();
        if( !$featuredImage ){
          $featuredImage = $this->images()->first();
        }
        if( $featuredImage) {
          return $featuredImage->url;
        }
        return '/images/default.png';
    }*/

    /*public function getCategoryNameAttribute(){
        if( $this->category ){
          return $this->category->name;
        }
        return 'General';
    }*/

}
