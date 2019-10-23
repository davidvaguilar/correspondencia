@extends('layouts.panel')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ strtoupper($documento->tipo) }}
      <small>N° {{ $documento->numero }}</small>
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
            <h3 class="box-title">Enviado por: {{ $documento->envia }}</h3>

            <div class="box-tools pull-right">
              <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Anterior"><i class="fa fa-chevron-left"></i></a>
              <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Proximo"><i class="fa fa-chevron-right"></i></a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <div class="mailbox-read-info">
              <h3>Asunto: {{ str_limit($documento->materia, 75) }}</h3>
              <h5>Para: {{ $documento->recibe }}
                <span class="mailbox-read-time pull-right">{{ $documento->fecha_registro }} <!--15 Feb. 2016 11:03 PM--></span>
              </h5>
            </div>
            <!-- /.mailbox-read-info
            <div class="mailbox-controls with-border text-center">
              <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                  <i class="fa fa-trash-o"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                  <i class="fa fa-reply"></i></button>
              </div>
              <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                <i class="fa fa-print"></i></button>
            </div> -->
            <!-- /.mailbox-controls 
            <div class="mailbox-read-message">
              <p>Hello John,</p>

              <p>Thanks,<br>Jane</p>
            </div>-->



            <!-- <div class="mailbox-read-message"> -->
            <div class="box-group" id="accordion">
              <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
              <div class="panel box box-warning">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      Materia
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                  <div class="box-body">
                    <p>{{ $documento->materia }}</p>
                  </div>
                </div>
              </div>
              <div class="panel box box-danger">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                      Destino
                    </a>
                  </h4>
                  <div class="pull-right">
                    Fecha Destino: {{ $documento->fecha_destino }}
                  </div>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="box-body">
                    <p>{{ $documento->destino }}</p>
                  </div>
                </div>
              </div>
              <div class="panel box box-success">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                      Respuesta Ordinario
                    </a>
                  </h4>
                  <div class="pull-right">
                    Fecha Respuesta: {{ $documento->fecha_respuesta }}
                  </div>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                  <div class="box-body">
                    <p>{{ $documento->respuesta }}</p>
                  </div>
                </div>
              </div>
            </div>              
            <!-- </div> -->

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <ul class="mailbox-attachments clearfix">
              @foreach ($archivos as $archivo)
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                  <div class="mailbox-attachment-info">
                    <a href="{{ $archivo->url }}" download="{{ $archivo->nombre }}" class="mailbox-attachment-name">
                      <i class="fa fa-paperclip"></i> {{ $archivo->nombre }}
                    </a>
                    <span class="mailbox-attachment-size">
                      Aproximadamente 1,245 KB
                      <a href="{{ $archivo->url }}" download="{{ $archivo->nombre }}" class="btn btn-default btn-xs pull-right">
                        <i class="fa fa-cloud-download"></i>
                      </a>
                    </span>
                  </div>
                </li>
              @endforeach
              <li>
                <span class="mailbox-attachment-icon has-img"><img src="{{ asset('img/photo1.png') }}" alt="Attachment"></span>
                <div class="mailbox-attachment-info">
                  <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo1.png</a>
                    <span class="mailbox-attachment-size">
                      2.67 MB
                      <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                    </span>
                </div>
              </li>
            </ul>
          </div>
          <!-- /.box-footer -->
          <div class="box-footer">
            <button type="button" class="btn btn-default" data-documento="{{ $documento->id }}"><i class="fa fa-trash-o"></i> Eliminar</button>
            <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
            <div class="pull-right">
              <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Responder</button>
              <a href="/documentos/{{ $documento->id }}/edit" class="btn btn-default"><i class="fa fa-pencil"></i> Editar</a>
            </div>
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
    </div>
  </section>
  <!-- /.content -->
</div>

@include('documento.delete')

@endsection

@section('scripts')
  <!-- Slimscroll -->
  <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('js/demo.js') }}"></script>
  <script>
    $(function () {

      $('[data-documento]').on('click', eliminarDocumentoModal);
 
      function eliminarDocumentoModal(){
        var documento_url = '/documentos/'+$(this).data('documento');
        $('#documento_url').attr('action', documento_url); 
        var documento_tipo = `{{ strtoupper($documento->tipo) }} N° {{ $documento->numero }}`;
        $('#documento_tipo').text(documento_tipo.toUpperCase());
        $('#modalEliminarDocumento').modal('show');
      }

      @if( session('notificacion') )
        exito("{{ session('notificacion') }}")
      @endif
    });
  </script>
@endsection