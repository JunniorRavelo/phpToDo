<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">

    <div class="row">
        <div class="col-md-4">



            <!-- Boton x de borrar Span | Alert -->
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>

                    <h1>Hola mundo</h1>

                    <button type="button" class="span-btn-close close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <?php session_unset(); ?>

                <!-- Script: Para que se cierre el span -->
                <script>
                    // Agregamos un evento de clic al botón de cierre
                    document.querySelector('.alert .close').addEventListener('click', function() {
                        // Ocultamos la alerta
                        document.querySelector('.alert').style.display = 'none';
                    });
                </script>
            <?php } ?>


            <div class="card card-body">

                <form action="save.php" method="post">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>
                    </div>

                    <br>

                    <div class="form-gropu">
                        <textarea name="description" rows="2" class="form-control" placeholder="Task description"></textarea>
                    </div>

                    <br>

                    <input type="submit" class="btn btn-success btn-block" name="save" value="save task">
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

                    $query = "SELECT * FROM tasks";
                    $result_tasks = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_tasks)) { ?>

                        <tr>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['created_at'] ?></td>

                            <td>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-secondary">
                                    <i class="bi bi-pen"></i>
                                </a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
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



<div>
    <button type="button" class="btn btn-outline-primary irBtn" id="irBtn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suitcase-lg" viewBox="0 0 16 16">
            <path d="M5 2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2h3.5A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5H14a.5.5 0 0 1-1 0H3a.5.5 0 0 1-1 0h-.5A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2zm1 0h4a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1M1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5H3V3zM15 12.5v-9a.5.5 0 0 0-.5-.5H13v10h1.5a.5.5 0 0 0 .5-.5m-3 .5V3H4v10z"></path>
        </svg>
        Ir al portafolio
    </button>
</div>



<?php include("includes/footer.php") ?>