<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_registro');
            $table->string('tipo', 100);
            $table->string('numero', 20);
            $table->string('envia', 100);
            //$table->string('recibe', 100)->nullable();
           // $table->integer('recibe_usuario')->unsigned()->nullable();
           // $table->foreign('recibe_usuario')->references('id')->on('users'); // Envia
            
            $table->text('materia')->nullable();
            $table->text('destino')->nullable();
            $table->date('fecha_destino')->nullable();
            $table->text('respuesta')->nullable();
            $table->date('fecha_respuesta')->nullable();           
            $table->string('estado', 20)->default('disponible'); //disponible  | ocupado

            $table->integer('usuario_estado')->unsigned()->nullable();
            $table->foreign('usuario_estado')->references('id')->on('usuarios');

            $table->string('formato', 20)->default('digital');

            $table->integer('expediente_id')->unsigned();
            $table->foreign('expediente_id')->references('id')->on('expedientes')->onDelete('cascade');

            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');  //Crear
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
