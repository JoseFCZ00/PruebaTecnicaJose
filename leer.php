<!DOCTYPE html>
<html>
<head>
    <title>Leer Registros</title>
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
            text-align: center;
            margin-top: 20px;
            max-width: 800px; /* Ancho máximo del contenedor */
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin-bottom: 20px; /* Espacio inferior */
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .btn-editar, .btn-eliminar {
            display: inline-block;
            padding: 8px 16px;
            background-color: #f0f0f0; /* Color de fondo base */
            color: #333; /* Color de texto */
            border: 1px solid #ccc; /* Borde gris */
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
            text-decoration: none; /* Quita la subraya del enlace */
            transition: background-color 0.3s, color 0.3s, border-color 0.3s; /* Transiciones suaves */
        }

        .btn-editar:hover, .btn-eliminar:hover {
            background-color: #e0e0e0; /* Color de fondo al pasar el mouse */
            color: #222; /* Color de texto al pasar el mouse */
            border-color: #aaa; /* Borde al pasar el mouse */
        }

        .btn-regresar {
            display: block; /* Convertir en bloque para ocupar ancho completo */
            margin-top: 20px; /* Espacio arriba del botón */
            padding: 10px 20px;
            background-color: #007bff; /* Azul */
            color: #fff; /* Texto blanco */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
            width: 100%; /* Ancho completo */
            max-width: 300px; /* Máximo ancho para evitar que ocupe toda la pantalla */
            margin: auto; /* Centrar horizontalmente */
        }

        .btn-regresar:hover {
            background-color: #0056b3; /* Azul más oscuro al pasar el mouse */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Lista de Registros</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Acciones</th>
            </tr>
            <?php
            include 'includes/db.php';

            $sql = "SELECT * FROM registros";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["nombre"]. "</td>
                        <td>" . $row["correo_electronico"]. "</td>
                        <td>
                            <form action='actualizar.php' method='GET' style='display: inline;'>
                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                <button type='submit' class='btn-editar'>Editar</button>
                            </form>
                            <form action='borrar.php' method='POST' style='display: inline;'>
                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                <button type='submit' class='btn-eliminar'>Eliminar</button>
                            </form>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay registros</td></tr>";
            }

            $conn->close();
            ?>
        </table>

        <a href="index.php" class="btn-regresar">Regresar al Inicio</a>
    </div>
</body>
</html>
