<P> Thêm sản phẩm</P>
<table border="1" width="100%" style="border-collapse :collapse;">
 <form action="modules/quanlysp/xuly.php" method="post" enctype="multipart/form-data">
 <tr>
    <td>Tên sản phẩm</td>
    <td><input type="text" name="tensp"></td>
  </tr>
  <tr>
    <td>Mã sp</td>
    <td><input type="text" name="masp"></td>
  </tr>
  <tr>
    <td>Giá sản phẩm</td>
    <td><input type="text" name="giasp"></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input type="text" name="soluong"></td>
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
        $sql_danhmuc ="SELECT * from tbl_danhmuc ORDER BY iddanhmuc DESC";
        $query_danhmuc =mysqli_query($mysqli,$sql_danhmuc);
        while($row_danhmuc =mysqli_fetch_array($query_danhmuc)){
        ?>
          <option value="<?php echo $row_danhmuc['iddanhmuc'];?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
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
    <td colspan="2"><input type="submit" value="thêm  sản phẩm" name="themsanpham"></td>
  </tr>-
 </form>
</table>