<?php
if(isset($_POST['dangky'])){
    $error = '';
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql="SELECT * FROM khachhang WHERE email='".$email."' and matkhau ='".$password."' LIMIT 1";
    $row =mysqli_query($mysqli,$sql);
    $count =mysqli_num_rows($row);
    if($count>0){
        $customer = mysqli_fetch_assoc($row);
        $_SESSION['dangky'] = $customer['tenkhachhang'];
        $_SESSION['email'] = $customer['email'];
        $_SESSION['idkhachhang']=$customer['idkhachhang'];
       // header('Location: index.php?quanly=giohang');
        exit;
    }else{
    $error = "Bạn đã nhập sai email hoặc mật khẩu.";
    }
}
?>
<h3>Đăng nhập Khách hàng</h3>
        <form action="" method="post" >
            <div class="form-group">
                <label for="username">Tài khoản</label>
                <input type="text"  name="email" placeholder="Nhập Email" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu " required>
            </div>
            <button type="submit" class="btn" name="dangky">Đăng nhập</button>
            <!-- Hiển thị thông báo lỗi -->
            <?php if (!empty($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>