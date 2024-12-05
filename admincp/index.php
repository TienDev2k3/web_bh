<?php
session_start();
if(!isset($_SESSION['dangnhap'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleadmincp.css">
   
    <script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <title>Admincp</title>
</head>
<body>
    <h3 class="admincp_title">Welcome to admin served</h3>
    <div class="wrapper">
    <?php
    include("config/config.php");
    include("modules/header.php");
    include("modules/menu.php");
    include("modules/main.php");
    include("modules/footer.php");
    ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="css/ckeditor/ckeditor.js"></script>
    <script> 
     CKEDITOR.replace('tomtat');
        CKEDITOR.replace('noidung');

    </script>
</body>
</html>