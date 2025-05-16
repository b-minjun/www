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
    if(!isset($_POST['newtitle']) && !isset($_POST['newcontent'])) {
        echo '<h1>글 수정 페이지 입니다</h1>
            <a href="index.html">메인 페이지</a><br>
            <a href="show_articles.php">글 보기 페이지</a><br>
            <form action="" method="post">
                    <input type="text" name="newtitle" placeholder="제목을 입력하세요"><br><br>
                    <textarea name="newcontent" rows="5" cols="30" placeholder="내용을 입력하세요"></textarea><br><br>
                    <input type="hidden" name="title" value="' . $title . '">
                    <input type="hidden" name="writer" value="' . $writer . '">
                    <input type="hidden" name="content" value="' . $content . '">
                    <input type="submit" value="수정">
            </form>
    ';
    } else {
        $newtitle = $_POST['newtitle'];
        $newcontent = $_POST['newcontent'];
        $conn = mysqli_connect("db", "minjun0328", "minjun0328@", "Cykor");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "UPDATE articles SET title='$newtitle', content='$newcontent' WHERE title='$title' AND writer='$writer' AND content='$content'";
        $conn->query($sql);
        echo "<script>
                alert('글이 수정되었습니다.');
                window.location.href = 'show_articles.php';
            </script>";
        exit();
    }
} else {
    echo "<script>
            alert('" . $_SESSION['username'] . " 님이 작성한 글이 아닙니다.');
            window.location.href = 'show_articles.php';
        </script>";
    exit();
}
?>