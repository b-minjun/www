<?php
session_start();
$title = $_POST['title'];
$writer = $_POST['writer'];
$content = $_POST['content'];
if(!isset($_SESSION['username'])) {
    echo "<script>
            alert('로그인 후 이용해주세요.');
            window.location.href = 'login.html';
        </script>";
    exit();
}
if($_SESSION['username'] == $writer) {
    $conn = mysqli_connect("localhost", "root", "", "Cykor");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "DELETE FROM articles WHERE title='$title' AND writer='$writer' AND content='$content'";
    $conn->query($sql);
    echo "<script>
            alert('글이 삭제되었습니다.');
            window.location.href = 'show_articles.php';
        </script>";
} else {
    echo "<script>
            alert('" . $_SESSION['username'] . " 님이 작성한 글이 아닙니다.');
            window.location.href = 'show_articles.php';
        </script>";
    exit();
}
?>