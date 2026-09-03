<?php
require 'api.php';
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'),true);
if (!$data) { echo json_encode([ "status" => "error", "message" => "Invalid JSON data" ]); exit; }

$name = $data['name'];

$RN = $data['rollno'];
$PH = $data['phone'];
$DE = $data['department'];       
$DO = $data['dob'];
$STATUS = $data['status'];
$sql = "INSERT INTO student
               (NAME, ROLLNO, PHONE, DEPARTMENT, DOB ,STATUS)
                VALUES (:name, :RN, :PH, :DE, :DO, :STATUS )";

        $stmt = $con->prepare($sql);

        $stmt->execute([
            ':name' => $name,
            ':PH' => $PH,
            ':DE' => $DE,
            ':DO' => $DO,
            ':RN' => $RN,
            ':STATUS' => $STATUS
            ]);
        
        
   echo json_encode([ "status" => "success", "message" => "Student updated successfully", "data" => $data ]);
     
        
        
        
        
        
        
        
        
        
        ?>