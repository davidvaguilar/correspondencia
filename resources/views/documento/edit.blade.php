@extends('layouts.panel')

@section('styles')
  <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

@endsection

@section('content')
<!-- Content Wrapper. Contains page content  style="min-height: 30px;"-->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Expediente N° {{ $expediente->id }}
      <small>Optional description</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <div class="row">
      <!-- /.col -->
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Compose New Message</h3>
          </div>
          <!-- /.box-header -->
          
          <form action="{{ url('/documentos/'.$documento->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="box-body">

              <div class="form-group row">
                <label class="col-md-2 form-control-label" for="fecha_registro">Fecha entrada</label>
                <div class="col-md-3">
                  <input type="date" name="fecha_registro" class="form-control" value="{{ old('fecha_registro', $documento->fecha_registro) }}">
                </div>
                
              </div>
              <div class="form-group row">              
                <label class="col-md-2 form-control-label" for="tipo">Tipo documento</label>
                <div class="col-md-3">
                  <select name="tipo" class="form-control">
                    <option value="memorandum">Memoramdum</option>
                    <option value="ordinario">Ordinario</option>
                    <option value="carta">Carta</option>
                    <option value="oficina">Oficina</option>
                    <option value="solicitud">Solicitud</option>
                    <option value="resolucion">Resolución</option>
                    <option value="email">E-Mail</option>
                    <option value="fotocopia">Fotocopia</option>
                  </select>
                </div>
                <label class="col-md-3 form-control-label" for="numero">Numero de documento</label>
                <div class="col-md-3">
                  <input name="numero" value="{{ old('numero', $documento->numero) }}" placeholder="N°" min="0" type="text" class="form-control">
                </div>
              </div>

              <div class="col-md-6">                
                <div class="form-group">
                  <label for="" class="control-label">De</label>
                  <input name="envia" value="{{ old('envia', $documento->envia) }}" placeholder="Quien envia:" type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-6">                  
                <div class="form-group">
                  <label for="recibe" class="control-label">Para</label>
          
                  <select name="recibidos[]" id="recibidos" class="form-control select2_usuario" multiple="multiple" data-placeholder="Quien recibe:" style="width: 100%;">
                  @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->email }}</option>
                  @endforeach                    
                  </select>
                </div>
              </div>

              <div class="form-group row">              
                <label class="col-md-2 form-control-label" for="materia">Materia</label>
                <div class="col-md-10">
                  <textarea id="materia" name="materia" class="form-control" style="height: 100px">
                    {{ old('materia', $documento->materia) }}
                  </textarea>
                </div> 
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label for="" class="control-label">Fecha Destino</label>
                  <div class="form-group">
                    <input name="fecha_destino" value="{{ old('fecha_destino', $documento->fecha_destino) }}" type="date" class="form-control">
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group">
                    <label for="" class="control-label">Destino</label>
                    <textarea id="destino" name="destino" class="form-control" style="height: 100px">
                      {{ old('destino', $documento->destino) }}
                    </textarea>
                  </div>
                </div>              
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label for="" class="control-label">Fecha Respuesta</label>
                  <div class="form-group">
                    <input name="fecha_respuesta" value="{{ old('fecha_respuesta', $documento->fecha_respuesta) }}" type="date" class="form-control">
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group">
                    <label for="" class="control-label">Respuesta Ordinario</label>
                    <textarea id="respuesta" name="respuesta" class="form-control" style="height: 100px">
                      {{ old('respuesta', $documento->respuesta) }}
                    </textarea>
                  </div>
                </div>              
              </div>

              <div class="col-md-3">
                <label for="" class="control-label">Documento Adjunto</label>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> <!--Documento Adjunto-->
                    <input type="file" name="archivo">
                  </div>
                  <p class="help-block">Max. 1MB</p>

                 <!-- <input type="file" name="photo" required>-->

                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">            
              <a href="#" class="btn btn-default"><i class="fa fa-times"></i> Cancelar</a>
              <div class="pull-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Guardar cambios</button>
              </div>
            </div>
            <!-- /.box-footer -->
          </form>

        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('scripts')
  <!-- Select2 -->
  <script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- Slimscroll -->
  <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('js/demo.js') }}"></script>
  <!-- iCheck -->
  <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

  <script>
    $(function () {
      //Add text editor
      /*$("#materia").wysihtml5();
      $("#destino").wysihtml5();
      $("#respuesta").wysihtml5();*/
      //Initialize Select2 Elements
      $('.select2_usuario').select2()

      @if( session('notificacion') )
        exito("{{ session('notificacion') }}")
      @endif

      @if( $errors->any() )
          @foreach( $errors->all() as $error )
            exito("{{ $error }}")
          @endforeach        
      @endif

      //$('#recibidos').select2('val', ['6', '11']);
      $('#recibidos').val(@json($usuario_ids)).trigger('change');
    });
  </script>
@endsection