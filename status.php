<?php 
require 'data.php';
$id = filter_input(INPUT_GET, 'STD_ID');
$status = filter_input(INPUT_GET, 'STATUS');

if ($id && $status) {

    $sql = "UPDATE student 
            SET STATUS = :status 
            WHERE STD_ID = :id";

    $stmt = $con->prepare($sql);

    $stmt->execute([
        ':status' => $status,
        ':id' => $id
    ]);
}

header("Location: display.php");
exit;
?>