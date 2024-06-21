<?php
include 'includes/db.php';

$message = ''; // Variable para almacenar el mensaje de éxito o error

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM registros WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo_electronico = $_POST['correo_electronico'];
    $telefono = $_POST['telefono']; // Nuevo campo para el teléfono

    $sql = "UPDATE registros SET nombre='$nombre', correo_electronico='$correo_electronico', telefono='$telefono' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $message = "Registro actualizado con éxito";
        // Redireccionar a leer.php después de 1 segundo
        header("refresh:1;url=leer.php");
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Registro</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Centra el contenido */
            display: flex;
            flex-direction: column; /* Alinea los elementos en columna */
            align-items: center; /* Centra horizontalmente los elementos */
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            text-align: left;
            width: 100%; /* Ajusta el ancho del formulario al contenedor */
            max-width: 300px; /* Limita el ancho del formulario */
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: calc(100% - 20px); /* Ajusta el ancho teniendo en cuenta el padding */
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            color: #555;
            outline: none;
            margin-bottom: 10px;
            box-sizing: border-box; /* Asegura que el padding no afecte el ancho total */
        }

        button, .back-link {
            margin-top: 20px; /* Espacio arriba del botón */
            font-size: 17px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none; /* Quitamos subrayado */
            display: inline-block; /* Ajustamos el comportamiento inline */
            text-align: center; /* Centramos el texto */
            margin-right: 10px; /* Margen derecho para separar botones */
            width: 100%; /* Ajusta el ancho al contenedor */
            max-width: 200px; /* Limita el ancho del botón */
        }

        button:hover, .back-link:hover {
            background-color: #0056b3; /* Cambio de color al pasar el ratón */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Actualizar Registro</h2>
        <?php if (!empty($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="actualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
            <label for="correo_electronico">Correo Electrónico:</label>
            <input type="email" id="correo_electronico" name="correo_electronico" value="<?php echo $row['correo_electronico']; ?>" required>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $row['telefono']; ?>" required> <!-- Campo para el teléfono -->
            <button type="submit" name="actualizar">Actualizar</button>
            <a href="leer.php" class="back-link">Regresar a la Lista de Registros</a>
        </form>
    </div>
</body>
</html>
