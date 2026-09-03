<?php
require 'api.php';
header("Content-Type: application/json");

$headers = getallheaders();


$auth = $headers['Authorization'];

$validToken = "my-secret-token-123";

if ($auth !== "Bearer " . $validToken) {

    http_response_code(401);

    echo json_encode([
        "status" => "error",
        "message" => "Invalid token"
    ]);

    exit;
}


$sql = $con->prepare("SELECT * FROM student");
$sql->execute();
$row = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([ "status" => "success", "message" => "Student updated successfully", "data" => $row ]);





?>
