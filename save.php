<?php
include("db.php");



if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Preparar la consulta SQL con una sentencia preparada
    $query = "INSERT INTO tasks (title, description) VALUES ('$title','$description')";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("query fallado");
    }

    $_SESSION['message'] = 'Datos guardados';
    $_SESSION['message_type'] = "success";

    header("Location: index.php");
}
?>