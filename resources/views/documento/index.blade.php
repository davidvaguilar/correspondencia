@extends('layouts.panel')

@section('title')
  <b>C</b>orrespondencia
@endsection

@section('styles')
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">

  <style>
    .pagination{
      position: relative;
      display: inline;
      padding-left: 0;
      margin: 0px 0;
      border-radius: 4px;
    }
  </style>
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Bandeja Principal
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
            <h3 class="box-title">Inbox</h3>

            <div class="box-tools pull-right">
              <div class="has-feedback">
                <input type="text" class="form-control input-sm" placeholder="Search Mail">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
              </div>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <div class="mailbox-controls">
              <!-- Check all button -->
              <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
              </button>
              <!--<div class="btn-group">
               <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
              </div>
               /.btn-group -->
              <div class="pull-right">                	
                {{ $documentos->links() }}
              </div>
              <!-- /.pull-right -->
            </div>
            <div class="table-responsive mailbox-messages">
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th>Documento</th>
                    <th>De</th>
                    <th>Para</th>
                    <th>Materia</th>
                    <th>Fecha</th> 
                    <th></th>                  
                  </tr>
                </thead>
                <tbody>
                  @foreach( $documentos as $documento )
                  <tr>
                    <td class="mailbox-star">                 
                      <div class="icheck-primary">
                        <input type="checkbox" disabled @if( $documento->disponibilidad == 'ocupado' ) checked @endif   >
                      </div>
                     <!-- <i class="fa fa-user text-yellow"></i>-->
                    </td>
                    <td class="mailbox-star">{{ $documento->tipo }} # {{ $documento->numero }}</td>
                    <td class="mailbox-name"><a href="/documentos/{{ $documento->id }}">{{ $documento->envia }}</a></td>
                    <td class="mailbox-subject"><b>{{ $documento->recibe }}</b></td>
                    <td class="mailbox-attachment">{{ str_limit($documento->materia, 35)  }}</td>
                    <td class="mailbox-date">{{ $documento->fecha_registro  }}</td>
                    <td > 
                      <div class="btn-group">                     
                        <button type="button" class="btn btn-default btn-sm" data-documento="{{ $documento->id }}"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
            
                </tbody>
              </table>
              <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer no-padding">
            <div class="mailbox-controls">
              <!-- Check all button -->
              <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
              </button>
              <!--<div class="btn-group">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
              </div>
               /.btn-group -->
              <div class="pull-right">
                <div class="btn-group">
                  {{ $documentos->links() }}
                </div>
                <!--1-50/200
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                </div>
                 /.btn-group -->
              </div>
              <!-- /.pull-right -->
            </div>
          </div>
        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
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
<!-- iCheck -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>

<script>
  $(function () {

    $('[data-documento]').on('click', eliminarDocumentoModal);

    function eliminarDocumentoModal(){
      var documento_url = '/documentos/'+$(this).data('documento');
      $('#documento_url').attr('action', documento_url); //http://uri-for-button1.com
    //  document.getElementById("documento_url").action = 
      var documento_tipo = $(this).closest('td').prevAll().eq(4).text();
      //alert($(this).closest('td').prev().css( "background", "yellow" )) //.text())  //".mailbox-star"
      $('#documento_tipo').text(documento_tipo.toUpperCase());
      $('#modalEliminarDocumento').modal('show');
    }

    @if( session('notificacion') )
      exito("{{ session('notificacion') }}")
    @endif

    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
  
</script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('js/demo.js') }}"></script>
@endsection