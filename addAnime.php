<?php
$servername = "localhost";
$database = "209611";
$username = "209611";
$password = "1005roger";
// Create connection
$db_conn = mysqli_connect($servername, $username, $password, $database);

// GET information
$title = $_GET['titulo'];
$description = $_GET['descricao'];
$total_episodes = $_GET['total_episodios'];
$score = $_GET['avaliacao'];

// Tratamento dos dados
$total_episodes = (int)$total_episodes;
$score = (float)$score;

// Insert information
$query_insert = "INSERT INTO Animes (titulo, descricao, total_episodios, avaliacao) 
                 VALUES ('".$title."', '".$description."', ".$total_episodes.", ".$score.")
";
$rs_insert = mysqli_query($db_conn, $query_insert);

mysqli_close($db_conn);
?>