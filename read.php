<?php
require 'db.php';

$sql = "SELECT id, name, email, age FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Users List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"]. "</td>
                            <td>" . $row["name"]. "</td>
                            <td>" . $row["email"]. "</td>
                            <td>" . $row["age"]. "</td>
                            <td>
                                <a href='update.php?id=" . $row["id"]. "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete.php?id=" . $row["id"]. "' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>0 results</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    <a href="create.php" class="btn btn-primary">Create New User</a>
</div>

</body>
</html>
