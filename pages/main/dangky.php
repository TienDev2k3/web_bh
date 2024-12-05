<?php
if (isset($_POST['submit'])) {
    $tenkh = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $conf_password =$_POST['conf_password']; 
    if ($password !== $conf_password) {
        $error = "Mật khẩu xác nhận không khớp!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Kiểm tra định dạng email
        $error = "Email không hợp lệ!";
    } elseif (!preg_match("/^[0-9]{10,11}$/", $phone)) { // Kiểm tra số điện thoại hợp lệ (10 chữ số)
        $error = "Số điện thoại không hợp lệ!";
    } else {
        // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        $password = md5($password);

        // Thực hiện truy vấn vào cơ sở dữ liệu
        $sqldangky = mysqli_query($mysqli, "INSERT INTO khachhang(tenkhachhang,email,diachi,matkhau,dienthoai) 
        VALUES ('$tenkh','$email','$address','$password','$phone')");

        if ($sqldangky) {
            $success = "Đăng ký thành công!";
            $_SESSION['idkhachhang']=mysqli_insert_id($mysqli);
            $_SESSION['dangky']=$tenkh;
            $_SESSION['email']=$email;
           // header('location:index.php?quanly=giohang');
        } else {
            $error = "Đã xảy ra lỗi, vui lòng thử lại!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký Thành viên</title>
    <style>
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h3>Đăng ký Thành viên</h3>
        
        <?php if(isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php elseif(isset($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="name">Tên đầy đủ</label>
                <input type="text" id="name" name="name" placeholder="Nhập tên của bạn" required value="<?php echo isset($tenkh) ? $tenkh : ''; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Nhập email" required value="<?php echo isset($email) ? $email : ''; ?>">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <textarea id="address" name="address" placeholder="Nhập địa chỉ" rows="3" required><?php echo isset($address) ? $address : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Điện thoại</label>
                <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại" required value="<?php echo isset($phone) ? $phone : ''; ?>">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="form-group">
                <label for="conf_password">Nhập lại mật khẩu</label>
                <input type="password" id="conf_password" name="conf_password" placeholder="Nhập lại mật khẩu" required>
            </div>
            <button type="submit" name="submit" class="btn">Đăng ký</button>
            <br>
            <p><a href="index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a></p>
        </form>
    </div>
</body>
</html>
