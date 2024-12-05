<?php
$sql_sua = "SELECT * FROM tbl_baiviet WHERE idbv = '" . $_GET['idbaiviet'] . "' LIMIT 1";
$query_sua = mysqli_query($mysqli, $sql_sua);
?>

<p>Sửa bài viết</p>
<table border="1" width="100%" style="border-collapse: collapse;">
  <?php while($row = mysqli_fetch_array($query_sua)) { ?>
    <form action="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['idbv']; ?>" method="post" enctype="multipart/form-data">
        <tr>
            <td>Tên bài viết</td>
            <td><input type="text" name="tenbaiviet" value="<?php echo $row['tenbaiviet']; ?>"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="hinhanh">
                <img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh']; ?>" width="100px">
            </td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td>
                <textarea rows="10" cols="70" name="tomtat"><?php echo $row['tomtat']; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td>
                <textarea rows="10" cols="70" name="noidung"><?php echo $row['noidung']; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Danh mục bài viết</td>
            <td>
                <select name="danhmuc">
                    <?php
                    $sql_danhmuc = "SELECT * FROM tbl_dmbaiviet ORDER BY iddmbaiviet DESC";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                        if ($row_danhmuc['iddmbaiviet'] == $row['iddmbaiviet']) {
                    ?>
                        <option selected value="<?php echo $row_danhmuc['iddmbaiviet']; ?>">
                            <?php echo $row_danhmuc['tendmbaiviet']; ?>
                        </option>
                    <?php
                        } else {
                    ?>
                        <option value="<?php echo $row_danhmuc['iddmbaiviet']; ?>">
                            <?php echo $row_danhmuc['tendmbaiviet']; ?>
                        </option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrang">
                    <option value="1" <?php if ($row['tinhtrang'] == 1) echo 'selected'; ?>>Kích hoạt</option>
                    <option value="0" <?php if ($row['tinhtrang'] == 0) echo 'selected'; ?>>Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Sửa bài viết" name="suabaiviet"></td>
        </tr>
    </form>
  <?php } ?>
</table>
