<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Editar Producto</title>
</head>
<body>
    <?php
    $conexion = mysqli_connect("localhost:3306", "root", "", "proyecto_integrador");
    if (isset($_GET['id'])) {
        $idproducto = $_GET['id'];
        $idproducto = mysqli_real_escape_string($conexion, $idproducto); // Escapar el valor del parámetro 'id'
        
        $query = "SELECT * FROM productos WHERE id_producto = $idproducto";
        $resultado = mysqli_query($conexion, $query);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $unafila = mysqli_fetch_assoc($resultado);
            $id = $unafila["id_producto"]; 
            $nombre = $unafila["nombre_producto"]; 
            $precio = $unafila["precio_producto"];
            $cantidad = $unafila["cantidad"];  
            $descripcion = $unafila["descripcion_producto"]; 
        } else {
            echo "<h2>No se encontró el producto</h2>";
            exit;
        }
    }
    if (isset($_POST['guardarcambios'])) {
        $id = $_POST["id_producto"];
        $nombre = $_POST["nombre_producto"];
        $precio = $_POST["precio_producto"];
        $cantidad = $_POST["cantidad"];
        $descripcion = $_POST["descripcion_producto"];
        $query = "UPDATE productos SET id_producto = '$id', nombre_producto = '$nombre', precio_producto = '$precio', cantidad = '$cantidad', descripcion_producto = '$descripcion' WHERE id_producto = '$id'";
        mysqli_query($conexion, $query);

        
            }
            mysqli_close($conexion);
            ?>
    <div class="product-upload-container">
        <div class="product-upload-form">
            <h1>Editar Producto</h1>
            <form action="#" method="post" enctype="multipart/form-data">
            <label for="nombre_producto">Nombre del Producto:</label>
            <input type="text" id="nombre_producto" name="nombre_producto" required value="<?php echo isset($nombre) ? $nombre : ''; ?>">
            
            <label for="precio_producto">Precio:</label>
            <input type="number" id="precio_producto" name="precio_producto" required value="<?php echo isset($precio) ? $precio : ''; ?>">
            
            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" required value="<?php echo isset($cantidad) ? $cantidad : ''; ?>">
            
            <label for="id_producto">Código:</label>
            <input type="number" id="id_producto" name="id_producto" required value="<?php echo isset($id) ? $id : ''; ?>">
            
            <label for="descripcion_producto">Descripción:</label>
            <textarea id="descripcion_producto" name="descripcion_producto" rows="4" required><?php echo isset($descripcion) ? $descripcion : ''; ?></textarea>

            <label for="images">Imágenes:</label>
            <input class="imagenes" type="file" id="images" name="images" accept="image/*" multiple>
          
            <button type="submit" name="guardarcambios">Guardar Cambios</button>
            <a href="./productos.php"> Cancelar </a>
        </form>

        </div>
    </div>
</body>
</html>