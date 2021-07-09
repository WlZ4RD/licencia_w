<?php
  
  session_start();

  if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
    header("location: interfazPrincipal.php");
    exit;
  }
?>

<?php
    include 'head.php';
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php 
    include 'navbar.php';
  ?>
  <?php
    include 'navbarMenuDerecho.php';
    include 'servidor.php';
  ?>
  <!-- Titulo de la pagina-->
<div class="content-wrapper">
    <br>
    <div><h4 style="font-family: Segoe UI Black;">Gestionar Licencias, Autorizaciones y Tipos</h4></div>
    <br>
    <div class="row">
      <div class="col-4" style="padding-right: 0px;">
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                      <h4 style="font-family: arrial narrow">Licencias y Autorizaciones</h4>
                      <div class="input-group input-group-sm">
                        <input type="text" name="table_search" id="q" class="form-control" placeholder="Buscar" onkeyup='load_licencias(1);'>

                        <div class="input-group-append" style="margin-right: 6px;">
                          <button style="border-radius: 0px 4px 4px 0px;" type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                        
                        <div class="input-group pull-left">
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevaLicenciaAutorizacion"><span class="fa fa-file-text"></span> Nueva Licencia Autorizacion</button>
                        </div>
                        
                      </div>
                  </div>
                  <!-- /.tabla -->
                  <div class="card-body table-responsive p-0" id="resultadosLicenciasAutorizaciones">
                    
                  </div>
                
                </div>
             
              </div>
            </div>
        </section>
      </div>
      <div class="col-8" style="padding-left: 0px">
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                      <h4 style="font-family: arrial narrow">Tipos de Licencias y Autorizaciones</h4>
                      <div class="input-group input-group-sm">
                       
                        <input type="text" name="table_search" id="t" class="form-control" placeholder="Buscar" onkeyup='load_tipos_licencias(1);'>

                        <div class="input-group-append" style="margin-right: 6px;">
                          <button style="border-radius: 0px 4px 4px 0px;" type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                        
                        <div class="btn-group pull-left">
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevoTipo"><span class="fa fa-file-text"></span> Nuevo Tipo</button>
                        </div>
                      </div>
                  </div>
                  <!-- /.tabla -->
                  <div class="card-body table-responsive p-0" id="resultadosTipos">
                    
                  </div>
                
                </div>
             
              </div>
            </div>


          <div class="modal overlay bd-modal-md" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          </div>
          <div class="modal overlay bd-modal-md" id="editarModal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          </div>
        </section>
      </div>       
    </div>
    <?php
      include("modal/registroNuevoLicenciaAutorizacion.php");
      include("modal/registroNuevoTipo.php");
      include("modal/registroNuevoLicenciaAutorizacion1.php");
    ?>

    <?php
      include 'scriptFinal.php';
    ?>



</body>
</html>
<script>

    $(document).ready(function(){
      load_licencias(1);
      load_tipos_licencias(1);
    });

    function load_licencias(page){
      var q= ($("#q").val()!=undefined && $("#q").val()!=null && $("#q").val()!='')?$("#q").val():"";
      $.ajax({
        url:'ajax/buscarLicenciasAutorizaciones.php',
        method: "GET",
        data:{q:q},     
        success:function(data){
          $("#resultadosLicenciasAutorizaciones").html(data);
        }
      })
    }

      function load_tipos_licencias(page){
      var q= ($("#t").val()!=undefined && $("#t").val()!=null && $("#t").val()!='')?$("#t").val():"";
      $.ajax({
        url:'ajax/buscarTiposLicenciasAutorizaciones.php',
        method: "GET",
        data:{q:q},     
        success:function(data){
          $("#resultadosTipos").html(data);
        }
      })
    }

    $("#guardarLicenciaAutorizacion").submit(function(e) {

        var url = "ajax/registro_nuevo_licencia_autorizacion.php";
        $.ajax({
               type: "POST",
               url: url,
               data: $("#guardarLicenciaAutorizacion").serialize(), 
               success: function(data)
               {
                $("#resultados_ajax").html(data);
                  // alert(data); 
                  load_licencias(1);
               }
             });

        e.preventDefault(); 
    });

    $("#guardarLicenciaAutorizacion1").submit(function(e) {

        var url = "ajax/registro_nuevo_licencia_autorizacion1.php";
        $.ajax({
               type: "POST",
               url: url,
               data: $("#guardarLicenciaAutorizacion1").serialize(), 
               success: function(data)
               {
                $("#resultados_ajax1").html(data);
                  // alert(data); 
                  load_licencias(1);
               }
             });

        e.preventDefault(); 
    });

        
    $("#guardarTipoLicencia").submit(function(e) {

        var url = "ajax/registro_nuevo_tipo.php";
        $.ajax({
               type: "POST",
               url: url,
               data: $("#guardarTipoLicencia").serialize(), 
               success: function(data)
               {
                $("#resultados_ajax_tipo_licencia").html(data);
                  // alert(data); 
                  load_tipos_licencias(1);
               }
             });

        e.preventDefault(); 
    });

    function confirmEditar(editar){
      $.ajax({
      url: 'datosEditarLicenciasAutorizaciones.php',
      type: 'GET',
      datatype: 'html',
      data: {editar: editar},
      })
      .done(function(resultado) {
        $("#editarModal").html(resultado);
      })
    }

    function confirmEditar1(editar1, editar2){
      $.ajax({
      url: 'datosEditarTiposLicenciasAutorizaciones.php',
      type: 'GET',
      datatype: 'html',
      data: {editar1: editar1, editar2: editar2},
      })
      .done(function(resultado) {
        $("#editarModal1").html(resultado);
      })
    }

    function editarLicAut(){
    var url = 'ajax/modificar_licencia_autorizaciones.php';
        $.ajax({
           type: "POST",
           url: url,
           data: $("#editarLicenciaAutorizacion").serialize(), 
           success: function(data)
           {
            $("#resultados_licAut").html(data);
              //alert(data); 
              load_licencias(1);
           }
         });
    }

    function editarTipoLicAut(){
    var url = 'ajax/modificar_tipo_licencia_autorizaciones.php';
        $.ajax({
           type: "POST",
           url: url,
           data: $("#editarTipoLicencia").serialize(), 
           success: function(data)
           {
            $("#resultados_ajaxTipoLicAut").html(data);
              //alert(data); 
              load_tipos_licencias(1);
           }
         });
    }

</script>
