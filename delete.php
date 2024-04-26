<?php

    include("db.php"); // Incluye el archivo de conexión a la base de datos

    if(isset($_GET['id'])){ // Comprueba si se ha recibido un parámetro 'id' a través de la URL
        $id = $_GET['id']; // Obtiene el valor del parámetro 'id'
        $query = "DELETE FROM tasks WHERE id = $id"; // Query para eliminar la tarea con el ID recibido
        $result = mysqli_query($conn, $query); // Ejecuta la consulta

        if(!$result){ // Si la consulta no tiene éxito, muestra un mensaje de error y termina el script
            die("no existe resultado");
        }

        $_SESSION['message'] = 'Tarea eliminada'; // Establece un mensaje de sesión indicando que la tarea ha sido eliminada
        $_SESSION['message_type'] = 'danger'; // Establece el tipo de mensaje como 'danger'

        header("Location: index.php"); // Redirecciona a la página principal
    }

?>