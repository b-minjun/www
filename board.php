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
        $title = $row['title'];
        $writer = $row['writer'];
        $content = $row['content'];
        echo '제목 : ' . htmlspecialchars($title) . '<br> 
            작성자 : ' . htmlspecialchars($writer) . ' <br> 
            내용 : ' . nl2br(htmlspecialchars($content)) . '<br>
            <a href="update.php?title=' . urlencode($title) . '&writer=' . urlencode($writer) . '&content=' . urlencode($content) . '"><button>수정</button></a>
            <a href="delete.php?title=' . urlencode($title) . '&writer=' . urlencode($writer) . '&content=' . urlencode($content) . '"><button>삭제</button></a>    
        ';
        echo '<br><br>';
    }   
}
?>