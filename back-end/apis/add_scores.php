
<?php 
include("../database/connection.php");

$data = json_decode(file_get_contents("php://input"), true);

if(isset($data["name"]) && $data["name"] != ""){
    $name = $data["name"];
}else{
   header("Location: ../front-end/solitaire.html?error=NameMissing");
    exit();
}
$score = rand(0, 10);      
$duration = rand(0, 40);  


$query = $mysql->prepare("INSERT INTO scores(name,score,duration) VALUES (?,?,?)");
$query->bind_param("sii", $name,$score,$duration);
$query->execute();



header("Location: ../front-end/solitaire.html");

?>