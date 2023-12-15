<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if (isset($_GET['id'])) {
        $idproducto = $_GET["id"];
        $conexion = mysqli_connect("localhost:3306","root", "", "proyecto_integrador");
        $idproducto = mysqli_real_escape_string($conexion, $idproducto);
        $query = "DELETE FROM productos WHERE id_producto=$idproducto";
        $resultado = mysqli_query($conexion, $query);
        
        if ($resultado) {
            echo "  ";
            echo "<h2>El producto ha sido eliminado correctamente</h2>";
            echo "<a style='font-size: 24px;' href='./productos.php'> Regresar  </a>";       
        } else {
            echo "<h2>No se pudo eliminar el producto</h2>";
            echo "<a href='./productos.php'> Regresar </a>";       
        }
        
    }
}



mysqli_close($conexion);
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Gestión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Enlace a Font Awesome -->
  
    <script>
        function eliminarProducto(id) {
        if (confirm("Esta seguro que desea eliminar el producto?") == true) {
            window.location.href = "./eliminarproducto.php?id="+id;
         }
            }
    </script>

</head>
 <body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-4">
					<h1 class="heading-section">Tabla de gestión de productos</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						    <tr>
                                <th>Codigo</th>
						    	<th>Nombre</th>
						        <th>Precio</th>
						        <th>Cantidad</th> 
						        <th>Descripción</th> 
                                <th>&nbsp;</th>
						    </tr>
						  </thead>
						  <tbody>
                          <?php
    

    $conexion = mysqli_connect("localhost:3306","root", "", "proyecto_integrador");

    $query = "SELECT * FROM productos";
    $resultado = mysqli_query($conexion, $query);

    while($unafila = mysqli_fetch_assoc($resultado)){
        echo "<tr>";
             echo "<td>" . $unafila["id_producto"] . "</td>"; 
            echo "<td>" . $unafila["nombre_producto"] . "</td>"; 
            echo "<td>" . $unafila["precio_producto"] . "</td>";
            echo "<td>" . $unafila["cantidad"] . "</td>";  
            echo "<td>" . $unafila["descripcion_producto"] . "</td>"; 
        echo "</tr>";
    }
    mysqli_close($conexion);


?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>


	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</body>
</html>

