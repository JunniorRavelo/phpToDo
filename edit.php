<?php

    include("db.php");

    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $query = "SELECT * FROM tasks WHERE id = $id";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) == 1){
          $row = mysqli_fetch_array($result);
          $title = $row['title'];
          $description = $row['description'];
      }
    }

    if (isset($_POST['update'])){
        $id = $_GET['id'];
        $title =$_POST['title'];
        $description = $_POST['description'];

        $query = "UPDATE tasks set title = '$title', description = '$description' WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Actualizado correctamente';
        $_SESSION['message_type'] = 'success';

        header("Location: index.php");
    }

?>

<?php include ("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?= $_GET['id'] ?>" method="post">
                    <div class="form-group">
                        <input type="text" name="title" value="<?= $title ?>" class="form-control" placeholder="Update Title">
                    </div>

                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Update Description">
                            <?= $description ?>
                        </textarea>
                    </div>

                    <button class="btn-success" name="update">
                        Actualizar
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>