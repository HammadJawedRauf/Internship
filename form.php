<!DOCTYPE html>
<html>
<body>

<h2>Add Student</h2>

<form method="POST" action="api.php">

    <label>ID:</label>
    <input type="number" name="id"><br><br>

    <label>Name:</label>
    <input type="text" name="name"><br><br>

    <label>Email:</label>
    <input type="email" name="email"><br><br>

    <label>Department:</label>
    <input type="text" name="department"><br><br>

    <button type="submit">Add Student</button>

</form>

    <button type="submit"><a href="updateform.php">Update</a></button>
<button onclick="deleteStudent()">Delete Student</button>

<script>

function deleteStudent() {

    let id = 2;

    fetch("api.php?id=" + id, {
        method: "DELETE"
    })

    .then(response => response.json())

    .then(result => {
        console.log(result);
        alert(result.message);
    })

    .catch(error => {
        console.log(error);
    });

}

</script>
</body>
</html>