<?php
if (isset($_SESSION['dangky'])) {
    echo 'xin chào :' . $_SESSION['dangky'];
}

?>
<div class="arrow-steps clearfix">
    <div class="step current"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
    <div class="step"> <span><a href="index.php?quanly=vanchuyen">Vận chuyển </a></span> </div>
    <div class="step"> <span> <a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a></span> </div>
    <div class="step"> <span><a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a></span> </div>
</div>
<table style="width: 100%; border-collapse: collapse;" border="1">
    <tr>
        <th>Id</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Thành tiền</th>
        <th>Quản lý</th>
    </tr>
    <?php
    // Kiểm tra nếu có sản phẩm trong giỏ hàng
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $i = 0;
        $tongtien = 0;

        foreach ($_SESSION['cart'] as $cart_item) {
            $i++;
            $thanhtien = $cart_item['gia'] * $cart_item['soluong']; // Thành tiền cho từng sản phẩm
            $tongtien += $thanhtien; // Tổng tiền toàn bộ giỏ hàng
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $cart_item['masp']; ?></td>
                <td><?php echo $cart_item['tensanpham']; ?></td>
                <td>
                    <img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="100"
                        alt="Hình ảnh sản phẩm">
                </td>
                <td text-align="center">
                    <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i
                            class="fa-solid fa-plus"></i></a>
                    <?php echo $cart_item['soluong']; ?>
                    <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i
                            class="fa-solid fa-minus"></i></a>
                </td>
                <td><?php echo number_format($cart_item['gia'], 0, ',', '.') . ' VNĐ'; ?></td>
                <td><?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ'; ?></td>
                <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan="6" style="text-align: left; font-weight: bold;">Tổng tiền:
                <?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ'; ?>
            </td>
            <td colspan="2" style="text-align: right; font-weight: bold;">
                <?php
                if (isset($_SESSION['dangky'])) {
                    ?>
                    <a href="pages/main/thanhtoan.php" class="btn">Đặt hàng</a>
                    <br>

                    <?php
                } else {
                    ?>
                    <a href="index.php?quanly=dangky" class="btn">Đăng ký để Đặt hàng</a>
                    <?php
                }
                ?>

                <br>
                <br>
                <a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a>
            </td>

        </tr>

        <?php

    } else {
        ?>
        <tr>
            <td colspan="7" style="text-align: center;">Hiện tại giỏ hàng trống</td>
        </tr>
        <?php
    }
    ?>
</table>