


<?php include("baseDatos\conexion.php"); ?>


<?php 

$sentenciaSQL=$conexion->prepare("SELECT * FROM listaProductos");
$sentenciaSQL->execute();
$listaP=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comercial";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch ($accion) {
    case "Comprar":
        echo "si";
        $txtComprares="Compra realizada con exito";
        $txtResul=0;
        $sentenciaSQL=$conexion->prepare("DELETE FROM listaProductos");
        $sentenciaSQL->execute(); 
       header("Location:compras.php");
      break;
  
  }



?>

<?php include("menu2/cabecera.php"); ?>


<body>
    <div id="confirmacion-compra" class="card" style="background: #fff;position: relative; width: 1410px;  max-width: 2000px;
        max-height: 1600px; height:650px ;  top: 33%; left: 50%; transform: translate(-50%, -50%); ">
    <div class="card-header"><h4>Confirmación de compra</h4></div>
    <div class="card-body">
        
        <a href="compras.php">  
        <button class="btn btn-danger" style="position: relative; top: -70px; left: 1323px; " onclick="cerrarTarjeta()">Cerrar</button>
        </a>

        <div class="row">

            <?php

            $numproductos=0;

            $conn = new mysqli($servername, $username, $password, $dbname);
            // Verificar conexión
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, nombre, descripcion, precio, imagen FROM listaproductos";
            $result = $conn->query($sql);

           


            if ($result->num_rows > 0) {
                
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $nombre = $row["nombre"];
                $descripcion = $row["descripcion"];
                $precio = $row["precio"];
                $imagen = $row["imagen"];
                
                // mostrar los datos en una tarjeta

                ?>
                <div class="card" style="width: 320px; height:300px">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $nombre ?></h4>
                    <p class="card-text"><?php echo $precio ?>$</p>
                    <!-- <a href="#" class="btn btn-primary">Comprar</a> -->
                <img src="img/<?php echo $imagen ?>" width ="130" height="200" class="card-img-top" alt="<?php echo $nombre ?>">

                <form method="post">
                    <input type="hidden" name="txtCod2" id="txtCod2" value="<?php echo $id ?>" />
                    <input type="hidden" name="txtTotal" id="txtTotal" value="<?php echo $precio ?>" />

                    <?php $txtResul=$precio+$txtSuma;
                        $txtSuma=$txtResul;
                    ?>
                </form>


                </div>
                </div>

                <style>
                .card:hover {
                transform: scale(1.1);
                transition: all 0.3s ease;
                }
                </style>

                <?php
            }
            } else {
            echo "0 results";
            }
            $conn->close();
            ?>
        </div>


        <div class="card" style="width: 700px; height:200px">
                <div class="card-body">
                    <h4 class="card-title">Total Productos: 4</h4>
                    <h4 class="card-text"><?php echo $txtSuma ?>$</h4>
                    <form method="post">
                    <input type="submit" name="accion" value="Comprar" class= "btn btn-primary" />
                    </form>
                    <!-- <a href="#" class="btn btn-primary">Comprar</a> -->
                    <img src="img/gracias.jpg" style="position: relative; top: -128px; left: 600px;" width ="130" height="200" class="card-img-top" alt="<?php echo $nombre ?>">
                

                </div>
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
