<?php
$fullname = $email = $msg = '';

if (!empty($_POST)) {  
    $email = getPost('email');
    $pwd = getPost('password');
    $pwd = getSecurityMD5($pwd); // na hoa 


    $sql = "SELECT * FROM User WHERE email = '$email' AND password = '$pwd'";
    $userExist = executeResult($sql, true);

    if ($userExist == null) {
        $msg = 'Sai email hoặc mật khẩu';
    } else {
        // Đăng nhập thành công
        $token = getSecurityMD5($userExist['email'] . time());
        setcookie('token', $token, time() + 7 * 24 * 60 * 60, '/');

        $created_at = date('Y-m-d H:i:s');


        $_SESSION['user'] = $userExist;


        $userId = $userExist['id'];
        $sql = "INSERT INTO Tokens (user_id, token, created_at) VALUES ('$userId', '$token', '$created_at')";
        execute($sql);


        if ($userExist['role_id'] == 1) {
            header('Location: ../../../../../duan1/admin');
        } elseif ($userExist['role_id'] == 2) {
            header('Location: ../../../../../duan1/index.php');
        } else {
            header('Location: ../unknown_role.php');
        }
        die();
    }
}
