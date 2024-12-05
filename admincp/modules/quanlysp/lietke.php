<?php

$sqllietke = "SELECT * FROM tbl_sanpham,tbl_danhmuc where tbl_sanpham.iddanhmuc=tbl_danhmuc.iddanhmuc ORDER BY id_sanpham DESC";
$query_lietke_sanpham = mysqli_query($mysqli, $sqllietke);
?>
<p>Liệt kê sản phẩm</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
    <th>STT</th>
    <th>Tên sản phẩm</th>
    <th>Mã sản phẩm</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Danh mục</th>
    
    <th>Tóm tắt</th>
    <th>Nội dung</th>
    <th>Hình ảnh</th>
    <th>Tình trạng</th>
    <th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_lietke_sanpham)) {
      $i++;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['tensanpham']; ?></td>
    <td><?php echo $row['masp']; ?></td>
    <td><?php echo number_format($row['gia'],0,',','.'); ?> đ</td> 
    <!-- number_format($row['gia'],0,',','.'); -->
    <td><?php echo $row['soluong']; ?></td>
    <td><?php echo $row['tendanhmuc']; ?></td>
    <td><?php echo $row['tomtat']; ?></td>
    <td><?php echo $row['noidung']; ?></td>
    <td>
      <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh']; ?>" width="100px">
    </td>
    <td>
      <?php echo ($row['tinhtrang'] == 1) ? 'Kích hoạt' : 'Ẩn'; ?>
    </td>
    <td>
      <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a> |
      <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>
