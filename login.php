<?php
session_start();
if(!isset($_SESSION['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $username;
    $conn = mysqli_connect("localhost", "root", "", "Cykor");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "<script>
                alert('Welcome " . $row['username'] . "!');
                window.location.href = 'index.html';
            </script>";
    } else {
        echo "<script>
                alert('Invalid username or password');
                window.location.href = 'login.html';
            </script>";
    }
} else {
    session_start();
    echo "<script>
            alert('You are already logged in as " . $_SESSION['username'] . ".');
            window.location.href = 'index.html';
        </script>";
}

?>