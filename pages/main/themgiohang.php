<?php
session_start();
include('../../admincp/config/config.php');

// Hàm cộng số lượng sản phẩm (giới hạn tối đa là 10)
// if (isset($_GET['cong']) && $_GET['cong'] != '') {
//     $idsp = $_GET['cong'];
//     if (isset($_SESSION['cart'])) {
//         foreach ($_SESSION['cart'] as &$cart_item) {
//             if ($cart_item['id'] == $idsp) {
//                 if ($cart_item['soluong'] < 10) {
//                     $cart_item['soluong'] += 1;
//                 }
//                 break;
//             }
//         }
//     }
//     header('Location: ../../index.php?quanly=giohang'); // Quay lại trang giỏ hàng
//     exit;
// }
if (isset($_GET['cong'])) {
    $id = $_GET['cong']; // Lấy ID sản phẩm cần tăng
    $product = array();

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] == $id && $cart_item['soluong'] < 10) {
            $cart_item['soluong']++; // Tăng số lượng lên 1 nếu chưa đạt giới hạn
        }
        $product[] = array(
            'tensanpham' => $cart_item['tensanpham'],
            'id' => $cart_item['id'],
            'soluong' => $cart_item['soluong'],
            'gia' => $cart_item['gia'],
            'hinhanh' => $cart_item['hinhanh'],
            'masp' => $cart_item['masp']
        );
    }

    $_SESSION['cart'] = $product; // Cập nhật lại giỏ hàng
    // header('Location: ../../index.php?quanly=giohang');
    // exit;
}
// Hàm trừ số lượng sản phẩm (giới hạn tối thiểu là 1)
if (isset($_GET['tru'])) {
    $id = $_GET['tru']; // Lấy ID sản phẩm cần giảm
    $product = array();

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] == $id && $cart_item['soluong'] > 1) {
            $cart_item['soluong']--; // Giảm số lượng xuống 1 nếu lớn hơn 1
        }
        $product[] = array(
            'tensanpham' => $cart_item['tensanpham'],
            'id' => $cart_item['id'],
            'soluong' => $cart_item['soluong'],
            'gia' => $cart_item['gia'],
            'hinhanh' => $cart_item['hinhanh'],
            'masp' => $cart_item['masp']
        );
    }

    $_SESSION['cart'] = $product; // Cập nhật lại giỏ hàng
    // header('Location: ../../index.php?quanly=giohang');
    // exit;
}

// (Phần xử lý thêm sản phẩm hoặc xóa tất cả đã có sẵn ở đây)

//Xóa một sản phẩm trong giỏ hàng
// if (isset($_GET['xoa']) && $_GET['xoa'] != '') {
//     $idsp = $_GET['xoa']; // Lấy ID sản phẩm từ URL
//     if (isset($_SESSION['cart'])) {
//         foreach ($_SESSION['cart'] as $key => $cart_item) {
//             if ($cart_item['id'] == $idsp) {
//                 unset($_SESSION['cart'][$key]); // Xóa sản phẩm khỏi giỏ hàng
//             }
//         }

//         $_SESSION['cart'] = array_values($_SESSION['cart']);
//     }
//     header('Location: ../../index.php?quanly=giohang'); // Quay lại trang giỏ hàng
//     exit;
// }
if (isset($_SESSION['cart']) && isset($_GET['xoa'])) {
    $id = $_GET['xoa']; // Lấy ID sản phẩm từ URL
    $product = array();
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'],
                'id' => $cart_item['id'],
                'soluong' => $cart_item['soluong'],
                'gia' => $cart_item['gia'],
                'hinhanh' => $cart_item['hinhanh'],
                'masp' => $cart_item['masp']
            );
        }
        $_SESSION['cart'] = $product;
        header('Location: ../../index.php?quanly=giohang');
    }
}

if (isset($_GET['xoatatca'])) {
    unset($_SESSION['cart']); // Xóa toàn bộ giỏ hàng
    header('Location: ../../index.php?quanly=giohang');
    exit;
}

// Lấy ID sản phẩm từ URL
$idsp = isset($_GET['idsanpham']) ? $_GET['idsanpham'] : '';
if ($idsp) {
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$idsp' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        // Tạo sản phẩm mới
        $new_product = array(
            array(
                'tensanpham' => $row['tensanpham'],
                'id' => $row['id_sanpham'],
                'soluong' => 1,
                'gia' => $row['gia'],
                'hinhanh' => $row['hinhanh'],
                'masp' => $row['masp']
            )
        );

        if (isset($_SESSION['cart'])) {
            $found = false;
            $cart = $_SESSION['cart'];

            foreach ($cart as &$cart_item) {
                if ($cart_item['id'] == $idsp) {
                    $cart_item['soluong'] += 1; // Tăng số lượng nếu sản phẩm đã tồn tại
                    $found = true;
                }
            }

            if (!$found) {
                // Nếu sản phẩm chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
                $cart = array_merge($cart, $new_product);
            }

            $_SESSION['cart'] = $cart;
        } else {
            // Tạo giỏ hàng mới
            $_SESSION['cart'] = $new_product;
        }
    }
}

// Quay lại trang giỏ hàng
header('Location: ../../index.php?quanly=giohang');
exit;
?>