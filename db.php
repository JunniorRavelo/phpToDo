<?php

session_start(); // Inicia la sesión

$conn = mysqli_connect( // Establece la conexión a la base de datos
    'localhost', // Host de la base de datos
    'root', // Nombre de usuario de la base de datos
    '', // Contraseña de la base de datos
    'bd_learn' // Nombre de la base de datos
);
?>