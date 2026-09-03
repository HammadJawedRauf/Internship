<?php
require 'api.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'),true);

if (!$data) { echo json_encode([ "status" => "error", "message" => "Invalid JSON data" ]); exit; }
$id = $data['ID'];


if(!is_numeric($data['ID'])){
    echo json_encode([ "status" => "error", "message" => "Input valid Id" ]); 
    exit;
}
else{
$sqls = $con->prepare(" DELETE FROM student  WHERE STD_ID = :id ");
$sqls->execute([  ':id' => $id ]);
echo json_encode([ "status" => "success", "message" => "Student DELETED successfully", "data" => $data ]);
}

?>