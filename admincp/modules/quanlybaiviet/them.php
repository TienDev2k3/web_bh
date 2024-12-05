<P> Thêm sản phẩm</P>
<table border="1" width="100%" style="border-collapse :collapse;">
 <form action="modules/quanlybaiviet/xuly.php" method="post" enctype="multipart/form-data">
 <tr>
    <td>Tên bài viết</td>
    <td><input type="text" name="tenbaiviet"></td>
  </tr>
  
  
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh"></td>
  </tr>
  <tr>
    <td>Tóm tắt</td>
    <td> <textarea rows="10" cols="70" name="tomtat"></textarea></td>
  </tr>
  <tr>
    <td>Nội dung</td>
    <td> <textarea rows="10" cols="70" name="noidung"></textarea></td>
  </tr>
  <tr>
    <td>Danh mục sản phẩm</td>
    <td>
      <select name="danhmuc" id="">
        <?php
        $sql_danhmuc ="SELECT * from tbl_dmbaiviet ORDER BY iddmbaiviet DESC";
        $query_danhmuc =mysqli_query($mysqli,$sql_danhmuc);
        while($row_danhmuc =mysqli_fetch_array($query_danhmuc)){
        ?>
          <option value="<?php echo $row_danhmuc['iddmbaiviet'];?>"><?php echo $row_danhmuc['tendmbaiviet']?></option>
          <?php 
          }
          ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>tình trạng</td>
    <td>
      <select name="tinhtrang" id="">
          <option value="1">Kích hoạt</option>
          <option value="0">Ẩn</option>
      </select>
    </td>
  </tr>
  
  <tr>
    <td colspan="2"><input type="submit" value="thêm bài viết" name="thembaiviet"></td>
  </tr>-
 </form>
</table>