<?php
session_start();
if(!isset($_SESSION['username'])) {
    echo "<script>
            alert('로그인 후 이용해주세요.');
            window.location.href = 'login.html';
        </script>";
        exit();
    exit();
} else {
    $username = $_SESSION['username'];
    $conn = mysqli_connect("localhost", "root", "", "Cykor");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM articles";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        echo "제목 : {$row['title']}<br> 
            작성자 : {$row['writer']}<br> 
            내용 : {$row['content']}<br><br>";
    }   
}
?>