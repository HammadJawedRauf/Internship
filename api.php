<?php

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newStudent = [
        "id" => $_POST["id"],
        "name" => $_POST["name"],
        "email" => $_POST["email"],
        "department" => $_POST["department"]
    ];

    $json = file_get_contents("api.json");
    $students = json_decode($json, true);

    $students[] = $newStudent;

    file_put_contents(
        "api.json",
        json_encode($students, JSON_PRETTY_PRINT)
    );

    echo json_encode([
        "status" => "success",
        "message" => "Student added successfully",
        "data" => $newStudent
    ]);
}


elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {

    // URL se ID lena
    $id = $_GET["id"] ?? null;

    // JSON body lena
    $input = file_get_contents("php://input");

    // JSON ko PHP array banana
    $updatedStudent = json_decode($input, true);

    // JSON file read karna
    $json = file_get_contents("api.json");
    $students = json_decode($json, true);

    $found = false;

    foreach ($students as $key => $student) {

        if ($student["id"] == $id) {

            // ID ko same rakhna
            $updatedStudent["id"] = $student["id"];

            // Student update
            $students[$key] = $updatedStudent;

            $found = true;

            break;
        }
    }

    if ($found) {

        // JSON file mein save
        file_put_contents(
            "api.json",
            json_encode($students, JSON_PRETTY_PRINT)
        );

        echo json_encode([
            "status" => "success",
            "message" => "Student updated successfully",
            "data" => $updatedStudent
        ]);

    } else {

        echo json_encode([
            "status" => "error",
            "message" => "Student not found"
        ]);
    }
}
elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {

    // URL se ID lena
    $id = $_GET["id"] ?? null;

    // JSON file read karna
    $json = file_get_contents($file);
    $students = json_decode($json, true);

    $found = false;

    foreach ($students as $key => $student) {

        if ((string)$student["id"] === (string)$id) {

            // Student delete
            unset($students[$key]);

            $found = true;

            break;
        }
    }

    if ($found) {

        // Array ko dobara proper indexing dena
        $students = array_values($students);

        // JSON file mein save
        file_put_contents(
            $file,
            json_encode($students, JSON_PRETTY_PRINT)
        );

        echo json_encode([
            "status" => "success",
            "message" => "Student deleted successfully"
        ]);

    } 



else {

    echo json_encode([
        "status" => "error",
        "message" => "Only POST and PUT requests are allowed"
    ]);
}

?>