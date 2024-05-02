<?php include("menu2/cabecera.php"); ?>



<?php 
$txtId=(isset($_POST['txtId']))?$_POST['txtId']:"";
$txtPrimerNombre=(isset($_POST['txtPrimerNombre']))?$_POST['txtPrimerNombre']:"";
$txtSegundoNombre=(isset($_POST['txtSegundoNombre']))?$_POST['txtSegundoNombre']:"";
$txtPrimerApellido=(isset($_POST['txtPrimerApellido']))?$_POST['txtPrimerApellido']:"";
$txtSegundoApellido=(isset($_POST['txtSegundoApellido']))?$_POST['txtSegundoApellido']:"";
$txtFechaNac=(isset($_POST['txtFechaNac']))?$_POST['txtFechaNac']:"";
$txtDireccion=(isset($_POST['txtDireccion']))?$_POST['txtDireccion']:"";
$txtBarrio=(isset($_POST['txtBarrio']))?$_POST['txtBarrio']:"";
$txtCiudad=(isset($_POST['txtCiudad']))?$_POST['txtCiudad']:"";
$txtTelefono=(isset($_POST['txtTelefono']))?$_POST['txtTelefono']:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
$txtContra=(isset($_POST['txtContra']))?$_POST['txtContra']:"";




$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("baseDatos/conexion.php");

switch ($accion) {

    case "Registrarse":
        $sentenciaSQL=$conexion->prepare("INSERT INTO clientes (id, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nac, direccion, barrio, ciudad, telefono, correo, contra) VALUES (:id,:primer_nombre,:segundo_nombre, :primer_apellido, :segundo_apellido, :fecha_nac, :direccion, :barrio, :ciudad, :telefono, :correo, :contra);");
        $sentenciaSQL-> bindParam(':id',$txtId);
        $sentenciaSQL-> bindParam(':primer_nombre',$txtPrimerNombre);
        $sentenciaSQL-> bindParam(':segundo_nombre',$txtSegundoNombre); 
        $sentenciaSQL-> bindParam(':primer_apellido',$txtPrimerApellido);
        $sentenciaSQL-> bindParam(':segundo_apellido',$txtSegundoApellido);
        $sentenciaSQL-> bindParam(':fecha_nac',$txtFechaNac); 
        $sentenciaSQL-> bindParam(':direccion',$txtDireccion); 
        $sentenciaSQL-> bindParam(':barrio',$txtBarrio); 
        $sentenciaSQL-> bindParam(':ciudad',$txtCiudad); 
        $sentenciaSQL-> bindParam(':telefono',$txtTelefono); 
        $sentenciaSQL-> bindParam(':correo',$txtCorreo); 
        $sentenciaSQL-> bindParam(':contra',$txtContra); 
        
        $sentenciaSQL-> execute();
        break;

}

$sentenciaSQL=$conexion->prepare("SELECT * FROM clientes");
$sentenciaSQL->execute();
$listaSubsidios=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <title>Registro</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Los iconos tipo Solid de Fontawesome-->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script> -->

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="css/index.css" th:href="@{/css/index.css}">
    <!-- <link rel="stylesheet" type="text/css" href="menu2/estilos.css" th:href="@{menu2/estilos.css}"> -->
    <link rel="stylesheet" type="text/css" href="css/iconos.css" th:href="@{/css/iconos.css}">

</head>
<body>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content" >
                <div class="col-12 user-img">
                    <img src="img\user.png" th:src="@{img\user.png}"/>
                </div>
                <form class="col-12" th:action="@{/login}" method="POST" enctype="multipart/form-data">
                    <div class="form-group" id="id-group">
                        <input type="number" class="form-control" required value="<?php echo $txtId ?>" placeholder="Cédula" name="txtId"/>
                    </div>
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" required value="<?php echo $txtPrimerNombre; ?>"  placeholder="Primer nombre" name="txtPrimerNombre"/>
                    </div>
                   
                    <div class="form-group" id ="user-group">
                        <input type="text" class="form-control" required  value="<?php echo $txtPrimerApellido; ?>" placeholder="Primer Apellido "  name="txtPrimerApellido"/>
                    </div>


                    <div class="form-group" id="home-group">
                        <input type="text" class="form-control" required  value="<?php echo $txtDireccion; ?>" placeholder="Dirección"  name="txtDireccion"/>
                    </div>

                    <div class="form-group" id="ciudad-group">
                        <input type="text" class="form-control" required  value="<?php echo $txtCiudad; ?>" placeholder="Ciudad"  name="txtCiudad"/>
                    </div>

                    <div class="form-group" id="celuco-group">
                        <input type="number" class="form-control" required  value="<?php echo $txtTelefono; ?>" placeholder="Telefono"  name="txtTelefono"/>
                    </div>

                    <div class="form-group" id="correo-group">
                        <input type="email" class="form-control" required  value="<?php echo $txtCorreo; ?>" placeholder="Correo"  name="txtCorreo"/>
                    </div>
                    
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" required value="<?php echo $txtContra; ?>" placeholder="Contraseña"  name="txtContra"/>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="accion" value="Registrarse"><i class="fas fa-sign-in-alt"></i> Registrarse </button>
                </form>
             

            </div>
        </div>
    </div>
</body>


</html>
<br/><br/><br/><br/>


<?php include("menu2/pie.php"); ?>
