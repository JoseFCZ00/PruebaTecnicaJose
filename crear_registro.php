<!DOCTYPE html>
<html>
<head>
    <title>Crear Registro</title>
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
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            text-align: left;
        }

        .input-style {
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

        .input-style:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /* Estilos para el botón */
        button {
            --button_radius: 0.75em;
            --button_color: #e8e8e8;
            --button_outline_color: #000000;
            font-size: 17px;
            font-weight: bold;
            border: none;
            border-radius: var(--button_radius);
            background: var(--button_outline_color);
            color: var(--button_color);
            padding: 0;
            cursor: pointer;
            display: inline-block;
            position: relative;
            overflow: hidden;
            transition: color 0.4s ease;
            margin-top: 20px; /* Espacio arriba del botón */
        }

        .button_top {
            display: block;
            box-sizing: border-box;
            border: 2px solid var(--button_outline_color);
            border-radius: var(--button_radius);
            padding: 0.75em 1.5em;
            background: var(--button_color);
            color: var(--button_outline_color);
            transform: translateY(-0.2em);
            transition: transform 0.1s ease;
        }

        button:hover .button_top {
            /* Pull the button upwards when hovered */
            transform: translateY(-0.33em);
        }

        button:active .button_top {
            /* animacion para el boton de guardar :) */
            transform: translateY(0);
        }

        /* Estilos para el contenedor del botón */
        .button-container {
            text-align: center; /* Centra horizontalmente */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Crear Nuevo Registro</h2>
        <form action="crear_registro.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="input-style" required>
            <label for="correo_electronico">Correo Electrónico:</label>
            <input type="email" id="correo_electronico" name="correo_electronico" class="input-style" required>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" class="input-style" required>
            
           
            <div class="button-container">
                <button type="submit" name="submit">
                    <span class="button_top">Guardar</span>
                </button>
            </div>
        </form>
        
        <a href="index.php" class="btn">Regresar al Inicio</a> 

        <?php
        if (isset($_POST['submit'])) {
            include 'includes/db.php';

            $nombre = $_POST['nombre'];
            $correo_electronico = $_POST['correo_electronico'];
            $telefono = $_POST['telefono'];

            $sql = "INSERT INTO registros (nombre, correo_electronico, telefono) VALUES ('$nombre', '$correo_electronico', '$telefono')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Nuevo registro creado con éxito</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
