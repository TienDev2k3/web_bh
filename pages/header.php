
<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel" >

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
  <div class="carousel-item active" data-bs-interval="3000">
      <img src="images/1.gif" alt="Chicago" class="d-block" style="width:100%">
      <div class="carousel-caption">
        <h3>Uy tín</h3>
      </div> 
    </div>
    <div class="carousel-item" data-bs-interval="3000">
      <img src="images/1.gif" alt="Chicago" class="d-block" style="width:100%">
      <div class="carousel-caption">
        <h3>Chất lượng</h3>
      </div> 
    </div>
    <div class="carousel-item" data-bs-interval="3000">
      <img src="images/banner2.png" alt="New York" class="d-block" style="width:100%">
      <div class="carousel-caption">
        <h3>Giao hàng nhanh chóng</h3>
      </div>  
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
<style>
  .carousel{
    margin-bottom:5px ;
  }
  .carousel-item{
    height: 400px;
  }
  .carousel-caption{
      color: red;
  }
  carousel-item img{
    object-fit: cover;
  }
</style>