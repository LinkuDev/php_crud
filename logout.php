<?php
require_once 'session.php';

session_unset(); // Xóa tất cả các biến session

// Hủy phiên làm việc
session_destroy();

// Chuyển hướng về trang đăng nhập sau khi đăng xuất
header("Location: index.php");
exit;
?>