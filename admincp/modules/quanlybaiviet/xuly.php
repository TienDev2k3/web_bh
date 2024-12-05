<?php
include("../../config/config.php");

$tenbaiviet = isset($_POST['tenbaiviet']) ? $_POST['tenbaiviet'] : '';
$tomtat = isset($_POST['tomtat']) ? $_POST['tomtat'] : '';
$noidung = isset($_POST['noidung']) ? $_POST['noidung'] : '';
$tinhtrang = isset($_POST['tinhtrang']) ? $_POST['tinhtrang'] : '';
$iddmbaiviet = isset($_POST['danhmuc']) ? $_POST['danhmuc'] : '';
$hinhanh = isset($_FILES['hinhanh']['name']) ? $_FILES['hinhanh']['name'] : '';
$hinhanh_tmp = isset($_FILES['hinhanh']['tmp_name']) ? $_FILES['hinhanh']['tmp_name'] : '';
$hinhanh = time() . '_' . $hinhanh;
$idbaiviet =isset($_GET['idbaiviet']) ? $_GET['idbaiviet'] :null;
if (isset($_POST['thembaiviet'])) {
    if (!empty($hinhanh)) {
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
    }

    $sql_them = "INSERT INTO tbl_baiviet (tenbaiviet, hinhanh, tomtat, noidung, tinhtrang, iddmbaiviet) 
                 VALUES ('$tenbaiviet', '$hinhanh', '$tomtat', '$noidung', '$tinhtrang', '$iddmbaiviet')";
    $query_them = mysqli_query($mysqli, $sql_them);

    if ($query_them) {
        header("Location: ../../index.php?action=quanlybaiviet&query=them");
    } else {
        echo "Lỗi khi thêm bài viết: " . mysqli_error($mysqli);
    }
}

if (isset($_POST['suabaiviet'])) {

    if ($idbaiviet === null) {
        die("ID bài viết không hợp lệ.");
    }

    if (!empty($_FILES['hinhanh']['name'])) {
        // Xử lý nếu có hình ảnh mới
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);

        // Lấy hình ảnh cũ để xóa
        $sql_layhinhanh = "SELECT hinhanh FROM tbl_baiviet WHERE idbv = '$idbaiviet'";
        $query_layhinhanh = mysqli_query($mysqli, $sql_layhinhanh);
        $row = mysqli_fetch_array($query_layhinhanh);

        if (!empty($row['hinhanh']) && file_exists('uploads/' . $row['hinhanh'])) {
            unlink('uploads/' . $row['hinhanh']); // Xóa hình ảnh cũ
        }

        // Cập nhật bài viết với hình ảnh mới
        $sql_sua = "UPDATE tbl_baiviet 
                    SET tenbaiviet = '$tenbaiviet', 
                        hinhanh = '$hinhanh', 
                        tomtat = '$tomtat', 
                        noidung = '$noidung', 
                        tinhtrang = '$tinhtrang', 
                        iddmbaiviet = '$iddmbaiviet'
                    WHERE idbv = '$idbaiviet'";
    } else {
        // Cập nhật bài viết không thay đổi hình ảnh
        $sql_sua = "UPDATE tbl_baiviet 
                    SET tenbaiviet = '$tenbaiviet', 
                        tomtat = '$tomtat', 
                        noidung = '$noidung', 
                        tinhtrang = '$tinhtrang', 
                        iddmbaiviet = '$iddmbaiviet'
                    WHERE idbv = '$idbaiviet'";
    }
    if (mysqli_query($mysqli, $sql_sua)) {
        header("Location: ../../index.php?action=quanlybaiviet&query=them");
        exit;
    } else {
        die("Lỗi khi sửa bài viết: " . mysqli_error($mysqli));
    }
}


if (isset($_GET['idbaiviet'])) {
    $idbaiviet = $_GET['idbaiviet'];

    $sql_layhinhanh = "SELECT hinhanh FROM tbl_baiviet WHERE idbv = '$idbaiviet'";
    $query_layhinhanh = mysqli_query($mysqli, $sql_layhinhanh);
    $row = mysqli_fetch_array($query_layhinhanh);

    if (!empty($row['hinhanh']) && file_exists('uploads/' . $row['hinhanh'])) {
        unlink('uploads/' . $row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_baiviet WHERE idbv = '$idbaiviet'";
    if (mysqli_query($mysqli, $sql_xoa)) {
        header("Location: ../../index.php?action=quanlybaiviet&query=them");
        exit();
    } else {
        echo "Lỗi khi xóa bài viết: " . mysqli_error($mysqli);
    }
}
?>
