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
    include 'navbarMenuDerecho.php'
  ?>
  <!-- Titulo de la pagina-->
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Usuarios</h1>
          </div>
          
        </div>
      </div>
    </div>

    <section class="content">
    <div class="container-fluid">
    <h5 class="mb-2">Usurios </h5>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="float: left;" >Lista de Usuarios</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm">
                   
                    <input type="text" name="table_search" id="q" class="form-control" placeholder="Buscar" onkeyup='load(1);'>

                    <div class="input-group-append" style="margin-right: 6px;">
                      <button style="border-radius: 0px 4px 4px 0px;" type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>

                    <div class="btn-group pull-left">
                      <?php 
                        if ($_SESSION['rol']==1) {
                          ?>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevoUsuario">Nuevo Usuario
                            <span class="fa fa-plus"></span>
                            </button>
                          <?php
                        }
                      ?>
                    </div>
                    <?php
                      include("modal/registroNuevoUsuario.php"); 
                    ?>
                  </div>
                </div>
              </div>
              <!-- /.tabla -->
              <div class="card-body table-responsive p-0" id="tabla_resultado">
                
              </div>
            
            </div>
         
          </div>
        </div>
        <div class="modal overlay bd-modal-md" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    </section>

<?php
  include 'scriptFinal.php';

?>

</body>
</html>
<script>
  $(document).ready(function(){
      load(1);
    });

    function load(page){
      var q= ($("#q").val()!=undefined && $("#q").val()!=null && $("#q").val()!='')?$("#q").val():"";
      $.ajax({
        url:'ajax/buscarUsuarios.php',
        method: "GET",
        data:{q:q},     
        success:function(data){
          $("#tabla_resultado").html(data);
        }
      })
    }

    $("#guardarUsuario").submit(function(e) {

        var url = "ajax/registro_nuevo_usuario.php";
        $.ajax({
               type: "POST",
               url: url,
               data: $("#guardarUsuario").serialize(), 
               success: function(data)
               {
                $("#resultados_ajax_usuario").html(data); 
                  load(1);
               }
             });
        e.preventDefault(); 
    });

    function confirmEditar(editar){
      $.ajax({
      url: 'datosEditarUsuarios.php',
      type: 'GET',
      datatype: 'html',
      data: {editar: editar},
      })
      .done(function(resultado) {
        $("#editarModal").html(resultado);
      })
    }

    function editar2(){
    var url = 'ajax/modificar_registro_usuario.php';
        $.ajax({
           type: "POST",
           url: url,
           data: $("#modificar1").serialize(), 
           success: function(data)
           {
            $("#resultado_modificacion2").html(data);
              //alert(data); 
              load(1);
           }
        });
  }
</script>