<?php
$servername = "localhost";
$database = "209611";
$username = "209611";
$password = "1005roger";
// Create connection
$db_conn = mysqli_connect($servername, $username, $password, $database);

// GET information
$id = $_GET['id'];

// Tratamento de dados
$id_array = explode("-", $id);
foreach($id_array as $i){
    // Remove information
    $query_delete = "DELETE FROM Relacao_Usuario_Anime WHERE id = '".$i."';
    ";
    $rs_delete = mysqli_query($db_conn, $query_delete);
}

mysqli_close($db_conn);
?>