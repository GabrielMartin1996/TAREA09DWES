<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Resultado de Servicio Web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff; /* Color de fondo blanco */
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .resultado-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .html-container {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resultado del Servicio Web</h1>

        <h2>Resultado en JSON</h2>
        <div class="resultado-container">
            <?php
            /**
             * Obtiene los datos del servicio web y los muestra en formato JSON.
             *
             * @return string Retorna una cadena JSON con los datos obtenidos del servicio web.
             */
            function obtenerDatosServicioWeb() {
                // Usar file_get_contents() para obtener los datos del servicio web
                $data = file_get_contents('https://jsonplaceholder.typicode.com/todos/2');
                // Convertir los datos JSON a un array asociativo
                $jsonData = json_decode($data, true);
                // Mostrar los datos formateados en la página
                return json_encode($jsonData, JSON_PRETTY_PRINT);
            }

            echo "<pre>" . obtenerDatosServicioWeb() . "</pre>";
            ?>
        </div>
        
        <h2>Resultado HTML</h2>
        <div class="html-container">
            <?php
            /**
             * Muestra los datos adicionales de la API en formato HTML.
             *
             * @param string $title El título de los datos adicionales.
             * @param int $id El ID de los datos adicionales.
             * @return void
             */
            function mostrarDatosAdicionalesHTML($title, $id) {
                // Hacer una segunda solicitud a la API
                $additional_data = file_get_contents('https://jsonplaceholder.typicode.com/posts/2');
                // Convertir los datos JSON a un array asociativo
                $additional_jsonData = json_decode($additional_data, true);
                echo "<p><strong>User ID:</strong> " . $additional_jsonData['userId'] . "</p>";
                echo "<p><strong>ID:</strong> " . $additional_jsonData['id'] . "</p>";
                echo "<p><strong>Título:</strong> " . $additional_jsonData['title'] . "</p>";
                echo "<p><strong>Body:</strong> " . $additional_jsonData['body'] . "</p>";
            }

            mostrarDatosAdicionalesHTML('Título', 2);
            ?>
        </div>
    </div>
</body>
</html>
