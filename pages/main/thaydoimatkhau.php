<?php
if (isset($_POST['doimk'])) {
    $error = '';
    $success = '';

    $email = $_POST['email'];
    $matkhaucu = md5($_POST['password_cu']);
    $matkhaumoi = md5($_POST['password_moi']);
    $matkhau_rp = md5($_POST['password_rp']);

    $sql = "SELECT * FROM khachhang WHERE email='$email' AND matkhau='$matkhaucu' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        if ($matkhaumoi === $matkhau_rp) {
            // Thực hiện cập nhật mật khẩu
            $sql_update = "UPDATE khachhang SET matkhau='$matkhaumoi' WHERE email='$email'";
            if (mysqli_query($mysqli, $sql_update)) {
                $success = "Mật khẩu đã được thay đổi thành công.";
            } else {
                $error = "Có lỗi xảy ra trong quá trình thay đổi mật khẩu.";
            }
        } else {
            $error = "Mật khẩu mới và mật khẩu nhập lại không khớp.";
        }
    } else {
        $error = "Tài khoản hoặc mật khẩu cũ không đúng.";
    }
}
?>
<h3>Đổi mật khẩu</h3>
<form action="" method="post" >
    <div class="form-group">
        <label for="email">Tài khoản</label>
        <input type="text" id="email" name="email" placeholder="Nhập email" required>
    </div>
    <div class="form-group">
        <label for="password_cu">Mật khẩu cũ</label>
        <input type="password" id="password_cu" name="password_cu" placeholder="Nhập mật khẩu cũ" required>
    </div>
    <div class="form-group">
        <label for="password_moi">Mật khẩu mới</label>
        <input type="password" id="password_moi" name="password_moi" placeholder="Nhập mật khẩu mới" required>
    </div>
    <div class="form-group">
        <label for="password_rp">Nhập lại mật khẩu</label>
        <input type="password" id="password_rp" name="password_rp" placeholder="Nhập lại mật khẩu mới" required>
    </div>
    <button type="submit" class="btn" name="doimk" value="Đổi mật khẩu">Đổi mật khẩu</button>
    <a href="index.php" class="btn">Quay lại</a>
    <!-- Hiển thị thông báo -->
    <?php if (!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php endif; ?>
</form>
