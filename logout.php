<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "<script>
            alert('" . $_SESSION['username'] . " has been logged out.');
            window.location.href = 'login.html';
        </script>";
    session_destroy();
} else {
    echo "<script>
            alert('You are not logged in.');
            window.location.href = 'login.html';
        </script>";
}
?>