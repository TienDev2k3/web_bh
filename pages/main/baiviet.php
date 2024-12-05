<p>Chi tiết bài viết</p>
<?php
$sql_chitiet = "SELECT * FROM tbl_baiviet WHERE idbv = '$_GET[id]' LIMIT 1";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);


if ($row_bv = mysqli_fetch_array($query_chitiet)) {
    ?>
    <h3>Bài viết: <span><?php echo $row_bv['tenbaiviet']; ?></span></h3>
    <div class="wrapper_chitiet">

        <div class="hinhanh_baiviet" style="text-align: center;">
            <img width="50%" src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh']; ?>" alt="Hình ảnh bài viết">
        </div>
        <div class="noidung_baiviet">
            <p><strong>Tóm tắt:</strong> <?php echo $row_bv['tomtat']; ?></p>
            <p><strong>Nội dung:</strong></p>
            <p><?php echo nl2br($row_bv['noidung']); ?></p>
        </div>
    </div>
    <?php
} else {
    echo "<p>Bài viết không tồn tại hoặc đã bị xóa.</p>";
}
?>
