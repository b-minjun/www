<?php
session_start();
if(!isset($_SESSION['username'])) {
    echo "<script>
            alert('로그인 후 이용해주세요.');
            window.location.href = 'login.html';
        </script>";
    exit();
} else {
    $username = $_SESSION['username'];
    $conn = mysqli_connect("db", "minjun0328", "minjun0328@", "Cykor");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM articles";
    $result = $conn->query($sql);
    echo '<h1>글 보기 페이지 입니다</h1>
        <a href="index.html">메인 페이지</a><br>
        <a href="write.php">글 작성 페이지</a>
        <br><br>';
    while($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $writer = $row['writer'];
        $content = $row['content'];
        echo '제목 : ' . htmlspecialchars($title) . '<br> 
            작성자 : ' . htmlspecialchars($writer) . ' <br> 
            내용 : ' . nl2br(htmlspecialchars($content)) . '<br>
            <form action="update.php" method="post">
                <input type="hidden" name="title" value="' . htmlspecialchars($title) . '">
                <input type="hidden" name="writer" value="' . htmlspecialchars($writer) . '">
                <input type="hidden" name="content" value="' . htmlspecialchars($content) . '">
                <input type="submit" value="수정"></input>
            </form>
            <form action="delete.php" method="post">
                <input type="hidden" name="title" value="' . htmlspecialchars($title) . '">
                <input type="hidden" name="writer" value="' . htmlspecialchars($writer) . '">
                <input type="hidden" name="content" value="' . htmlspecialchars($content) . '">
                <input type="submit" value="삭제"></input>
            </form>
            <br>';
    }   
}
?>