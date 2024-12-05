<?php
session_start();
include('config/config.php');
if(isset($_POST['dangnhap'])){
    $error = '';
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql="SELECT * FROM tbl_admin WHERE username='".$username."' and password ='".$password."' LIMIT 1";
$row =mysqli_query($mysqli,$sql);
$count =mysqli_num_rows($row);
if($count>0){
    $_SESSION['dangnhap']=$username;
    header('location:index.php');
}else{
    $error = "Bạn đã nhập sai tên đăng nhập hoặc mật khẩu.";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" href="css/dangnhap.css">
    
</head>
<body>
    <div class="wrapper">
        <h3>Đăng nhập Admin</h3>
        <form action="" method="post" autocomplete="off">
            <div class="form-group">
                <label for="username">Tài khoản</label>
                <input type="text" id="username" name="username" placeholder="Nhập tài khoản" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit" class="btn" name="dangnhap">Đăng nhập</button>
            <!-- Hiển thị thông báo lỗi -->
            <?php if (!empty($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>

