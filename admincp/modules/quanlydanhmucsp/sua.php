<?php
$sqllietke = "SELECT * FROM tbl_danhmuc where iddanhmuc=$_GET[iddanhmuc] LIMIT 1";
$query_sua_danhmucsp = mysqli_query($mysqli, $sqllietke);
?>
<P> Sửa danh mục sản phẩm</P>
<table border="1" width="50%" style="border-collapse :collapse;">
 <form action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>" method="POST" >
    <?php
    while($dong =mysqli_fetch_array($query_sua_danhmucsp)){
        ?>
 <tr>

    <th>Điền danh mục sản phẩm</th>
    <td><input type="text" value="<?php echo $dong['tendanhmuc']?>" name="tendanhmuc"></td>
  </tr>
  <tr>
    <td>thứ tực</td>
    <td><input type="text" value="<?php echo $dong['thutu']?> " name="thutu"></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" value="sua danh muc san pham" name="suadanhmuc"></td>
  </tr>
  <?php
    }?>
 </form>
</table> 