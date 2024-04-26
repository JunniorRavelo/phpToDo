<?php

    include("db.php"); // Incluye el archivo de conexión a la base de datos

    if(isset($_GET['id'])){ // Comprueba si se ha recibido un parámetro 'id' a través de la URL
      $id = $_GET['id']; // Obtiene el valor del parámetro 'id'
      $query = "SELECT * FROM tasks WHERE id = $id"; // Query para seleccionar la tarea con el ID recibido
      $result = mysqli_query($conn, $query); // Ejecuta la consulta

      if(mysqli_num_rows($result) == 1){ // Comprueba si hay una sola fila como resultado
          $row = mysqli_fetch_array($result); // Obtiene la fila de resultados
          $title = $row['title']; // Obtiene el título de la tarea
          $description = $row['description']; // Obtiene la descripción de la tarea
      }
    }

    if (isset($_POST['update'])){ // Comprueba si se ha enviado el formulario para actualizar la tarea
        $id = $_GET['id']; // Obtiene el ID de la tarea
        $title =$_POST['title']; // Obtiene el nuevo título de la tarea del formulario
        $description = $_POST['description']; // Obtiene la nueva descripción de la tarea del formulario

        $query = "UPDATE tasks set title = '$title', description = '$description' WHERE id = $id"; // Query para actualizar la tarea
        mysqli_query($conn, $query); // Ejecuta la consulta de actualización

        $_SESSION['message'] = 'Actualizado correctamente'; // Establece un mensaje de sesión indicando que la tarea ha sido actualizada
        $_SESSION['message_type'] = 'success'; // Establece el tipo de mensaje como 'success'

        header("Location: index.php"); // Redirecciona a la página principal
    }

?>

<?php include ("includes/header.php") ?> <!-- Incluye el encabezado de la página -->

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?= $_GET['id'] ?>" method="post"> <!-- Formulario para enviar los datos de actualización -->
                    <div class="form-group">
                        <input type="text" name="title" value="<?= $title ?>" class="form-control" placeholder="Update Title"> <!-- Campo para actualizar el título de la tarea -->
                    </div>

                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Update Description">
                            <?= $description ?>
                        </textarea> <!-- Campo para actualizar la descripción de la tarea -->
                    </div>

                    <button class="btn-success" name="update"> <!-- Botón para enviar el formulario de actualización -->
                        Actualizar
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<?php include("includes/footer.php") ?> <!-- Incluye el pie de página -->