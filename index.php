<?php
    $conn = new mysqli('localhost', 'root', '', 'Cykor');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    echo "<br>";
    $sql = "SELECT * FROM `users`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "username: " . $row["username"]. "    password: " . $row["password"]."<br>";
        }
    } else {
        echo "0 results";
    }
?>

