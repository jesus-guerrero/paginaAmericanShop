<?php include("menu2/cabecera.php"); ?>

        <script>
        function cerrarTarjeta() {
            document.getElementById("resultado-busqueda").style.display = "none";
        }
        </script>

<?php
			// Conexión a la base de datos
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "comercial";

			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Conexión fallida: " . $conn->connect_error);
			}

			// Procesar la búsqueda
			$nombre = $txtBuscar;
			$sql = "SELECT * FROM productos WHERE nombre LIKE '%$nombre%'";
			$result = $conn->query($sql);

			// Mostrar los resultados en una tarjeta
			if ($result->num_rows > 0) {
                

				echo '<div class="card" style="position: relative; top: 0%; left: 50%; transform: translate(-50%, 0%);">';
				echo '<div class="card-header">Resultados de la búsqueda</div>';
				echo '<div class="card-body">';

                
				while($row = $result->fetch_assoc()) {
                    
                    echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
                    echo '<p class="card-text">' . $row["descripcion"] . '</p>';
                    echo '<p class="card-text">Precio: ' . $row["precio"] . ' $</p>';
                    echo '<a href="compras.php"><img src="img/' . $row["imagen"] . '" class="card-img-top"  style="width: 350px; height:300px;  position: relative; left:340px; top: -125px;" alt="Imagen del producto"></a>';
					echo '<div class="card-body">
					<a href="compras.php" class="btn btn-primary" style="width:100px; position: relative; left:-18px; top: -290px;"> Ir a comprar </a>
					</div>';
					// echo "-----------------------------------------------------------------------------------------------------------------";

                }
                // echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarTarjeta()" style="position: absolute; left:1120px; top: 0px;"  href="home.php" >';
                echo '<div class="card-body">
                <a href="home.php" class="btn btn-danger" style="position: absolute; left:1123px; top: 0px;"> X </a>
                </div>';
                // echo '<span aria-hidden="true">&times;</span>';
                // echo '</button></div></div>';
                
        
            } else {
                echo "No se encontraron resultados.";
            }

			//$conn->close();
		?>
        

        