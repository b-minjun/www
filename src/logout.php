<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "<script>
            alert('" . $_SESSION['username'] . " 님, 로그아웃 되었습니다.');
            window.location.href = 'login.html';
        </script>";
    unset($_SESSION['username']);
    session_destroy();
    exit();
} else {
    echo "<script>
            alert('로그인 되지 않았습니다.');
            window.location.href = 'login.html';
        </script>";
    exit();
}
?>