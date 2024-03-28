<?php

$connection = new mysqli("localhost", "root", "", "mytest");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve user 's data from the database
$sql = "SELECT * FROM user";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo "<center><table border='1' width='500'>";
    echo "<tr bgcolor='skybule'><th>ID</th><th>First Name</th><th>Last Name</th><th>Username</th><th>Password</th><th>action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
         echo "<td> <a href='update.php'><input type='submit' value='update' style='background-color:lightskyblue; color:white;''></a>&nbsp;&nbsp;&nbsp;<a href='delete.php'><input type='submit' value= 'delete' style='background-color:red; color:white;'></a></td>";
        echo "</tr>";
    }
    echo "</table></center>";
} else {
    echo "No records found";
}

$connection->close();
?>
