<?php
  session_start();

  if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
        header("location: interfazPrincipal.php");
    exit;
        }
?>

<?php
    include 'head.php';
    include 'servidor.php';
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
            <h1 class="m-0 text-dark">Perfil</h1>
          </div>
          
        </div>
      </div>
    </div>
 <?php
    include("modal/modificar_clave.php"); 
  ?>
    <section class="content">
    <div class="container">
    <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h3>Datos personales</h3>


                <div class="card-tools">

                  <div class="input-group input-group-sm" style="width: 0%;">
                    
                    <div class="btn-group pull-left" >
                      <button type="button" style="float: right;"class="btn btn-info" data-toggle="modal" data-target="#modificarClave">Cambiar Clave
                        <span class="fa fa-password"></span>
                      </button>
                    </div>
                   
                  </div>
                </div>
              </div>
              <!-- /.tabla -->
              <div class="card-body table-responsive p-0" id="">


                          <?php 
                            

                             

                             
                          $dni_k=$_SESSION['codigo'];
                            try {
                                $conn = new PDO($dir_server, $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->prepare(" SELECT NOMBRES, APELLIDOS, DNI, ROL FROM USUARIO WHERE DNI='$dni_k';"); 
                                $stmt->execute();
                                $nro=0;
                                while($usuario = $stmt->fetch()){
                                $nro++;
                                ?>
                                 
                                  <form class="form-horizontal" method="post" id="guardarUsuario" name="guardarUsuario">
      
                              <div class="form-group">
                              <div class="col-sm-12">
                                <label for="codigo" class="control-label">DNI</label>
                                  <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese su DNI" value="<?php echo($usuario['DNI']); ?>" disabled>
                              </div>
                              </div>
                              <div class="form-group">
                              <div class="col-sm-12">
                                <label for="descripcion" class="control-label">Nombres</label>
                                  <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo($usuario['NOMBRES']); ?>" placeholder="Ingrese nombres">
                              </div>
                              </div>


                                <div class="form-group">
                              <div class="col-sm-12">
                                <label for="descripcion" class="control-label">Apellidos</label>
                                  <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo($usuario['APELLIDOS']); ?>" placeholder="Ingrese apellidos">
                              </div>
                              </div>

                                <div class="form-group">
                            
                              </div>
                              <div class="form-group">
                              <div class="col-sm-12">
                                <label for="estado" class="control-label">Estado</label>
                                <select class="form-control" id="rol" name="rol" disabled>
                                  <option value="" selected>-- Selecciona estado --</option>
                                  <option value="1" <?php echo(($usuario['ROL']==1)?"selected":""); ?>>Administrador</option>
                                  <option value="2" <?php echo(($usuario['ROL']==2)?"selected":""); ?>>Secretario</option>
                                </select>
                              </div>
                              </div>
                              <div id="resultados_ajax_usuario"></div>  
                              </div>
                              <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" id="guardar_datos">Guardar</button>
                              </div>
                            </form>


                                <?php   
                                }





                            }
                            catch(PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                            $conn = null;


                           ?>



















              </div>
            
            </div>
         
          </div>
        </div>


        <div id="resultados"></div>
       <div class='outer_div'></div><!-- Carga los datos ajax -->


    </section>

<?php
  include 'scriptFinal.php';
?>


</body>
</html>
<script>
   $("#guardarUsuario").submit(function(e) {

        var url = "ajax/modificar_datos_personales.php";
        $.ajax({
               type: "POST",
               url: url,
               data: $("#guardarUsuario").serialize(), 
               success: function(data)
               {
                $("#resultados_ajax_usuario").html(data);
                  // alert(data); 
                  load(1);
               }
             });

        e.preventDefault(); 
    });

   $("#modificar_clave_1").submit(function(e) {

        var url = "ajax/modificar_clave.php";
        $.ajax({
               type: "POST",
               url: url,
               data: $("#modificar_clave_1").serialize(), 
               success: function(data)
               {
                $("#resultados_ajax_clave").html(data); 
                  load(1);
               }
             });
        e.preventDefault(); 
    });
   
</script>
