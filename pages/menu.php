<?php
$sql_danhmuc = "SELECT * from tbl_danhmuc ORDER BY iddanhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);

?>
<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
  unset($_SESSION['dangky']);
}
?>
 <div class="menu">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Web Phụ Kiện</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
          </li>
          <!-- Dropdown menu danh mục -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Danh mục sản phẩm
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) { ?>
                <li>
                  <a class="dropdown-item"
                    href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['iddanhmuc']; ?>">
                    <?php echo $row_danhmuc['tendanhmuc']; ?>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?quanly=giohang">Giỏ hàng</a>
          </li>
          <?php if (isset($_SESSION['dangky'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?dangxuat=1">Đăng xuất</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?quanly=thaydoimatkhau">Thay đổi mật khẩu</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?quanly=dangky">Đăng ký</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?quanly=tintuc">Tin tức</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?quanly=lienhe">Liên hệ</a>
          </li>
        </ul>
        <form class="d-flex" action="index.php?quanly=timkiem" method="POST">
          <input  class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search"
            name="tukhoa">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  
</nav>
</div>
<!-- <div class="menu">
      <ul class="list-menu">
      <li><a href="index.php">Trang chủ </a></li>
      <?php
      while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
        ?>
        <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['iddanhmuc']; ?>">
           <?php echo $row_danhmuc['tendanhmuc']; ?></a></li>     
 
  <?php
      }
      ?>
      <li><a href="index.php?quanly=giohang">Giỏ hàng</a> </li>
      <?php
      if (isset($_SESSION['dangky'])) {
        ?>
        <li><a href="index.php?dangxuat=1">Đăng xuất</a> </li>
        <li><a href="index.php?quanly=thaydoimatkhau">Thay đổi mật khẩu</a> </li>
      <?php
      } else {
        ?>
  <li><a href="index.php?quanly=dangky">Đăng ký</a> </li>
        <?php
      }
      ?>
      
      <li><a href="index.php?quanly=tintuc">Tin tức</a> </li>
      <li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
     <form action="index.php?quanly=timkiem" method="POST">
        <li>
          <input type="text" placeholder="Tim kiem san pham" name="tukhoa">
       </li>
        <li><input type="submit" value="tim kiem" name="timkiem"></li>
     </form>
      </ul>
     
    </div> -->