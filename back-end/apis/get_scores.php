<?php 
include("../database/config.php");

if(isset($_GET["id"])){
    $id =$_GET["id"];
}else{
    $id =-1;
}

if($id ==-1){
    $sql ="SELECT * FROM scores ORDER BY score DESC, duration ASC LIMIT 5";
    $query =$mysql->prepare($sql);
}
 else {
    $sql ="SELECT * FROM scores WHERE id=? ORDER BY score desc,duration asc LIMIT 5";
    $query =$mysql->prepare($sql);
    $query->bind_param("i",$id);
}
$query->execute();
$result =$query->get_result();
$response =[];
$response["success"] =true;
$response["data"] =[];
while($row = $result->fetch_assoc()){
    $response["data"][] =$row;
}

echo json_encode($response);
?>
