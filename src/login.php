<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
if($_SESSION['username'] != $username){ 
    $_SESSION['username'] = $username;
    $conn = mysqli_connect("localhost", "minjun0328", "minjun0328@", "Cykor");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "<script>
                alert('안녕하세요, " . $row['username'] . "님!');
                window.location.href = 'index.html';
            </script>";
        exit();
    } else {
        echo "<script>
                alert('아이디 또는 비밀번호가 잘못되었습니다.');
                window.location.href = 'login.html';
            </script>";
        exit();
    }
} else {
    echo "<script>
            alert('" . $_SESSION['username'] . " 님, 이 계정으로 이미 로그인 되어 있습니다.');
            window.location.href = 'index.html';
        </script>";
    exit();
}

?>