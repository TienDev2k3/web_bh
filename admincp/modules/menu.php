<?php
if (isset($_GET['action']) && $_GET['action'] == 'dangxuat') {
    session_start();
    unset($_SESSION['dangnhap']);
    header('Location: login.php');
    exit();
}
?>
<ul class="admincp-menu-list">
    <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a></li>
    <li><a href="index.php?action=quanlysanpham&query=them">Quản lý sản phẩm</a></li>
    <li><a href="index.php?action=quanlydanhmucbaiviet&query=them">Quản lý danh mục bài viết</a></li>
    <li><a href="index.php?action=quanlybaiviet&query=them">Quản lý bài viết</a></li>
    <li><a href="index.php?action=quanlydonhang&query=lietkedonhang">Quản lý đơn hàng</a></li>
    <li>
    <a href="index.php?action=dangxuat">Đăng xuất: 
        <?php echo isset($_SESSION['dangnhap']) ? $_SESSION['dangnhap'] : ''; ?>
    </a>
</li>

</ul>