<?php
session_start();
  if(!isset($_SESSION['usuario'])){
    header("Location:inicioSesion.php");
  }else{
    if($_SESSION['usuario']=="ok"){
      $nombreUsuario=$_SESSION["nombreUsuario"];
    }
  }

?>

<?php
include("baseDatos\conexion.php");

$txtCod=(isset($_POST['txtCod']))?$_POST['txtCod']:"";
$txtCod2=(isset($_POST['txtCod2']))?$_POST['txtCod2']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
$txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
$txtTotal=(isset($_POST['txtTotal']))?$_POST['txtTotal']:"";
$txtComprares=" ";
$txtSuma=0;
$txtResul=0;

$txtImg=(isset($_POST['txtImg']))?$_POST['txtImg']:"";

$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";
//$listaProductos=[];

$sentenciaSQL=$conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


$sentenciaSQL=$conexion->prepare("SELECT * FROM listaProductos");
$sentenciaSQL->execute();
$listaP=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);



switch ($accion) {
  case "Añadir":

    header("Location:compras.php");
    break;
  case"Borrar":
    header("Location:compras.php");
    break;
  case "Comprar":
    header("Location:metodo.php");
      break;
}
?>
<?php include("menu2/cabecera.php"); ?>


<?php






?>



<link rel="stylesheet" href="css/compras.css">
<link rel="stylesheet" href="ventana.js">



<!-- <div class="card">
  <div class="card-header">
    <h3 class="card-title">Título de la tarjeta</h3>
    <button type="button" class="btn-close" aria-label="Cerrar"></button>
  </div>
  <div class="card-body">
    <p>Contenido de la tarjeta aquí.</p>
  </div>
</div>

<script>
  // Selecciona el botón de cierre
  const closeButton = document.querySelector(".btn-close");

  // Agrega un evento click al botón de cierre
  closeButton.addEventListener("click", function() {
    // Selecciona la tarjeta
    const card = closeButton.closest(".card");
    // Cierra la tarjeta
    card.style.display = "none";
  });
</script> -->


<div class="row">

  <?php  foreach($listaProductos as $producto)  { ?>
      <div class="card mb-3" style="width: 18rem;">
        <img class="card-img-top" src="img/<?php echo $producto['imagen']; ?> "width ="130" height="200" alt="" srcset=""
        style="border-image: 30px;
                max-width: 210px;
                max-height: 180px;">


        <div class="card-body">
          <h5 class="card-title"><?php echo $producto['nombre']; echo" "; echo $producto['descripcion'];?> </h5>
          <h5 class="card-title">Precio: $<?php echo $producto['precio']; ?> </h5>
          <h6 class="card-title">Cod. Producto: <?php echo $producto['codigo']; ?> </h6>


          <form method="post">

            <input type="hidden" name="txtCod" id="txtCod" value="<?php echo $producto['codigo']; ?>" />
            <input type="hidden" name="txtNombre" id="txtNombre" value="<?php echo $producto['nombre']; ?>" />
            <input type="hidden" name="txtDescripcion" id="txtDescripcion" value="<?php echo $producto['descripcion']; ?>" />
            <input type="hidden" name="txtPrecio" id="txtPrecio" value="<?php echo $producto['precio']; ?>" />
            <input type="hidden" name="txtImg" id="txtImg" value="<?php echo $producto['imagen']; ?>" />



            <!-- <form method='POST'class="col-12" th:action="@{/login}" > -->
            <button type="submit" name="accion" value="Añadir" class="btn-pr">Añadir al carrito</button>
          </form>

          <style>
                .card:hover {
                transform: scale(1.1);
                transition: all 0.3s ease;
                }
                </style>

        </div>
      </div>

  <?php } ?>

</div>




<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th height=50px; width=100px;>ID</th>
                <th height=50px; width=120px;>Nombre Prod</th>
                <th height=50px; width=100px;>Presentacion</th>
                <th height=50px; width=100px;>Precio</th>
                <th height=50px; width=100px;>Imagen</th>
                <th height=50px; width=100px;>Acciones</th>

            </tr>
        </thead>
        <tbody>
          <?php
          switch ($accion) {
          case "Añadir":
            $sentenciaSQL=$conexion->prepare("INSERT INTO listaProductos (codigo, nombre, descripcion, precio, imagen) VALUES (:codigo, :nombre, :descripcion,:precio, :imagen);");
            $sentenciaSQL-> bindParam(':codigo',$txtCod);
            $sentenciaSQL-> bindParam(':nombre',$txtNombre);
            $sentenciaSQL-> bindParam(':descripcion',$txtDescripcion);
            $sentenciaSQL-> bindParam(':precio',$txtPrecio);
            $sentenciaSQL-> bindParam(':imagen',$txtImg);
            $sentenciaSQL->execute();


            break;

          case "Borrar":
            $sentenciaSQL=$conexion->prepare("DELETE FROM listaProductos WHERE id=:codigo");
            $sentenciaSQL-> bindParam(':codigo',$txtCod2);
            $sentenciaSQL->execute();


            break;


          case "Comprar":
            


            break;



          }
          ?>



          <?php foreach($listaP as $product)  { ?>
            <tr>
                <td> <?php echo $product['codigo']; ?> </td>
                <td> <?php echo $product['nombre']; ?> </td>
                <td> <?php echo $product['descripcion']; ?> </td>
                <td> <?php echo $product['precio']; ?> </td>
                <td>
                <img class="img-thumbnail rounded" src="img/<?php echo $product['imagen']; ?> "width ="80"  alt="" srcset="">
                </td>

                <td>

                <form method="post">

                    <input type="hidden" name="txtCod2" id="txtCod2" value="<?php echo $product['id']; ?>" />
                    <input type="hidden" name="txtTotal" id="txtTotal" value="<?php echo $product['precio']; ?>" />

                    <?php $txtResul=$product['precio']+$txtSuma;
                          $txtSuma=$txtResul;

                    ?>
                    <input type="submit" name="accion" value="Borrar" class= "btn btn-danger" />


                </form>

                </td>


            </tr>


          <?php } ?>



          <th colspan="2">Total:  $<?php echo $txtResul ?> </th>

          <th colspan="3">
          <form method="post">
          <input type="submit" name="accion" value="Comprar" class= "btn-pr" />
          </form>
          </th>

          <th colspan="1"><?php echo $txtComprares ?> </th>




        </tbody>
    </table>
</div>










<?php include("menu2/pie.php"); ?>