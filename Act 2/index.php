<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica remota PHP 6</title>
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
        <label for="ID">ID</label>
        <input type="text" name="ID" id="ID">

        <label for="name">name</label>
        <input type="text" name="name" id="name">

        <input type="submit" value="Enviar">
    </form>

    <?php
    // REPORTING DE ERRORES
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // Include the database connection file
    include_once("config.php");
    if (isset($_POST['name'])) { //Para validar que el formulario se haya enviado, y no es una variable vacía
        $id = $_POST['ID'];
        $name = $_POST['name'];

        echo "<h1>$name agregado a la base de datos con la id $id</h1>";
        
        //Insertar usuario en base de datos
        $stmt = $mysqli->prepare("INSERT INTO employees (id,name) VALUES($id,'$name')");
        $stmt->execute();

        //Mostrar usuarios de base de datos en una tabla
        $result = $mysqli->query("SELECT * FROM employees");
        echo "<h1>Usuarios en base de datos</h1>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>