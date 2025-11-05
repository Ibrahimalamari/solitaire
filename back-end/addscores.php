<?php
include('config.php');

// Get username from POST
$username = $mysql->real_escape_string($_POST['username'] ?? '');
$score = rand(0, 10);      
$duration = rand(0, 40);   

$sql = "INSERT INTO scores (name, score, duration) VALUES ('$username', $score, $duration)";
$query=$mysql->prepare($sql);
$query->execute();
header("Location: ../front-end/solitaire.html");
?>
