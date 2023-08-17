<?php
// session_module.php
session_start();
// Hàm để tạo session sau khi đăng nhập thành công
function create_session($userInfo) {
    // Bắt đầu session

    // Lưu thông tin người dùng vào session
    $_SESSION['user_id'] = $userInfo['id'];
    $_SESSION['user_email'] = $userInfo['email'];
    $_SESSION['user_name'] = $userInfo['name'];
    $_SESSION['user_password'] = $userInfo['pass'];
    $_SESSION['user_phone'] = $userInfo['sdt'];
    $_SESSION['user_gender'] = $userInfo['gender'];
    $_SESSION['user_birth'] = $userInfo['birth'];
    

    // Các thông tin khác có thể lưu trong session tùy theo yêu cầu

    return true; // Trả về true nếu tạo session thành công
}
?>
