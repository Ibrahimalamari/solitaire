<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
$db_host="localhost";
$db_username="root";
$db_pass=null;
$db_name="solitaireGame_db";

$mysql=new mysqli($db_host,$db_username,$db_pass,$db_name);