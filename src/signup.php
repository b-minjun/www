<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$password_check = $_POST['password_check'];
$conn = mysqli_connect("localhost", "minjun0328", "minjun0328@", "Cykor");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows == 1) { echo "<script>
        alert('중복된 아이디 입니다.');
        window.location.href = 'signup.html';
    </script>";
    exit();}
if ($password != $password_check) {
    echo "<script>
        alert('비밀번호가 일치하지 않습니다.');
        window.location.href = 'signup.html';
    </script>";
    exit();
}
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
$conn->query($sql);
echo "<script>
        alert('회원가입이 완료되었습니다.');
        window.location.href = 'login.html';
    </script>";
    exit();
?>