<?php

// Truy vấn liệt kê bài viết và danh mục
$sqllietke = "SELECT * FROM tbl_baiviet, tbl_dmbaiviet 
               WHERE tbl_baiviet.iddmbaiviet = tbl_dmbaiviet.iddmbaiviet 
               ORDER BY idbv DESC";
$query_lietke_baiviet = mysqli_query($mysqli, $sqllietke);
?>
<p>Liệt kê bài viết</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
    <th>STT</th>
    <th>Tên bài viết</th>
    <th>Hình ảnh</th>
    <th>Danh mục</th>
    <th>Tóm tắt</th>
    <th>Nội dung</th>
    <th>Tình trạng</th>
    <th>Quản lý</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_lietke_baiviet)) {
      $i++;
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['tenbaiviet']; ?></td>
    <td>
      <img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh']; ?>" width="100px">
    </td>
    <td><?php echo $row['tendmbaiviet']; ?></td>
    <td><?php echo $row['tomtat']; ?></td>
    <td><?php echo $row['noidung']; ?></td>
    <td>
      <?php echo ($row['tinhtrang'] == 1) ? 'Kích hoạt' : 'Ẩn'; ?>
    </td>
    <td>
      <a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['idbv'] ?>">Xóa</a> |
      <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['idbv'] ?>">Sửa</a>
    </td>
  </tr>
  <?php
  }
  ?>
</table>
