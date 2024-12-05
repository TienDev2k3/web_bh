<!-- 
        <ul class="list-slidebar">
        <h4 >Danh mục sản phẩm</h4>
        <?php
        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY iddanhmuc DESC";
          $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
          ?>
           <?php
          while($row =mysqli_fetch_array($query_danhmuc)){
            ?>
            <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['iddanhmuc'];?>"><?php echo $row['tendanhmuc'];?></a></li>
            
            <?php
          }
          ?>
        </ul>
        <ul class="list-slidebar">
        <h4 >Danh mục bài viết</h4>
        <?php
        $sql_danhmuc_bv = "SELECT * FROM tbl_dmbaiviet ORDER BY iddmbaiviet DESC";
          $query_danhmuc_bv = mysqli_query($mysqli, $sql_danhmuc_bv);
          ?>
           <?php
          while($row =mysqli_fetch_array($query_danhmuc_bv)){
            ?>
            <li><a href="index.php?quanly=danhmucbaiviet&idbv=<?php echo $row['iddmbaiviet'];?>"><?php echo $row['tendmbaiviet'];?></a></li>
            
            <?php
          }
          ?>
        </ul> -->



        <div class="list-group">
    <h4 class="list-group-item active bg-dark">Danh mục sản phẩm</h4>
    <?php
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY iddanhmuc DESC";
    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
    while ($row = mysqli_fetch_array($query_danhmuc)) {
        ?>
        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['iddanhmuc']; ?>" class="list-group-item">
            <?php echo $row['tendanhmuc']; ?>
        </a>
    <?php
    }
    ?>
</div>

<div class="list-group mt-4">
    <h4 class="list-group-item active bg-dark">Danh mục bài viết</h4>
    <?php
    $sql_danhmuc_bv = "SELECT * FROM tbl_dmbaiviet ORDER BY iddmbaiviet DESC";
    $query_danhmuc_bv = mysqli_query($mysqli, $sql_danhmuc_bv);
    while ($row = mysqli_fetch_array($query_danhmuc_bv)) {
        ?>
        <a href="index.php?quanly=danhmucbaiviet&idbv=<?php echo $row['iddmbaiviet']; ?>" class="list-group-item">
            <?php echo $row['tendmbaiviet']; ?>
        </a>
    <?php
    }
    ?>
</div>
