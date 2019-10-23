<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Archivo extends Model
{
    use SoftDeletes;

    protected $table = 'archivos';

    protected $fillable = [ 'nombre', 'enlace', 'documento_id' ];

    public function documento(){
        return $this->belongsTo('App\Documento');
    }
  

    public function geturlAttribute(){
        
        //if( $this->url ){
            return "/files/".$this->enlace;  //"/files/asd/".$this->url;
        //}
        
    }

    
}
