<?php
$servername = "localhost";
$database = "209611";
$username = "209611";
$password = "1005roger";
// Create connection
$db_conn = mysqli_connect($servername, $username, $password, $database);

// GET informações do usuario
$user = $_GET['username'];
$senha = md5($_GET['password']);
$email = $_GET['email'];
$phone_number = $_GET['phone_number'];
$birth_date = $_GET['birth_date'];

// Insert information
$query_insert = "INSERT INTO Usuarios (username, password, email, phone_number, birth_date) 
                 VALUES ('".$user."', '".$senha."', '".$email."', '".$phone_number."', '".$birth_date."')
";
$rs_insert = mysqli_query($db_conn, $query_insert);

mysqli_close($db_conn);
?>