<?php
$sqllietke = "SELECT * FROM tbl_dmbaiviet ORDER BY thutu DESC";
$query_lietke_dmbaiviet = mysqli_query($mysqli, $sqllietke);
?>
<p>Liệt kê danh mục bài viết</p>
<table style="width:50%" border="1">
  <tr>
    <th>STT</th>
    <th>Tên danh mục bài viết</th>
    <th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_lietke_dmbaiviet)) {
      $i++;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['tendmbaiviet']; ?></td>
    <td>
        <a href="modules/quanlydanhmucbaiviet/xuly.php?iddmbaiviet=<?php echo $row['iddmbaiviet'] ?>">Xóa</a>
        | 
        <a href="?action=quanlydanhmucbaiviet&query=sua&iddmbaiviet=<?php echo $row['iddmbaiviet']?>">Sửa</a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>
