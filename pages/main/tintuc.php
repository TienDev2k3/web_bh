<?php
$sql_bv = "SELECT * FROM tbl_baiviet WHERE tinhtrang=1 ORDER BY idbv";
$query_bv = mysqli_query($mysqli, $sql_bv);


?>
<h4>Tin tức mới nhất
    
</h4>
<div class="row">
    <?php
    while ($row_bv = mysqli_fetch_array($query_bv)) {
        ?>
        <div class="col-md-4 col-sm-12 col-xs-12">
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


