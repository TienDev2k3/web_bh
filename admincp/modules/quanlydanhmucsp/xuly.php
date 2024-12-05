<?php
include("../../config/config.php");
$tenloaisp=$_POST['tendanhmuc'];
$thutu=$_POST['thutu'];
if(isset($_POST['themdanhmuc'])){
    $sqlthem ="INSERT INTO tbl_danhmuc(tendanhmuc,thutu) VALUE('".$tenloaisp."','".$thutu."')";
    mysqli_query($mysqli, $sqlthem);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}elseif(isset($_POST['suadanhmuc'])){
    $sqlsua ="UPDATE tbl_danhmuc SET tendanhmuc='".$tenloaisp."',thutu='".$thutu."' WHERE iddanhmuc ='$_GET[iddanhmuc]'";
    mysqli_query($mysqli, $sqlsua);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}
else  {
    $id = $_GET['iddanhmuc'];

    $sqlxoa = "DELETE FROM tbl_danhmuc WHERE iddanhmuc = '".$id."' ";
    mysqli_query($mysqli, $sqlxoa);

    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}

?>