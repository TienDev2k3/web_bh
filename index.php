<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css\fontawesome-free-6.7.0-web/css/all.css">
  <title>Web phụ kiện </title>
  <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
  <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container">

    <?php
    session_start();
    include("admincp/config/config.php");
    include("pages/header.php");
    include("pages/menu.php");
    include("pages/main.php");
    include("pages/footer.php");
    ?>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script>
    $('#tabs-nav li:first-child').addClass('active');
    $('.tab-content').hide();
    $('.tab-content:first').show();

    // Click function
    $('#tabs-nav li').click(function () {
      $('#tabs-nav li').removeClass('active');
      $(this).addClass('active');
      $('.tab-content').hide();

      var activeTab = $(this).find('a').attr('href');
      $(activeTab).fadeIn();
      return false;
    });
  </script>
</body>

</html>