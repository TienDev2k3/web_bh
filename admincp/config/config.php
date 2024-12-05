<?php
$hostname="localhost";
$username ="root";
$pass="";
$db_name ="web_bh";
$mysqli =new mysqli($hostname,$username,$pass,$db_name);
if ($mysqli->connect_errno) {
    echo "Kết nối lỗi !";
    exit();
}


?>