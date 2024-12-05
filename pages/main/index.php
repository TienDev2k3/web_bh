<?php
if (isset($_GET['trang'])) {
  $page = $_GET['trang'];
} else {
  $page = '1';
}
if ($page == '' || $page == '1') {
  $begin = 0;
} else {
  $begin = ($page * 8) - 8;
}
$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc  WHERE tbl_sanpham.iddanhmuc=tbl_danhmuc.iddanhmuc 
ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,8";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>
<h3>Sản phẩm mới nhất</h3>
<div class="row">
  <?php
  while ($row_pro = mysqli_fetch_array($query_pro)) {
    ?>
    <div class="col-md-3">
      <a  href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']; ?>">
        <img class="img img-responsive" width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']; ?>" alt="">
        <p class="title_product"> Tên sản phẩm :<?php echo $row_pro['tensanpham']; ?> </p>
        <p class="price_product"> Giá :<?php echo number_format($row_pro['gia'], 0, ',', '.') . 'VNĐ'; ?></p>
        <p class="cate_product"> <?php echo $row_pro['tendanhmuc']; ?> </p>
      </a>
    </div>
    <?php
  }
  ?>
</div>


<ul class="pagination">
  <!-- <p>Trang hiện tại : <?php echo $page; ?></p><br> -->
  <?php
  $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham ");
  $row_count = mysqli_num_rows($sql_trang);
  $trang = ceil($row_count / 8);
  ?>
  <?php
  for ($i = 1; $i <= $trang; $i++) {
    ?>

    <li>
      <a href="index.php?trang=<?php echo $i; ?>" class="<?php echo $i == $page ? 'active' : ''; ?>">
        <?php echo $i; ?></a>
    </li>
    <?php
  }
  ?>

</ul>