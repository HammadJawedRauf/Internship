<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $json = file_get_contents("api.json");
    $students = json_decode($json, true);

    $id = $_GET["id"] ?? null;

    if ($id !== null) {

        foreach ($students as $student) {

            if ((string)$student["id"] === (string)$id) {

                echo json_encode([
                    "status" => "success",
                    "data" => $student
                ]);

                exit;
            }
        }

        echo json_encode([
            "status" => "error",
            "message" => "Student not found"
        ]);

    } else {

        echo json_encode([
            "status" => "success",
            "data" => $students
        ]);
    }
}





?>