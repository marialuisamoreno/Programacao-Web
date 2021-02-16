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

// Search information
$query_search = "SELECT * FROM Usuarios WHERE username = '".$user."' AND password = '".$senha."'";
$rs_search = mysqli_query($db_conn, $query_search);
$num_rows = mysqli_num_rows($rs_search);

if ($num_rows){
    echo "OK";
}

mysqli_close($db_conn);
?>