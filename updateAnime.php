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

// Update information
$query_update = "UPDATE Animes
                 SET
                    descricao       = '".$description."',
                    total_episodios = ".$total_episodes.",
                    avaliacao       = ".$score."
                 WHERE titulo = '".$title."'
";
$rs_update = mysqli_query($db_conn, $query_update);

mysqli_close($db_conn);
?>