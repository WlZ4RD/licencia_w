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
    <div><h4 style="font-family: Segoe UI Black;">Padron General del Contribuyente</h4></div>
    <br>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="font-family: arial narrow; float: left;" >Lista del padron del contribuyente</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 310px;">
                   
                    <input type="text" name="table_search" id="q" class="form-control" placeholder="Buscar" onkeyup='load(1);'>

                    <div class="input-group-append" style="margin-right: 6px;">
                      <button style="border-radius: 0px 4px 4px 0px;" type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>

                    <div class="btn-group pull-left">
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevoRegistro">Nuevo Registro
                        <span class="fa fa-plus"></span>
                      </button>
                    </div>
                    <?php
                      include("modal/registroNuevoPadron.php");
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


        <div id="resultados"></div>
       <div class='outer_div'></div><!-- Carga los datos ajax -->


    </section>






</div>
<!--footer-->

</div>




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
        url:'ajax/buscarContribuyente.php',
        method: "GET",
        data:{q:q},     
        success:function(data){
          $("#tabla_resultado").html(data);
        }
      })
    }

    $("#guardar").submit(function(e) {

        var url = "ajax/registro_nuevo_contribuyente.php";
        $.ajax({
               type: "POST",
               url: url,
               data: $("#guardar").serialize(), 
               success: function(data)
               {
                $("#resultados_ajax").html(data);
                  // alert(data); 
                  load(1);
               }
             });

        e.preventDefault(); 
    });
    window.onload = function() {
      document.getElementById('tipo_con').onchange = function(){
          if (document.getElementById('tipo_con').value == "1") {
              document.guardar.razon.disabled = true;
          }else {
              document.guardar.razon.disabled = false;
          }
      }
  }

</script>
