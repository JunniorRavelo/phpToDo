<?php

session_start(); // Inicia una nueva sesión

$conn = mysqli_connect( // Establece una conexión con la base de datos
    'localhost', // Dirección del servidor de la base de datos
    'root', // Nombre de usuario de la base de datos
    '', // Contraseña de la base de datos (en este caso, vacía)
    'bd_learn' // Nombre de la base de datos a la que se conecta
);
?>