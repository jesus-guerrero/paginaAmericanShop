
<?php include("menu2/cabecera.php"); ?>




<?php 

$sentenciaSQL=$conexion->prepare("SELECT * FROM listaProductos");
$sentenciaSQL->execute();
$listaP=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comercial";



?>


<head>
    <!-- incluir los archivos CSS y JS de Slick.js -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</head>
<body>

    


    <div id="confirmacion-compra" class="card" style="background: #fff;position: relative; width: 1410px;  max-width: 2000px;           
        max-height: 1600px; height:550px ;  top: 30%; left: 50%; transform: translate(-50%, -50%); ">
    <div class="card-header">Confirmación de compra</div>
    <div class="card-body">
        <p>¡Gracias por su compra!</p>
        <a href="compras.php">  
        <button class="btn btn-danger" style="position: relative; top: -97px; left: 1323px; " onclick="cerrarTarjeta()">Cerrar</button>
        </a>
        <?php

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Verificar conexión
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT nombre, descripcion, precio, imagen FROM listaproductos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // mostrar los productos en un slider si hay más de 3, en tarjetas si no hay suficientes
        if ($result->num_rows > 3) {
            // abrir el contenedor del slider
            echo '<div class="slider">';
        } else {
            // abrir el contenedor de las tarjetas
            echo '<div class="row">';
        }

        // mostrar los datos de cada producto
        while($row = $result->fetch_assoc()) {
            $nombre = $row["nombre"];
            $precio = $row["precio"];
            $imagen = $row["imagen"];
            if ($result->num_rows > 3) {
            // mostrar la tarjeta dentro de un elemento de slide del slider
            echo '<div class="slide"><div class="card">';
            } else {
            // mostrar la tarjeta dentro de una columna de la fila de tarjetas
            echo '<div class="col-sm-4"><div class="card">';
            }
            // mostrar los datos del producto
            echo '<img src="'.$imagen.'" class="card-img-top" alt="'.$nombre.'">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'.$nombre.'</h5>';
            echo '<p class="card-text">'.$precio.'</p>';
            echo '<a href="#" class="btn btn-primary">Comprar</a>';
            echo '</div></div></div>';
        }

        if ($result->num_rows > 3) {
            // cerrar el contenedor del slider y activar Slick.js
            echo '</div>';
            echo '<script type="text/javascript">';
            echo '$(".slider").slick({';
            echo 'dots: true,';
            echo 'infinite: true,';
            echo 'slidesToShow: 3,';
            echo 'slidesToScroll: 3';
            echo '});';
            echo '</script>';
        } else {
            // cerrar el contenedor de las tarjetas
            echo '</div>';
        }
        } else {
        echo "No se encontraron productos";
        }
        $conn->close();
        ?>
    </div>

    </div>
    </div>
</body>




<script>
  var botonComprar = document.getElementById("boton-comprar");
  var tarjetaConfirmacion = document.getElementById("confirmacion-compra");

  botonComprar.addEventListener("click", function() {
    tarjetaConfirmacion.style.display = "block";
  });

  function cerrarTarjeta() {
    tarjetaConfirmacion.style.display = "none";
  }
</script>








    

