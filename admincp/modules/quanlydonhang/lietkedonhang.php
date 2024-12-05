<?php
$sqllietke_dh = "SELECT * FROM tbl_giohang,khachhang WHERE tbl_giohang.idkhachhang = 
khachhang.idkhachhang ORDER BY tbl_giohang.idgiohang DESC";
$query_lietke_dh = mysqli_query($mysqli, $sqllietke_dh);
?>
<p>Liệt kê danh mục sản phẩm</p>
<table style="width:100%" border="1">
  <t>
    <th>STT</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Tình trạng</th>
    <th>Quản lý</th>
  </tr>
  <?php
  $i = 0;

  while ($row = mysqli_fetch_array($query_lietke_dh)) {
      $i++;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['magh']; ?></td>
    <td><?php echo $row['tenkhachhang']; ?></td>
    <td><?php echo $row['diachi']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['dienthoai']; ?></td>
    <td>
      <?php 
      if($row['trangthai']==1){
        echo '<a href="modules/quanlydonhang/xuly.php?trangthai=0&code='.$row['magh'].'">Đơn hàng mới </a>';
      }
      else {
        echo "đã xem";
      }
      ?>
    </td>
  
    <td>
    <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['magh'] ?>">Xem đơn hàng</a> 
    </td>
  </tr>
  <?php
  }
  ?>
</table>
