<?php
include("db.php"); // Incluye el archivo de conexión a la base de datos

if (isset($_POST['save'])) { // Comprueba si se ha enviado el formulario para guardar los datos
    $title = $_POST['title']; // Obtiene el título de la tarea del formulario
    $description = $_POST['description']; // Obtiene la descripción de la tarea del formulario

    // Preparar la consulta SQL con una sentencia preparada
    $query = "INSERT INTO tasks (title, description) VALUES ('$title','$description')"; // Query para insertar una nueva tarea en la base de datos
    $result = mysqli_query($conn, $query); // Ejecuta la consulta

    if (!$result) { // Si la consulta falla, muestra un mensaje de error y finaliza el script
        die("query fallado");
    }

    $_SESSION['message'] = 'Datos guardados'; // Establece un mensaje de sesión indicando que los datos han sido guardados correctamente
    $_SESSION['message_type'] = "success"; // Establece el tipo de mensaje como 'success'

    header("Location: index.php"); // Redirecciona a la página principal
}
