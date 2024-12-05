<?php
include("../../config/config.php");
if(isset($_GET['trangthai'])&&isset($_GET['code'])){
$status = $_GET['trangthai'];
$code =$_GET['code'];
$sql ="UPDATE tbl_giohang SET trangthai='$status' WHERE magh ='$code'";
$query =mysqli_query($mysqli,$sql);
header('Location: ../../index.php?action=quanlydonhang&query=lietkedonhang');

}
?>