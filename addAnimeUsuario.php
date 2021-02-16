<?php
$servername = "localhost";
$database = "209611";
$username = "209611";
$password = "1005roger";
// Create connection
$db_conn = mysqli_connect($servername, $username, $password, $database);

// GET information
$titulo = $_GET['titulo'];
$username = $_GET['username'];

// Insert information
$query_insert = "INSERT INTO Relacao_Usuario_Anime (login_usuario, titulo_anime) 
                 VALUES ('".$username."', '".$titulo."')
";
$rs_insert = mysqli_query($db_conn, $query_insert);

mysqli_close($db_conn);
?>