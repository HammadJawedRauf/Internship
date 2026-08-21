<?php

$servername = "localhost";
$username = "root";
$dbname = "store_employee";
$password = "";

try {

    $con = new PDO(
        "mysql:host=$servername;dbname=$dbname",
        $username,
        $password
    );

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully!";

} catch (PDOException $e) {

    echo "Connection Failed: " . $e->getMessage();

}


// Form submit hone par
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $gender = $_POST['gender'];

    try {

        $sql = "INSERT INTO employee
                (EMP_NAME, EMP_DESIGNATION, EMP_GENDER)
                VALUES (:name, :designation, :gender)";

        $stmt = $con->prepare($sql);

        $stmt->execute([
            ':name' => $name,
            ':designation' => $designation,
            ':gender' => $gender
        ]);

        echo "<br>Employee added successfully!";

    } catch (PDOException $e) {

        echo "<br>Insert Error: " . $e->getMessage();

    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Employee Form</title>
</head>

<body>

<h2>Employee Form</h2>

<form method="POST">

    <label>Name:</label>
    <input type="text" name="name" required>

    <br><br>

    <label>Designation:</label>
    <input type="text" name="designation" required>

    <br><br>

    <label>Gender:</label>

    <input type="radio" name="gender" value="Male" required>
    <label>Male</label>

    <input type="radio" name="gender" value="Female">
    <label>Female</label>

    <br><br>

    <button type="submit" name="submit">
        Save Employee
    </button>

</form>

</body>

</html>