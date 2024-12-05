<?php

if (isset($_POST['tukhoa'])) {
    $tukhoa = $_POST['tukhoa'];
} else {
    $tukhoa = '';
}

// Lọc từ khóa để tránh SQL Injection
$tukhoa = mysqli_real_escape_string($mysqli, $tukhoa);
$sql_pro = "SELECT tbl_sanpham.*, tbl_danhmuc.tendanhmuc 
            FROM tbl_sanpham 
            LEFT JOIN tbl_danhmuc ON tbl_sanpham.iddanhmuc = tbl_danhmuc.iddanhmuc
            WHERE tbl_sanpham.tensanpham LIKE '%$tukhoa%'";

$query_pro = mysqli_query($mysqli, $sql_pro);
?>
<h3>Từ khóa tìm kiếm: <?php echo $tukhoa; ?></h3>
<ul class="product_list">
<?php
if (mysqli_num_rows($query_pro) > 0) {
    while ($row_pro = mysqli_fetch_array($query_pro)) {
        ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']; ?>">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']; ?>" alt="<?php echo $row_pro['tensanpham']; ?>">
                <p class="title_product">Tên sản phẩm: <?php echo $row_pro['tensanpham']; ?></p>
                <p class="price_product">Giá: <?php echo number_format($row_pro['gia'], 0, ',', '.'); ?> VNĐ</p>
                <p class="cate_product">Danh mục: <?php echo $row_pro['tendanhmuc']; ?></p>
            </a>
        </li>
        <?php
    }
} else {
    echo '<p>Không tìm thấy sản phẩm nào phù hợp với từ khóa "' . $tukhoa . '"</p>';
}
?>
</ul>
