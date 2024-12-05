<p> xem đơn hàng</p><?php
$code =$_GET['code'];
$sqllietke_dh = "SELECT * FROM tbl_ctdonhang, tbl_sanpham 
WHERE tbl_ctdonhang.idsanpham = tbl_sanpham.id_sanpham 
AND tbl_ctdonhang.madh = '$code' 
ORDER BY tbl_ctdonhang.idctdonhang DESC";

$query_lietke_dh = mysqli_query($mysqli, $sqllietke_dh);
?>
<p>Liệt kê danh mục sản phẩm</p>
<table style="width:100%" border="1">
  <t>
    <th>STT</th>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Đơn giá </th>
    <th>Thành tiền</th>
  </tr>
  <?php
  $i = 0;
  $tongtien=0;
  while ($row = mysqli_fetch_array($query_lietke_dh)) {
      $i++;
      
  $thanhtien =$row['gia']*$row['soluongmua'];
  $tongtien +=$thanhtien;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['madh']; ?></td>
    <td><?php echo $row['tensanpham']; ?></td>
    <td><?php echo $row['soluongmua']; ?></td>
    <td><?php echo number_format($row['gia'],0,',','.')." vnđ"; ?></td>
    <td><?php echo number_format($thanhtien,0,',','.')." vnđ"; ?></td>
  </tr>
  <?php
  }
  ?>
 <tr>
  
  <td colspan="6">Tổng tiền : <?php echo number_format($tongtien,0,',','.') ." vnđ"; ?></td>
</tr>

 
</table>
