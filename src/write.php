<?php
session_start();
if(!isset($_SESSION['username'])) {
    echo "<script>
            alert('로그인 후 이용해주세요.');
            window.location.href = 'login.html';
        </script>";
    exit();
} else if(!isset($_POST['title']) && !isset($_POST['content'])) {
    echo '<h1>글 작성 페이지 입니다</h1>
        <a href="index.html">메인 페이지</a><br>
        <a href="show_articles.php">글 보기 페이지</a><br><br>
        <form action="" method="post">
            <input type="text" name="title" placeholder="제목을 입력하세요"><br><br>
            <textarea name="content" rows="5" cols="30" placeholder="내용을 입력하세요"></textarea><br><br>
            <input type="submit" value="작성">
        </form>';
} else {
    $title = $_POST['title'];
    $writer = $_SESSION['username'];
    $content = $_POST['content'];
    $conn = mysqli_connect("db", "minjun0328", "minjun0328@", "Cykor");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "INSERT INTO articles (title, writer, content) VALUES ('$title', '$writer', '$content')";
    $conn->query($sql);
    echo "<script>
            alert('글이 작성되었습니다.');
            window.location.href = 'show_articles.php';
        </script>";
    exit();
}
?>