<?php
require 'api.php';
header("Content-Type: application/json");

$headers = getallheaders();


$auth = $headers['Authorization'];

$validToken = "my-secret-token-123";
$validToken1 ="my-secret-token-124";


if ($auth === "Bearer " . $validToken) {

$sql = $con->prepare("SELECT * FROM student");
$sql->execute();
$row = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([ "status" => "success", "message" => "Student updated successfully", "data" => $row ]);



}
elseif ($auth === "Bearer " . $validToken1) {


$sql = $con->prepare("SELECT NAME , ROLLNO FROM student");
$sql->execute();
$row = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([ "status" => "success", "message" => "Student updated successfully", "data" => $row ]);
}

else{
    http_response_code(401);

    echo json_encode([
        "status" => "error",
        "message" => "Invalid token"
    ]);

    exit;
}





?>