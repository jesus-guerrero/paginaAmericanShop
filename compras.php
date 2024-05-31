<?php


include("baseDatos/conexion.php");

$txtCod = $_POST['txtCod'] ?? "";
$txtCod2 = $_POST['txtCod2'] ?? "";
$txtNombre = $_POST['txtNombre'] ?? "";
$txtDescripcion = $_POST['txtDescripcion'] ?? "";
$txtPrecio = $_POST['txtPrecio'] ?? "";
$txtImg = $_POST['txtImg'] ?? "";

$accion = $_POST['accion'] ?? "";

// Rango de precios seleccionado
$priceRanges = $_POST['priceRange'] ?? [];


// Construcción de la consulta SQL con filtro de precio
$priceConditions = [];
foreach ($priceRanges as $range) {
    switch ($range) {
        case '1':
            $priceConditions[] = "(precio BETWEEN 0 AND 100000)";
            break;
        case '2':
            $priceConditions[] = "(precio BETWEEN 100001 AND 200000)";
            break;
        case '3':
            $priceConditions[] = "(precio BETWEEN 200001 AND 300000)";
            break;
        case '4':
            $priceConditions[] = "(precio > 300000)";
            break;
    }
}

$sql = "SELECT * FROM productos";
if (!empty($priceConditions)) {
    $sql .= " WHERE " . implode(" OR ", $priceConditions);
}





$sentenciaSQL = $conexion->prepare($sql);
$sentenciaSQL->execute();
$listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);




// Consultar productos en la lista de compras
$sentenciaSQL = $conexion->prepare("SELECT * FROM listaProductos");
$sentenciaSQL->execute();
$listaP = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

$filteredProducts = $listaProductos;

switch ($accion) {
    case "Añadir":
        $sentenciaSQL = $conexion->prepare("INSERT INTO listaProductos (codigo, nombre, descripcion, precio, imagen) VALUES (:codigo, :nombre, :descripcion, :precio, :imagen)");
        $sentenciaSQL->bindParam(':codigo', $txtCod);
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':descripcion', $txtDescripcion);
        $sentenciaSQL->bindParam(':precio', $txtPrecio);
        $sentenciaSQL->bindParam(':imagen', $txtImg);
        $sentenciaSQL->execute();
        break;
    case "Borrar":
        $sentenciaSQL = $conexion->prepare("DELETE FROM listaProductos WHERE id=:codigo");
        $sentenciaSQL->bindParam(':codigo', $txtCod2);
        $sentenciaSQL->execute();
        break;
    case "Comprar":
        header("Location:metodo.php");
        exit();
        break;
}
?>
<?php include("menu2/cabecera.php"); ?>
<link rel="stylesheet" href="css/compras.css">

<div style="color: white; font-size: larger;">
    <form method="post">
        <h4>Precio:</h4>
        <label><input type="checkbox" name="priceRange[]" value="1" <?php if (in_array('1', $priceRanges)) echo 'checked'; ?>> $0 - 100.000</label><br>
        <label><input type="checkbox" name="priceRange[]" value="2" <?php if (in_array('2', $priceRanges)) echo 'checked'; ?>> $100.000 - 200.000</label><br>
        <label><input type="checkbox" name="priceRange[]" value="3" <?php if (in_array('3', $priceRanges)) echo 'checked'; ?>> $200.000 - 300.000</label><br>
        <label><input type="checkbox" name="priceRange[]" value="4" <?php if (in_array('4', $priceRanges)) echo 'checked'; ?>> Más de 300</label><br>
        <button type="submit" class="btn-pr">Aplicar filtros</button>
    </form>
</div>
<div style="height: 30px;"></div> 
<div class="product-container">
    <div class="row">
        <?php foreach($filteredProducts as $producto) { ?>
            <div class="card mb-3" style="width: 18rem;">
                <img class="card-img-top" src="img/<?php echo $producto['imagen']; ?>" width="130" height="200" alt="" style="border-image: 30px; max-width: 210px; max-height: 180px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $producto['nombre'] . " " . $producto['descripcion']; ?></h5>
                    <h5 class="card-title">Precio: $<?php echo $producto['precio']; ?></h5>
                    <h6 class="card-title">Cod. Producto: <?php echo $producto['codigo']; ?></h6>
                    <form method="post">
                        <input type="hidden" name="txtCod" value="<?php echo $producto['codigo']; ?>" />
                        <input type="hidden" name="txtNombre" value="<?php echo $producto['nombre']; ?>" />
                        <input type="hidden" name="txtDescripcion" value="<?php echo $producto['descripcion']; ?>" />
                        <input type="hidden" name="txtPrecio" value="<?php echo $producto['precio']; ?>" />
                        <input type="hidden" name="txtImg" value="<?php echo $producto['imagen']; ?>" />
                        <button type="submit" name="accion" value="Añadir" class="btn-pr">Añadir al carrito</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Prod</th>
                <th>Presentacion</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach($listaP as $product) {
                $total += $product['precio'];
            ?>
                <tr>
                    <td><?php echo $product['codigo']; ?></td>
                    <td><?php echo $product['nombre']; ?></td>
                    <td><?php echo $product['descripcion']; ?></td>
                    <td><?php echo $product['precio']; ?></td>
                    <td>
                        <img class="img-thumbnail rounded" src="img/<?php echo $product['imagen']; ?>" width="80" alt="">
                    </td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="txtCod2" value="<?php echo $product['id']; ?>" />
                            <button type="submit" name="accion" value="Borrar" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <th colspan="3">Total: $<?php echo $total; ?></th>
                <th colspan="2">
                    <form method="post">
                        <button type="submit" name="accion" value="Comprar" class="btn-pr">Comprar</button>
                    </form>
                </th>
                <th></th>
            </tr>
        </tbody>
    </table>
</div>



<?php include("menu2/pie.php"); ?>
