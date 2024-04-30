<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">

    <div class="row">
        <div class="col-md-4">



            <!-- Boton x de borrar Span | Alert -->
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>

                    <button type="button" class="span-btn-close close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <?php session_unset(); ?>

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
    <a href="https://jrravelo.site/#actividad" target="_blank" rel="noopener noreferrer">
        <button type="button" class="btn btn-outline-primary irBtn" id="irBtn">
            Ver portafolio
            <i class="bi bi-suitcase-lg"></i>
        </button>
    </a>

</div>



<?php include("includes/footer.php") ?>