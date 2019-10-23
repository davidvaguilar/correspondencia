@extends('layouts.panel')


@section('styles')
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>
    .team .row .col-md-4 {
      margin-bottom: 5em;
    }
    
    .content-header>.breadcrumb {
      float: right;
      background: transparent;
      margin-top: 0;
      margin-bottom: 0;
      font-size: 12px;
      padding: 7px 5px;
      position: absolute;
      top: 4px;
      right: 10px;
      border-radius: 2px;
    }

  </style>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @if( $errors->any() )
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach( $errors->all() as $error )
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ url('/documentos') }}" method="POST">
    {{ csrf_field() }}
    <section class="content-header">
      <h1>
        Nuevo documento
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>
      <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">

        <div class="col-md-12">
          <div class="box box-primary">
           
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">

                <div class="col-md-3">
                  <label for="" class="control-label">Fecha Entrada</label>
                  <div class="form-group">
                    <input type="date" name="fecha_registro" class="form-control" value="{{ date('Y-m-d') }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="tipo" class="control-label">Tipo Documento</label>
                  <div class="form-group">
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
                </div>

                <div class="col-md-3">
                  <label for="" class="control-label">Numero de Documento</label>
                  <div class="form-group">
                    <input type="text" name="numero" class="form-control" placeholder="N°" min="0">
                  </div>
                </div>

                <div class="col-md-6">
                  
                  <div class="form-group">
                    <label for="" class="control-label">De</label>
                    <input type="text" name="envia" class="form-control" placeholder="Quien envia:">
                  </div>
                </div>
                <div class="col-md-6">                  
                  <div class="form-group">
                    <label for="" class="control-label">Para</label>
                    <input type="text" name="recibe" class="form-control" placeholder="Quien recibe:">
                  </div>
                </div>
              
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label">Materia</label>
                    <textarea id="materia" name="materia" class="form-control" style="height: 150px">
                      Mensaj de la materia
                    </textarea>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label">Destino</label>
                    <textarea id="destino" name="destino" class="form-control" style="height: 150px">
                      Destino
                    </textarea>
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="" class="control-label">Fecha</label>
                  <div class="form-group">
                    <input type="date" name="fecha" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label">Respuesta Ordinario</label>
                    <textarea id="respuesta" name="respuesta" class="form-control" style="height: 150px">
                      Respuesta ordinario
                    </textarea>
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="" class="control-label">Fecha Respuesta</label>
                  <div class="form-group">
                    <input type="date" name="fecha_respuesta" class="form-control">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">                   
                    <i class="fa fa-paperclip"></i> Adjuntar Archivo
                    <input type="file" name="attachment">                
                    <p class="help-block">Max. 32MB</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Guardar</button>
              </div>
              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Cancelar</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
      </div>    

    </section>
  </form>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
@endsection

@section('scripts')
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
    $(function() {
     /* $("#materia").wysihtml5();
      $("#destino").wysihtml5();
      $("#respuesta").wysihtml5(); */
    });

  </script>
@endsection