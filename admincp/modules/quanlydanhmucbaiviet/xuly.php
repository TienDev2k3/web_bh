<?php
include("../../config/config.php");
$tendmbaiviet=$_POST['tendmbaiviet'];
$thutu=$_POST['thutu'];
if(isset($_POST['themdanhmucbaiviet'])){
    $sqlthem ="INSERT INTO tbl_dmbaiviet(tendmbaiviet,thutu) VALUE('".$tendmbaiviet."','".$thutu."')";
    mysqli_query($mysqli, $sqlthem);
    header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');

}elseif(isset($_POST['suadmbaiviet'])){
    $sqlsua ="UPDATE tbl_dmbaiviet SET tendmbaiviet='".$tendmbaiviet."',thutu='".$thutu."' WHERE iddmbaiviet ='$_GET[iddmbaiviet]'";
    mysqli_query($mysqli, $sqlsua);
    header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
}
else  {
    $id = $_GET['iddmbaiviet'];
    $sqlxoa = "DELETE FROM tbl_dmbaiviet WHERE iddmbaiviet = '".$id."' ";
    mysqli_query($mysqli, $sqlxoa);

    header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
}

?>