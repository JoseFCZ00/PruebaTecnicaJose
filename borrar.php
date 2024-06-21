<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Registro</title>
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
        }

        .message {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-aceptar {
            padding: 10px 20px;
            background-color: #007bff; /* Azul */
            color: #fff; /* Texto blanco */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        .btn-aceptar:hover {
            background-color: #0056b3; /* Azul más oscuro al pasar el mouse */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message">
            <?php
            include 'includes/db.php';

            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                // SQL para eliminar el registro
                $sql = "DELETE FROM registros WHERE id = $id";

                if ($conn->query($sql) === TRUE) {
                    echo "Registro eliminado correctamente";
                } else {
                    echo "Error al eliminar el registro: " . $conn->error;
                }

                $conn->close();
            } else {
                echo "No se recibió ningún ID para eliminar";
            }
            ?>
        </div>
        <a href="leer.php" class="btn-aceptar">Aceptar</a>
    </div>
</body>
</html>
