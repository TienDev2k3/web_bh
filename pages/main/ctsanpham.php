<p>chi tiết sản phẩm</p>
<?php
$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc  WHERE tbl_sanpham.iddanhmuc=tbl_danhmuc.iddanhmuc AND tbl_sanpham.id_sanpham ='$_GET[id]'
 LIMIT 1";
 $query_chitiet=mysqli_query($mysqli,$sql_chitiet);
while($row_chitiet =mysqli_fetch_array($query_chitiet)){
?>

<div class="wrapper_chitiet">
    <div class="hinhanh_sanpham">
        <img width ="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']; ?>" alt="">
    </div>
    <form action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'];?>" method="POST">
    <div class="chitiet_sanpham">
    <p class="title_product"> Tên sản phẩm :<?php echo $row_chitiet['tensanpham']; ?> </p>
    <p class="price_product"> Giá :<?php echo number_format($row_chitiet['gia'], 0, ',', '.').'VNĐ';?></p>
    <p class="title_product"> Tên sản phẩm :<?php echo $row_chitiet['soluong']; ?> </p>
    <p class="title_product"> <?php echo $row_chitiet['tendanhmuc']; ?> </p>
   <p><input type="submit" name="themgiohang" value="Thêm vào giỏ hàng"></p>
    </div>
    </form>
</div>
<div class="tabs">
  <ul id="tabs-nav">
    <li><a href="#tab1">Thông số </a></li>
    <li><a href="#tab2">Nội dung chi tiết</a></li>
    <li><a href="#tab3">Hình ảnh sản phẩm</a></li>
  </ul> <!-- END tabs-nav -->
  <div id="tabs-content">
    <div id="tab1" class="tab-content">
    <?php echo $row_chitiet['tomtat']; ?>
    </div>
    <div id="tab2" class="tab-content">
    <?php echo $row_chitiet['noidung']; ?>
    </div>
    <div id="tab3" class="tab-content">
    <img width ="80%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']; ?>" alt="">
    </div>
  </div> <!-- END tabs-content -->
</div> <!-- END tabs -->
<?php
}

?>

