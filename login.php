<?php
  
  session_start();

  if (isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] == 1) {
        header("location: interfazPrincipal.php");
    exit;
        }
?>
<?php
    include 'head.php';
?>



<body>
<header style="width: 100%; height: 80px; background-color: #3498db;"></header>

    <div class="container formulario">
         <div class="row d-flex justify-content-center" >
            <div class="col-xs-6 col-xs-offset-6 " >
                <img src="images/comer.jpg" class="logo" alt="" style="border-radius: 50%; border: solid #f6f6f6 5px;">
            </div>
        </div>

            <h2 class="text-center" style="color: #3498db">Bienvenido</h2>
            <h4 class="hidden-xs hidden-md">Inicie Sesion xx</h4>

        <div class="row ">
            <fieldset class="col-xs-12 col-xs-offset-1 col-sm-12">
                <form action="sesion.php" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <select name="tipo_usuario" class="form-control" required="">
                            <option value="" disabled="true" selected>-- Seleccione Rol --</option>
                            <option value="1">Administrador</option>
                            <option value="2">Gerente</option>
                            <option value="3">Asistente</option>
                            
                        </select>
                    </div>

                    <div class="form-group " >
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control input" name="codigo" placeholder="Ingrese su usuario" required="" pattern="[0-9]{8}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-asterisk"></span></span>
                            <input type="password" class="form-control input" name="password" placeholder="Ingrese su Password" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-check"></span> Ingresar</button>
                    </div>

                    <div class="form-group">
                        <a href="#">¿olvidaste tu contraseña?</a>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>

</body>
</html>

<?php
  include 'scriptFinal.php';
?>