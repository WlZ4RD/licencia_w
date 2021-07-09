<?php
  
  session_start();
  if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
        header("location: login.php");
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

  <div class="content-wrapper">
   
  </div>
 
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>




<?php
  include 'scriptFinal.php';

?>

</body>
</html>
