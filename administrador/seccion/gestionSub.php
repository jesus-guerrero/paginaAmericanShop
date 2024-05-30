<?php include("../template/cabeceraAdmin.php"); ?>

<?php
// DATOS COMERCIAL


//include("baseDatos\conexion.php");

$txtCod=(isset($_POST['txtCod']))?$_POST['txtCod']:"";
$txtCod2=(isset($_POST['txtCod2']))?$_POST['txtCod2']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
$txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
$txtUnidades=(isset($_POST['txtUnidades']))?$_POST['txtUnidades']:"";
$txtTotal=(isset($_POST['txtTotal']))?$_POST['txtTotal']:"";
$txtComprares=" ";
$txtSuma=0;
$txtResul=0;

$txtImg=(isset($_POST['txtImg']))?$_POST['txtImg']:"";

$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";
//$listaProductos=[];

// $sentenciaSQL=$conexion->prepare("SELECT * FROM productos");
// $sentenciaSQL->execute();
// $listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


// $sentenciaSQL=$conexion->prepare("SELECT * FROM listaProductos");
// $sentenciaSQL->execute();
// $listaP=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


//DATOS SUBSIDIO
// $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
// $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
// $txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
// $txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
// $txtFormulario=(isset($_FILES['txtFormulario']['name']))?$_FILES['txtFormulario']['name']:"";
// $accion=(isset($_POST['accion']))?$_POST['accion']:"";


include("../config/bd.php");


switch ($accion) {
    case "Agregar":
        $sentenciaSQL=$conexion->prepare("INSERT INTO productos (nombre, descripcion, unidades, imagen, precio) VALUES (:nombre, :descripcion, :unidades, :imagen, :precio)");
        $sentenciaSQL-> bindParam(':nombre',$txtNombre);
        $sentenciaSQL-> bindParam(':descripcion',$txtDescripcion); 
        $sentenciaSQL-> bindParam(':unidades',$txtUnidades); 
        $sentenciaSQL-> bindParam(':precio',$txtPrecio); 


        $fecha= new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
        //$nombreFrom=($txtFormulario!="")?$fecha->getTimestamp()."_".$_FILES["txtFormulario"]["name"]:"form.jpg";

        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
        //$tmpFormulario=$_FILES["txtFormulario"]["tmp_name"];

        if($tmpImagen!=""){
            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
        }

        // if($tmpFormulario!=""){
        //     move_uploaded_file($tmpFormulario,"../form/".$nombreFrom);
        // }


        $sentenciaSQL-> bindParam(':imagen',$nombreArchivo); 
        //$sentenciaSQL-> bindParam(':formulario',$nombreFrom); 

        $sentenciaSQL->execute();

        header("Location:gestionSub.php");

        break;
        
    case "Modificar":
        $sentenciaSQL=$conexion->prepare("UPDATE productos SET nombre=:nombre, descripcion=:descripcion, unidades=:unidades, precio=:precio WHERE codigo=:id " );
        $sentenciaSQL-> bindParam(':nombre',$txtNombre);
        $sentenciaSQL-> bindParam(':descripcion',$txtDescripcion);
        $sentenciaSQL-> bindParam(':unidades',$txtUnidades);
        $sentenciaSQL-> bindParam(':precio',$txtPrecio);
        $sentenciaSQL-> bindParam(':id',$txtCod);
        $sentenciaSQL->execute();

        if($txtImagen != ""){

            $fecha= new DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";


            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);


            $sentenciaSQL=$conexion->prepare("SELECT imagen FROM productos WHERE codigo=:id " );

            $sentenciaSQL-> bindParam(':id',$txtCod);
            $sentenciaSQL->execute();
            $subsidio=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if(isset($subsidio["imagen"]) && ($subsidio["imagen"]!="imagen.jpg")){

                if(file_exists("../img/".$subsidio["imagen"])){

                    unlink("../img/".$subsidio["imagen"]);
                }
            }




            $sentenciaSQL=$conexion->prepare("UPDATE productos SET imagen=:imagen WHERE codigo=:id " );
            $sentenciaSQL-> bindParam(':formulario',$Archivo);

            $sentenciaSQL-> bindParam(':id',$txtCod);
            $sentenciaSQL->execute();
        }




        // if($txtFormulario != ""){

        //     $fecha= new DateTime();
        //     $Archivo=($txtFormulario!="")?$fecha->getTimestamp()."_".$_FILES["txtFormulario"]["name"]:"archivo.doxc";


        //     $tmpFormulario=$_FILES["txtFormulario"]["tmp_name"];

        //     move_uploaded_file($tmpFormulario,"../form/".$Archivo);


        //     $sentenciaSQL=$conexion->prepare("SELECT formulario FROM subsidios WHERE id=:id " );

        //     $sentenciaSQL-> bindParam(':id',$txtID);
        //     $sentenciaSQL->execute();
        //     $subsidio=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

           

        //     if(isset($subsidio["formulario"]) && ($subsidio["formulario"]!="archivo.doxc")){

        //         if(file_exists("../form/".$subsidio["formulario"])){

        //             unlink("../form/".$subsidio["formulario"]);
        //         }
        //     }


        //     $sentenciaSQL=$conexion->prepare("UPDATE subsidios SET formulario=:formulario WHERE id=:id " );
        //     $sentenciaSQL-> bindParam(':formulario',$Archivo);

        //     $sentenciaSQL-> bindParam(':id',$txtID);
        //     $sentenciaSQL->execute();
        // }


        header("Location:gestionSub.php");

        break;
    case "Cancelar":
        header("Location:gestionSub.php");

        break;
    case "Seleccionar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM productos WHERE codigo = :id");
        $sentenciaSQL->bindParam(':id', $txtCod);
        $sentenciaSQL->execute();
        $subsidio = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
    
        if ($subsidio) {
            $txtNombre = $subsidio['nombre'];
            $txtDescripcion = $subsidio['descripcion'];
            $txtUnidades = $subsidio['unidades'];
            $txtPrecio = $subsidio['precio'];
            $txtImagen = $subsidio['imagen'];
        } else {
            // Manejo de errores: No se encontró el producto con el código proporcionado
            $txtNombre = '';
            $txtDescripcion = '';
            $txtUnidades = '';
            $txtPrecio = '';
            $txtImagen = '';
            // Aquí puedes agregar un mensaje de error o cualquier otra acción que desees tomar
            echo "No se encontró el producto con el código proporcionado.";
        }
    
        //echo "Presiono boton Seleccionar";
            break;
    case "Borrar":
        
        $sentenciaSQL=$conexion->prepare("SELECT imagen FROM productos WHERE codigo=:id " );
        $sentenciaSQL-> bindParam(':id',$txtCod);
        $sentenciaSQL->execute();
        $subsidio=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if(isset($subsidio["imagen"]) && ($subsidio["imagen"]!="imagen.jpg")){

            if(file_exists("../../img/".$subsidio["imagen"])){

                unlink("../../img/".$subsidio["imagen"]);
            }
        }

        $sentenciaSQL=$conexion->prepare("DELETE FROM productos WHERE codigo=:id");
        $sentenciaSQL-> bindParam(':id',$txtCod);
        $sentenciaSQL->execute();

        header("Location:gestionSub.php");

        break;

        
}

$sentenciaSQL=$conexion->prepare("SELECT * FROM subsidios");
$sentenciaSQL->execute();
$listaSubsidios=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

//para los productos comercial
$sentenciaSQL=$conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?> 




<div class="col-md-4">

    <div class="card">
                <div class="card-header">
                    Datos del Producto
                </div>
            <div class="card-body">

                <form method="POST" enctype="multipart/form-data">

                    <div class = "form-group">
                    <label for="txtCod">ID:</label>
                    <input type="text" required readonly class="form-control" value="<?php echo $txtCod; ?>" name="txtCod" id="txtCod" placeholder="ID">
                    </div>

                    <div class = "form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre del Producto">
                    </div>

                    <div class = "form-group">
                    <label for="txtDescripcion">Descripción:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtDescripcion; ?>"  name="txtDescripcion" id="txtDescripcion" placeholder="Descripcion del Producto">
                    </div>

                    <div class = "form-group">
                    <label for="txtUnidades">Unidades:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtUnidades; ?>"  name="txtUnidades" id="txtUnidadces" placeholder="Numero de unidades">
                    </div>


                    <div class = "form-group">
                    <label for="txtPrecio">Precio:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtPrecio; ?>"  name="txtPrecio" id="txtPrecio" placeholder="Precio del producto">
                    </div>

                    <div class = "form-group">
                    <label for="txtImagen">Imagen:</label>


                    <br/>

                    <?php if ($txtImagen !="") { ?>
                        <img class="img-thumbnail rounded" src="../img/<?php echo $txtImagen;?> "width ="80" alt="" srcset="">
                    <?php } ?>
                    
                    <input type="file"  class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen">
                    </div>


                    <div class = "form-group">
                    <br/>
                    
                    </div>





                    <div class="btn-group" role="group" aria-label="">
                        <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":"" ?> value="Agregar" class="btn btn-success">Agregar</button>
                        <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"" ?> value="Modificar" class="btn btn-warning">Modificar</button>
                        <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"" ?> value="Cancelar" class="btn btn-info">Cancelar</button>
                    </div>

                </form>

            </div>
      
    </div>

    
    
</div>

<div class="col-md-8">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del producto</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Unidades</th>
                <th>Imagen</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
        <?php  foreach($listaProductos as $subsidio)  { ?>
            <tr>
                <td> <?php echo $subsidio['codigo']; ?> </td>
                <td> <?php echo $subsidio['nombre']; ?> </td>
                <td> <?php echo $subsidio['descripcion']; ?> </td>
                <td>  <?php echo $subsidio['precio']; ?>  </td>
                <td>  <?php echo $subsidio['unidades']; ?>  </td>

                <td> 
                <img class="img-thumbnail rounded" src="../../img/<?php echo $subsidio['imagen']; ?> "width ="80" alt="" srcset="">               
                </td>

                


                <td>
            
                <form method="post">

                    <input type="hidden" name="txtCod" id="txtCod" value="<?php echo $subsidio['codigo']; ?>" />
                    <input type="submit" name="accion" value="Seleccionar" class= "btn btn-primary" />
                    <input type="submit" name="accion" value="Borrar" class= "btn btn-danger" />
                    
                </form>

                </td>


            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php include("../template/pieAdmin.php"); ?>



 