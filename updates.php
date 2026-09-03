<?php
require 'api.php';
header("Content-Type: application/json");



$data = json_decode(file_get_contents('php://input'),true);

if (!$data) { echo json_encode([ "status" => "error", "message" => "Invalid JSON data" ]); exit; }
$id = $data['STD_ID'];
$name = $data['name'];
$rollno = $data['rollno'];
$phone = $data['phone'];
$department = $data['department'];
$dob = $data['dob'];

$sqls = $con->prepare(" UPDATE student SET NAME = :name, 
        ROLLNO = :rollno,
        DEPARTMENT = :department,
        PHONE = :phone,
        DOB = :dob
        WHERE STD_ID = :id ");


$sqls->execute([ ':name' => $name, ':id' => $id , ':rollno' => $rollno, ':department' => $department , ':phone' => $phone, ':dob' => $dob   ]);
echo json_encode([ "status" => "success", "message" => "Student updated successfully", "data" => $data ]);

















?>