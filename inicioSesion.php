<?php
session_start();
$txtUsuario=(isset($_POST['txtUsuario']))?$_POST['txtUsuario']:"";
$txtContraseña=(isset($_POST['txtContraseña']))?$_POST['txtContraseña']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";
?>



<?php




include("baseDatos/conexion.php");



if ($_POST) {

  switch ($accion) {

    case"Ingresar":

        $sentenciaSQL=$conexion->prepare("SELECT * FROM clientes WHERE correo=:usuario " );
        $sentenciaSQL-> bindParam(':usuario',$txtUsuario);
        //$sentenciaSQL-> bindParam(':contraseña',$txtContraseña);
        $sentenciaSQL->execute();
        $users=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $verifUsuario=$users['correo'];
        $verifContraseña=$users['contra'];

        break;

    

        $sentenciaSQL=$conexion->prepare("SELECT * FROM clientes");
        $sentenciaSQL->execute();
        $listaUsers=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
    
  }
 


  if(($_POST['txtUsuario']=="$verifUsuario") && ($_POST['txtContraseña']=="$verifContraseña")){

    $_SESSION['usuario']="ok";
    $_SESSION['nombreUsuario']="$verifUsuario";

    echo"ingresado";
    // header('location:home.php');
    header('location:compras.php');
  }else{
    $mensaje="Error: El usuario o contraseña son incorrectos";
  }

}
switch ($accion) {
  case"Registrar":
    echo "si";
    header("Location:Registro.php");

  break;  
}


?>  


<?php include("menu2/cabecera.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Administrador del Sitio</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="menu2/estilos.css">
    <link rel="stylesheet" href="css/inicio.css">


  </head>
  <body>
      
  <div class="container">
      <div class="row">

          <div class="col-md-4">
                
          </div>

          <div class="col-md-4">
            
           </br> </br> </br> </br>
                <div class="card"  style=" width: 410px;
                height: 365px;">
                  
                    <div class="card-header">
                        Login Usuario
                    </div>
                    <div class="card-body">

                    <?php if(isset($mensaje)){?>
                      <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje; ?>
                      </div>
                    <?php }?>
                       <form method='POST'>

                     

                       <div class = "form-group">
                       <label for="txtUsuario"><i class="fa-solid fa-user"></i> Usuario</label>
                       <input type="text" class="form-control" name="txtUsuario"  placeholder="Ingrese Usuario...">
                    
                       </div>
                       <div class="form-group">
                       <label for="txtContraseña"><i class="fa-solid fa-lock"></i> Contraseña</label>
                       <input type="password" class="form-control" name="txtContraseña"  placeholder="Ingrese contraseña...">
                       </div>
                      
                       <button type="submit" name="accion" value="Ingresar" class="btn btn-primary">Ingresar</button>
                       <button type="submit"  name="accion" value="Registrar" class="btn-s">Registrarse </button>
                      
                        <!-- <div th:if="${param.error}" class="alert alert-danger" role="alert">
                          Invalid username and password.
                        </div>
                        <div th:if="${param.logout}" class="alert alert-success" role="alert">
                            You have been logged out.
                        </div> -->
                      </form>
                       
                       
                    </div>
                    
                </div>
               
           </div>
           
      </div>
   </div>

  </body>
</html>
<br/><br/><br/><br/><br/>


<?php include("menu2/pie.php"); ?>
