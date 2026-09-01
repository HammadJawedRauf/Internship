
<!DOCTYPE html>
<html>
<body>

<h2>Update Student</h2>

<form id="updateForm" >

    <label>ID:</label>
    <input type="number" id="id" required><br><br>

    <label>Name:</label>
    <input type="text" id="name" required><br><br>

    <label>Email:</label>
    <input type="email" id="email" required><br><br>

    <label>Department:</label>
    <input type="text" id="department" required><br><br>

    <button type="submit">Update Student</button>

</form>

<script>

document.getElementById("updateForm").addEventListener("submit", function(e) {

    e.preventDefault();

    let id = document.getElementById("id").value;

    let data = {
        id: id,
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        department: document.getElementById("department").value
    };

    fetch("api.php?id=" + id, {
        method: "PUT",

        headers: {
            "Content-Type": "application/json"
        },

        body: JSON.stringify(data)
    })

    .then(response => response.json())
    .then(result => {
        console.log(result);
        alert(result.message);
    });

    .catch(error => {

        console.log(error);

        alert("Error: " + error);

    });

});

</script>
    <button type="submit"><a href="get.php">Get</a></button>

</body>
</html>