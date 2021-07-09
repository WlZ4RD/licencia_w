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
    <div><h4 style="font-family: Segoe UI Black;">Gestionar Tramites de Comercializacion</h4></div>
    <br>
    <section class="content">
    <div class="container-fluid">
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <div class="input-group input-group-sm">
                    <label for="" style="margin-top: 10px"><i class="nav-icon fa fa-list-alt"></i> Lista de Tramites&nbsp&nbsp</label>
                    <input type="text" name="table_search" id="q" class="form-control" placeholder="Buscar" onkeyup='load(1);'>
                    <div class="input-group-append" style="margin-right: 6px;">
                      <button style="border-radius: 0px 4px 4px 0px;" type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                    <!--
                    <div class="btn-group pull-left" style="margin-right: 6px;">
                      <select class="form-control" style=" height:38px;" id="selectPeriodo" name="selectPeriodo" on required >
                        <option value="" selected="true" disabled="disabled">-- Seleccione Licencia o Autorizacion --</option>
                        <?php 
                        require_once("servidor.php");
                        try {
                            $conn = new PDO($dir_server, $_SESSION['usuario'], $_SESSION['contrasenia']);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT COD_PERIODO,ESTADO FROM T_PERIODO;"); 
                            $stmt->execute();
                            $nro=0;
                            while($periodo = $stmt->fetch()){
                            $nro++;
                            ?>
                             
                              <option value="<?php echo($periodo['COD_PERIODO']); ?>" <?php echo(strcmp($codigoPeriodo,$periodo['COD_PERIODO'])==0)?"selected":""; ?> ><?php echo($periodo['COD_PERIODO'])?></option>

                            <?php   
                            }

                        }catch(PDOException $e) {
                          echo "Error: " . $e->getMessage();
                        }
                        $conn = null;
                      ?>      
                      </select>
                    </div>

                    <div class="btn-group pull-left" style="margin-right: 6px;">
                      <select class="form-control" style=" height:38px;" id="selectSemestre" name="selectSemestre" required>
                        <option value="" selected="true" disabled="disabled">-- Seleccione Tipo --</option>

                        <?php 
                          require_once("servidor.php");
                          try {
                              $conn = new PDO($dir_server, $_SESSION['usuario'], $_SESSION['contrasenia']);
                              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                              $stmt = $conn->prepare("SELECT COD_PAQUETE, NOM_PAQUETE FROM T_PAQUETE;"); 
                              $stmt->execute();
                              $nro=0;
                              while($paquete = $stmt->fetch()){
                              $nro++;
                              ?>
                               
                                <option value="<?php echo($paquete['COD_PAQUETE']); ?>" <?php echo(strcmp($codigoPaquete,$paquete['COD_PAQUETE'])==0)?"selected":""; ?> ><?php echo($paquete['COD_PAQUETE']."-".$paquete['NOM_PAQUETE'])?></option>

                              <?php   
                              }

                          }catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                          }
                          $conn = null;
                        ?>
                      </select>
                    </div>
                    -->
                    <div class="btn-group pull-left">
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevoTramite"><span class="fa fa-file-text"></span> Nuevo Tramite</button>
                    </div>
                    <?php
                      include("modal/registroNuevoTramite.php");
                      include("modal/ayuda/seleccionarContribuyente.php");

                    ?>
                  </div>
              </div>
              <!-- /.tabla -->
              <div class="card-body table-responsive p-0" id="tabla_resultado">
                
              </div>
            
            </div>
         
          </div>
        </div>
        <div class="modal overlay bd-modal-lg" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        </div>
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
      cargarAyudaPeriodo(1);
    });

    function load(page){
      var q= ($("#q").val()!=undefined && $("#q").val()!=null && $("#q").val()!='')?$("#q").val():"";
      $.ajax({
        url:'ajax/buscarTramite.php',
        method: "GET",
        data:{q:q},     
        success:function(data){
          $("#tabla_resultado").html(data);
        }
      })
    }

    $("#guardarTramite").submit(function(e) {

        var url = "ajax/registro_nuevo_tramite.php";
        $.ajax({
               type: "POST",
               url: url,
               data: $("#guardarTramite").serialize(), 
               success: function(data)
               {
                $("#resultados_ajax_guardar_tramite").html(data);
                  // alert(data); 
                  load(1);
                  
               }
             });

        e.preventDefault(); 
    });
/*
    $("#contribuyenteAutoCompletar").submit(function(e) {

        var url = "ajax/ayuda/buscarAyudaContribuyenteAutocompletado.php";
        $.ajax({
               type: "POST",
               url: url,
               data: $("#contribuyenteAutoCompletar").serialize(), 
               success: function(data)
               {
                //$("#resultados_ajax_guardar_tramite").html(data);
                var array_json=JSON.parse(data);
                alert(array_json.id[0]);
                  // alert(data); 
                  //load(1);
               }
             });

        e.preventDefault(); 
    });*/

    function getTiposLA(id){
      $.ajax({
        url:'ajax/buscarTiposLicenciasSelectNuevoTramite.php',
        method: "GET",
        data:{action:id},  
        success: function(r){
          $("#LicTipoAut").html(r);
        }
      }) ; 

      

    }

    function getCostoTipoLA(id){
      $.ajax({
        url:'ajax/ayuda/BuscarAyudaCostoAutocompletado.php',
        method: "GET",
        data:{q:id},     
        success:function(data){
          //$("#tabla_resultado_periodo").html(data);
           var array_json=JSON.parse(data);
                //alert(array_json.nom_razon[0]);
          $("#costo").val(array_json.costo[0]);

        }
      })
    }
    
     function cargarAyudaPeriodo(page){
      var q = ($("#buscar_periodo").val()!=undefined && $("#buscar_periodo").val()!=null && $("#buscar_periodo").val()!='')?$("#buscar_periodo").val():"";
      $.ajax({
        url:'ajax/ayuda/BuscarAyudaContribuyente.php',
        method: "GET",
        data:{q:q},     
        success:function(data){
          $("#tabla_resultado_periodo").html(data);
        }
      }) 
    }

    function autocompletarContribuyente(id){
        var url = "ajax/ayuda/buscarAyudaContribuyenteAutocompletado.php";
        $.ajax({
               type: "GET",
               url: url,
               data: {id:id}, 
               success: function(data)
               {
                //$("#resultados_ajax_guardar_tramite").html(data);
                var array_json=JSON.parse(data);
                //alert(array_json.nom_razon[0]);

                $("#id_cont").val(array_json.id[0]); 
                $("#dni_nuevo").val(array_json.dni_ruc[0]);
                $("#nom_razon1").val(array_json.nom_razon[0]);
               }
             });
             $('#seleccionarContribuyente').modal('hide');   
      }

    /*$('LicAuts').on('change',function(){

      alert($(this).find(":selected").val());

    });
    $("#LicAut").change(function(){

      var id=$(this).find(":selected").val();
      //var dataString='action='+id;
      $.ajax({
        url:'ajax/buscarTiposLicenciasSelectNuevoTramite.php';
        method: "GET",
        data:{action:id},  
        success: function(r){
          $("#divLicTipoAut").html(r);
        }
      });
    });*/

    /*window.onload = function() {
      document.getElementById('tipo_con').onchange = function(){
          if (document.getElementById('tipo_con').value == "1") {
              document.guardar.razon.disabled = true;
          }else {
              document.guardar.razon.disabled = false;
          }
      }
  }*/


  function confirmEditar(editar){
    $.ajax({
    url: 'datosEditarTramite.php',
    type: 'GET',
    datatype: 'html',
    data: {editar: editar},
    })
    .done(function(resultado) {
      $("#editarModal").html(resultado);
    })
  }

  function modificarTramite(){
    var url = 'ajax/modificar_registro_tramite.php';
    $.ajax({
       type: "POST",
       url: url,
       data: $("#modificar_Tramite").serialize(), 
       success: function(data)
       {
        $("#resultados_ajax_modificar_tramite").html(data);
          //alert(data); 
          load(1);
       }
     });
  }

</script>
