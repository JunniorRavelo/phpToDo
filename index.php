<?php include("db.php")?> <!-- Incluye el archivo de conexión a la base de datos -->

<?php include ("includes/header.php")?> <!-- Incluye el encabezado de la página -->

<div class="container p-4">

    <div class="row">
        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])){?> <!-- Comprueba si hay un mensaje en la sesión -->
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert"> <!-- Crea una alerta con el tipo de mensaje almacenado en la sesión -->
                    <?= $_SESSION['message'] ?> <!-- Muestra el mensaje almacenado en la sesión -->
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <!-- Botón para cerrar la alerta -->
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php session_unset(); }?> <!-- Elimina el mensaje de la sesión después de mostrarlo -->

            <div class="card card-body">

                <form action="save.php" method="post"> <!-- Formulario para enviar los datos a save.php -->
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task title" autofocus> <!-- Campo para el título de la tarea -->
                    </div>

                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Task description"></textarea> <!-- Campo para la descripción de la tarea -->
                    </div>

                    <input type="submit" class="btn btn-success btn-block" name="save" value="save task"> <!-- Botón para guardar la tarea -->
                </form>

            </div>

        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Descripcion</th>
                        <th>Creado</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT * FROM tasks"; // Consulta para seleccionar todas las tareas
                    $result_tasks = mysqli_query($conn, $query); // Ejecuta la consulta

                    while ($row = mysqli_fetch_array($result_tasks)){ ?> <!-- Itera sobre los resultados de la consulta -->

                        <tr>
                            <td><?php echo $row['title'] ?></td> <!-- Muestra el título de la tarea -->
                            <td><?php echo $row['description'] ?></td> <!-- Muestra la descripción de la tarea -->
                            <td><?php echo $row['created_at'] ?></td> <!-- Muestra la fecha de creación de la tarea -->

                            <td>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-secondary"> <!-- Enlace para editar la tarea -->
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger"> <!-- Enlace para eliminar la tarea -->
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                    <?php }
                    ?>

                </tbody>
            </table>
        </div>
    </div>


</div>

<?php include ("includes/footer.php")?> <!-- Incluye el pie de página -->
