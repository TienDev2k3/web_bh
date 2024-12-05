<?php
$sqllietke = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sqllietke);
?>
<p>Liệt kê danh mục sản phẩm</p>
<table style="width:50%" border="1">
  <tr>
    <th>STT</th>
    <th>Tên danh mục</th>
    <th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
      $i++;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['tendanhmuc']; ?></td>
    <td>
        <a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['iddanhmuc'] ?>">Xóa</a>
        | 
        <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['iddanhmuc']?>">Sửa</a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>
