<?php
$sql_sua = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '" . $_GET['idsanpham'] . "' LIMIT 1";
$query_sua = mysqli_query($mysqli, $sql_sua);
?>

<p>Sửa sản phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse;">
  <?php while($row=mysqli_fetch_array($query_sua)){
    ?>
    <form action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>" method="post" enctype="multipart/form-data">
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="tensp" value="<?php echo $row['tensanpham']; ?>"></td>
        </tr>
        <tr>
            <td>Mã sp</td>
            <td><input type="text" name="masp" value="<?php echo $row['masp']; ?>"></td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><input type="text" name="giasp" value="<?php echo $row['gia']; ?>"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" name="soluong" value="<?php echo $row['soluong']; ?>"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="hinhanh">
                <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh']; ?>" width="100px">
            </td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td>
                <textarea rows="10" cols="70" name="tomtat"><?php echo $row['tomtat']; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td>
                <textarea rows="10" cols="70" name="noidung"><?php echo $row['noidung']; ?></textarea>
            </td>
        </tr>
        <tr>
    <td>Danh mục sản phẩm</td>
    <td>
      <select name="danhmuc" id="">
        <?php
        $sql_danhmuc ="SELECT * from tbl_danhmuc ORDER BY iddanhmuc DESC";
        $query_danhmuc =mysqli_query($mysqli,$sql_danhmuc);
        while($row_danhmuc =mysqli_fetch_array($query_danhmuc)){
            if($row_danhmuc['iddanhmuc']==$row['iddanhmuc']){
            
        ?>
          <option selected value="<?php echo $row_danhmuc['iddanhmuc'];?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
          <?php 
            }
          else {
            ?>
           
             <option  value="<?php echo $row_danhmuc['iddanhmuc'];?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
             <?php
          }
          }
          ?>
      </select>
    </td>
  </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="tinhtrang">
                    <option value="1" <?php if ($row['tinhtrang'] == 1) echo 'selected'; ?>>Kích hoạt</option>
                    <option value="0" <?php if ($row['tinhtrang'] == 0) echo 'selected'; ?>>Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Sửa sản phẩm" name="suasanpham"></td>
        </tr>
    </form>
    <?php
  }
  ?>
</table>
