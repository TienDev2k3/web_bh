<?php
include("../../config/config.php");

$tensp = isset($_POST['tensp']) ? $_POST['tensp'] : '';
$masp = isset($_POST['masp']) ? $_POST['masp'] : '';
$giasp = isset($_POST['giasp']) ? $_POST['giasp'] : '';
$soluong = isset($_POST['soluong']) ? $_POST['soluong'] : '';
$tomtat = isset($_POST['tomtat']) ? $_POST['tomtat'] : '';
$noidung = isset($_POST['noidung']) ? $_POST['noidung'] : '';
$tinhtrang = isset($_POST['tinhtrang']) ? $_POST['tinhtrang'] : '';
$hinhanh = isset($_FILES['hinhanh']['name']) ? $_FILES['hinhanh']['name'] : '';
$iddanhmuc =$_POST['danhmuc'] ? $_POST['danhmuc'] : '';
$hinhanh_tmp = isset($_FILES['hinhanh']['tmp_name']) ? $_FILES['hinhanh']['tmp_name'] : '';
$hinhanh = time().'_'.$hinhanh; 
$id_sanpham = isset($_GET['idsanpham']) ? $_GET['idsanpham'] : null;


if (isset($_POST['themsanpham'])) {
   
        if ($tensp && $masp && $hinhanh) {
            move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
            $sql_them = "INSERT INTO tbl_sanpham (tensanpham, masp, gia, soluong, hinhanh, tomtat, noidung, tinhtrang,iddanhmuc) 
                         VALUES ('$tensp', '$masp', '$giasp', '$soluong', '$hinhanh', '$tomtat', '$noidung', '$tinhtrang','$iddanhmuc')";
            mysqli_query($mysqli, $sql_them) or die("Lỗi SQL: " . mysqli_error($mysqli));
            header("Location: ../../index.php?action=quanlysanpham&query=them");
            exit();}
   
}
elseif (isset($_POST['suasanpham'])) {
  
   
    if ($id_sanpham === null) {
        die("ID sản phẩm không hợp lệ.");
    }



    if (!empty($_FILES['hinhanh']['name'])) {
        
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
        $sql_sua = "UPDATE tbl_sanpham 
                    SET tensanpham = '$tensp', 
                        masp = '$masp', 
                        gia = '$giasp', 
                        soluong = '$soluong', 
                        hinhanh = '$hinhanh', 
                        tomtat = '$tomtat', 
                        noidung = '$noidung', 
                        tinhtrang = '$tinhtrang',
                        iddanhmuc='$iddanhmuc'
                    WHERE id_sanpham = '$id_sanpham'";
    } else {

        $sql_sua = "UPDATE tbl_sanpham 
                    SET tensanpham = '$tensp', 
                        masp = '$masp', 
                        gia = '$giasp', 
                        soluong = '$soluong', 
                        tomtat = '$tomtat', 
                        noidung = '$noidung', 
                        tinhtrang = '$tinhtrang', 
                        iddanhmuc='$iddanhmuc'
                    WHERE id_sanpham = '$id_sanpham'";
    }

  
    if (mysqli_query($mysqli, $sql_sua)) {
  
        header("Location: ../../index.php?action=quanlysanpham&query=them");
        exit;
    } else {
        die("Lỗi khi cập nhật sản phẩm: " . mysqli_error($mysqli));
    }
}

 else {
        $id = $_GET['idsanpham'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1" ;
        if (isset($_GET['idsanpham'])) {
            $id = $_GET['idsanpham'];
        
            // Lấy thông tin hình ảnh để xóa file
            $sql_layhinhanh = "SELECT hinhanh FROM tbl_sanpham WHERE id_sanpham = '$id'";
            $query_layhinhanh = mysqli_query($mysqli, $sql_layhinhanh);
            $row = mysqli_fetch_array($query_layhinhanh);
        
            if (!empty($row['hinhanh']) && file_exists('uploads/' . $row['hinhanh'])) {
                unlink('uploads/' . $row['hinhanh']); // Xóa file hình ảnh
            }
        
            // Xóa sản phẩm khỏi CSDL
            $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham = '$id'";
            if (mysqli_query($mysqli, $sql_xoa)) {
                header("Location: ../../index.php?action=quanlysanpham&query=them");
                exit(); // Kết thúc script sau khi chuyển hướng
            } else {
                echo "Lỗi khi xóa sản phẩm: " . mysqli_error($mysqli);
            }
        } else {
            echo "Không tìm thấy ID sản phẩm để xóa.";
        }
}
?>