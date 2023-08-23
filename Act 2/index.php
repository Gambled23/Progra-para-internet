<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica PHP con apache</title>
    <style>
        label {
            display: block;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1>Contacto</h1>
    <form method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="mensaje">Mensaje</label>
        <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    echo "<h1>Prueba</h1>";
    if (isset($_POST['nombre'])) { //Para validar que el formulario se haya enviado, y no es una variable vacía
        $nombre = $_POST['nombre'];
        echo "<p>Hola " . $nombre . " gracias por tu mensaje" . "</p>";
        echo "<h2>Email: " . $_POST['email'] . "</h2>";
        echo "<h2>Mensaje: " . $_POST['mensaje'] . "</h2>";
    }
    ?>
</body>
</html>