<?php

$sql_bv = "SELECT * FROM tbl_dmbaiviet WHERE iddmbaiviet='$_GET[idbv]'";
$query_bv = mysqli_query($mysqli, $sql_bv);
$row_bv = mysqli_fetch_array($query_bv);

echo "<h3>Danh mục bài viết: " . $row_bv['tendmbaiviet'] . "</h3>";
$sql_dm = "SELECT * FROM tbl_baiviet WHERE iddmbaiviet='$_GET[idbv]' ORDER BY idbv DESC";
$query_dm= mysqli_query($mysqli, $sql_dm);
?>
<div class="row">
    <?php
    while ($row_bv = mysqli_fetch_array($query_dm)) {
        ?>
        <div class="col-md-3 col-sm-12 col-sm-12">
            <a href="index.php?quanly=baiviet&id=<?php echo $row_bv['idbv']; ?>">
                <img width="100%" src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh']; ?>" alt="">
                <p class="title_bv"><?php echo $row_bv['tenbaiviet']; ?></p>
                <p class="tomtat"><?php echo $row_bv['tomtat']; ?></p>
            </a>
        </div>
        <?php
    }
    ?>
</div>


