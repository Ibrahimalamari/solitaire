<?php
include("../database/config.php");

$data = json_decode(file_get_contents("php://input"), true);

if(isset($data["name"]) && $data["name"] != ""){
    $name = $data["name"];
} else {
    echo json_encode(["success" => false, "error" => "NameMissing"]);
}

$score = rand(1, 10);
$duration = rand(1, 40);

$query = $mysql->prepare("INSERT INTO scores(name,score,duration) VALUES (?,?,?)");
$query->bind_param("sii", $name, $score, $duration);
$query->execute();

echo json_encode(["success" => true]);
?>
