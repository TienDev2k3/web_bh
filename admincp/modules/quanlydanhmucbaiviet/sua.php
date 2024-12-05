<?php
$sqllietke = "SELECT * FROM tbl_dmbaiviet where iddmbaiviet=$_GET[iddmbaiviet] LIMIT 1";
$query_sua_danhmucbv = mysqli_query($mysqli, $sqllietke);
?>
<P> Sửa danh mục bài viết</P>
<table border="1" width="50%" style="border-collapse :collapse;">
 <form action="modules/quanlydanhmucbaiviet/xuly.php?iddmbaiviet=<?php echo $_GET['iddmbaiviet']?>" method="POST" >
    <?php
    while($dong =mysqli_fetch_array($query_sua_danhmucbv)){
        ?>
 <tr>

    <th>Điền danh mục bài viết</th>
    <td><input type="text" value="<?php echo $dong['tendmbaiviet']?>" name="tendmbaiviet"></td>
  </tr>
  <tr>
    <td>thứ tực</td>
    <td><input type="text" value="<?php echo $dong['thutu']?> " name="thutu"></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" value="Sửa danh mục bài viết" name="suadmbaiviet"></td>
  </tr>
  <?php
    }?>
 </form>
</table> 