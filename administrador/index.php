
<?php
session_start();
$txtUsuario=(isset($_POST['txtUsuario']))?$_POST['txtUsuario']:"";
$txtContraseña=(isset($_POST['txtContraseña']))?$_POST['txtContraseña']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";



include("config/bd.php");



if ($_POST) {

  switch ($accion) {

    case"Ingresar":

        $sentenciaSQL=$conexion->prepare("SELECT * FROM administradores WHERE usuario=:usuario " );
        $sentenciaSQL-> bindParam(':usuario',$txtUsuario);
        //$sentenciaSQL-> bindParam(':contraseña',$txtContraseña);
        $sentenciaSQL->execute();
        $subsidio=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $verifUsuario=$subsidio['usuario'];
        $verifContraseña=$subsidio['contraseña'];


       
        break;
        $sentenciaSQL=$conexion->prepare("SELECT * FROM administradores");
        $sentenciaSQL->execute();
        $listaSubsidios=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        
  }
  // else{
    
  // }

  

  if(($_POST['txtUsuario']=="$verifUsuario") && ($_POST['txtContraseña']=="$verifContraseña")){

    $_SESSION['usuario']="ok";
    $_SESSION['nombreUsuario']="$verifUsuario";


    header('location:inicioAdmin.php');
  }else{
    $mensaje="Error: El usuario o contraseña son incorrectos";
  }

}


?>  

<!doctype html>
<html lang="en">
  <head>
    <title>Administrador del Sitio</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
   <div class="container">
       <div class="row">

            <div class="col-md-4">
                
            </div>

           <div class="col-md-4">
           </br> </br> </br> </br>
                <div class="card">
                    <div class="card-header">
                        Login Administrador
                    </div>
                    <div class="card-body">

                    <?php if(isset($mensaje)){?>
                      <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje; ?>
                      </div>
                    <?php }?>
                       <form method='POST'>

                       <div class = "form-group">
                       <label for="txtUsuario">Usuario</label>
                       <input type="text" class="form-control" name="txtUsuario"  placeholder="Ingrese Usuario...">
                    
                       </div>
                       <div class="form-group">
                       <label for="txtContraseña">Contraseña</label>
                       <input type="password" class="form-control" name="txtContraseña"  placeholder="Ingrese contraseña...">
                       </div>
                      
                       <button type="submit" name="accion" value="Ingresar" class="btn btn-primary">Ingresar</button>
                       </form>
                       
                       
                    </div>
                    
                </div>
               
           </div>
           
       </div>
   </div>
  </body>
</html>