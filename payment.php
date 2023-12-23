<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Check if the user is not logged in
if (strlen($_SESSION['login']) == 0) {
  header('location: index.php');
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>

  <body>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>SakayLLC | Payment</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <!--Custome Style -->
    <link rel="stylesheet" href="assets/css/styles.css" type="text/css">
    <!--OWL Carousel slider-->
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
    <!--slick-slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!--bootstrap-slider -->
    <link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
    <!--FontAwesome Font Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- SWITCHER -->
    <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
      .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      }

      .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      }
    </style>
    </head>

    <body>

      <!-- Start Switcher -->
      <?php include('includes/colorswitcher.php'); ?>
      <!-- /Switcher -->

      <!--Header-->
      <?php include('includes/header.php'); ?>
      <!-- /Header -->
      <!--Page Header-->
      <section class="page-header profile_page">
        <div class="container">
          <div class="page-header_wrap">
            <div class="page-heading">
              <h1>Your Payment</h1>
            </div>
            <ul class="coustom-breadcrumb">
              <li><a href="#">Home</a></li>
              <li>Payment</li>
            </ul>
          </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
      </section>
      <!-- /Page Header-->

      <section class="user_profile inner_pages">
        <div class="container">


          <div class="row">
            <div class="col-md-3 col-sm-3">
              <?php include('includes/sidebarpayment.php'); ?>
              <div class="col-md-6 col-sm-8">
                <div class="profile_wrap">
                  <h5 class="uppercase underline">Payment</h5>

                  <?php
                  $useremail = $_SESSION['login'];
                  $sql = "SELECT * FROM tblusers WHERE EmailId = :useremail";
                  $query = $dbh->prepare($sql);
                  $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);

                  if ($query->rowCount() > 0) {
                    foreach ($results as $result) {
                      echo '
        <form action="payment-backend.php" method="post">
            <input type="hidden" name="id" value="' . $result->id . '" >
            <div class="form-group">
                <label class="control-label">Amount</label>
                <input class="form-control white_bg" name="amount" value="" id="amount" type="text" placeholder="Amount" required>
            </div>';

                      $useremail = $_SESSION['login'];
                      $sql = "SELECT t.VehicleId, v.VehiclesTitle,v.VehiclesBrand,t.FromDate,t.ToDate,v.id
                FROM tblusers AS tb 
                INNER JOIN tblbooking AS t ON t.userEmaiL = tb.EmailId 
                INNER JOIN tblvehicles AS v ON v.id = t.VehicleId 
                WHERE tb.EmailId = :useremail AND t.Status = 1
                LIMIT 0, 25;";

                      $query = $dbh->prepare($sql);
                      $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                      $query->execute();
                      $vehicleResults = $query->fetchAll(PDO::FETCH_OBJ);




                      echo '<div class="form-group">
        <input type="hidden" value="" name="fdate" id="fdate">
        <input type="hidden" value="" name="tdate" id="tDate">
        <input type="hidden" value="" name="vid" id="vid">
                <label class="control-label">Select Vehicle</label>
               
                <select id="vehicle" class="form-control white_bg" name="vehicle" aria-label="Default select example">';
                      foreach ($vehicleResults as $vehicleResult) {
                        echo '<option 
                  data-vehicle="' . $vehicleResult->VehiclesBrand . '"
                          value="' . $vehicleResult->VehiclesBrand . '" 
                          data-fdate="' . $vehicleResult->FromDate . '" 
                          data-tdate="' . $vehicleResult->ToDate . '"
                          data-vid="' . $vehicleResult->id . '"
                          >
                          ' . $vehicleResult->VehiclesTitle . '
                        </option>';
                      }
                      echo '</select>
            </div>
            <div class="form-group">
              <button type="submit" style="background-color:red;" class="btn btn-success">Pay</button>
        </div>

        </form>';
                    }
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
      </section>

      <!--/Profile-setting-->

      <!--Footer -->
      <?php include('includes/footer.php'); ?>
      <!-- /Footer-->

      <!--Back to top-->
      <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
      <!--/Back to top-->

      <!--Login-Form -->
      <?php include('includes/login.php'); ?>
      <!--/Login-Form -->

      <!--Register-Form -->
      <?php include('includes/registration.php'); ?>

      <!--/Register-Form -->

      <!--Forgot-password-Form -->
      <?php include('includes/forgotpassword.php'); ?>
      <?php include('includes/forgotpassword.php'); ?>
      <!--/Forgot-password-Form -->

      <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>

      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/interface.js"></script>
      <script src="payment.js"></script>
      <!--Switcher-->
      <script src="assets/switcher/js/switcher.js"></script>
      <!--bootstrap-slider-JS-->
      <script src="assets/js/bootstrap-slider.min.js"></script>
      <!--Slider-JS-->
      <script src="assets/js/slick.min.js"></script>
      <script src="assets/js/owl.carousel.min.js"></script>

    </body>

  </html>
<?php
}
?>