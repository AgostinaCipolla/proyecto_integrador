<?php
    if(!empty($_POST["nombre_producto"]) && !empty($_POST["precio_producto"]) && !empty($_POST["cantidad"]) && !empty($_POST["descripcion_producto"])){
        $conexion = mysqli_connect("localhost:3306", "root", "", "proyecto_integrador");

        $query = "INSERT INTO productos (nombre_producto, precio_producto, cantidad, descripcion_producto) VALUES ('".$_POST['nombre_producto']."', '".$_POST["precio_producto"]."', '".$_POST["cantidad"]."', '".$_POST["descripcion_producto"]."')";
        $resultado = mysqli_query($conexion, $query);

        if($resultado === true){
            echo "<h2>El producto ha sido agregado correctamente</h2>";
        }
        else{
            echo "<h2>No se pudo agregar el producto</h2>";
        }

        mysqli_close($conexion);
    }
?>

<?php
if (isset($_POST['submit'])) {
    if (!empty($_POST["nombre_producto"]) && !empty($_POST["precio_producto"]) && !empty($_POST["cantidad"]) && !empty($_POST["descripcion_producto"]) ) {
            $conexion = mysqli_connect("localhost:3306","root", "", "proyecto_integrador");
            $query = "INSERT INTO productos (nombre_producto, precio_producto, cantidad, descripcion_producto) VALUES ('".$_POST['nombre_producto']."','".$_POST['precio_producto']."','".$_POST['cantidad']."','".$_POST['descripcion_producto']."')";
            $resultado = mysqli_query($conexion, $query);
            
            if ($resultado === true) {
                echo "<h2>El producto ha sido agregado correctamente</h2>";
            } else {
                echo "<h2>No se pudo agregar el producto</h2>";
            }

        }
mysqli_close($conexion);  
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Cargar Producto</title>
</head>
<body>
    <div class="product-upload-container">
    <div class="product-upload-form">
        <h1>Cargar Producto</h1>
        <form action="" method="post">
            <label for="nombre_producto">Nombre del Producto:</label>
            <input type="text" id="nombre_producto" name="nombre_producto" required>

            <label for="precio_producto">Precio:</label>
            <input type="number" id="precio_producto" name="precio_producto">
            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad">
            <label for="descripcion_producto">Descripción:</label>
            <textarea id="descripcion_producto" name="descripcion_producto" rows="4"></textarea>
            <label for="imagen_producto">Imágenes:</label>
            <input class="imagenes" type="file" id="imagen_producto" name="imagen_producto" >

            
            <button type="submit">Agregar Producto</button>
            <a href="./productos.php"> Cancelar </a>
        </form>
    </div>
    
    </div>
</body>
</html>


