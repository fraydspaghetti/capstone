<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['send'])) {
  $name = $_POST['fullname'];
  $email = $_POST['email'];
  $contactno = $_POST['contactno'];
  $message = $_POST['message'];
  $sql = "INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':name', $name, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
  $query->bindParam(':message', $message, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    $msg = "Query Sent. We will contact you shortly";
  } else {
    $error = "Something went wrong. Please try again";
  }
}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>SakayLLC</title>
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

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
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

  <<!-- Color Switcher -->
    <?php include('includes/colorswitcher.php'); ?>
    <!-- /Switcher -->

    <!--Header-->
    <?php include('includes/header.php'); ?>
    <!-- /Header -->

    <!--Page Header-->
    <section class="page-header contactus_page">
      <div class="container">
        <div class="page-header_wrap">
          <div class="page-heading">
            <h1>Post a Ride</h1>
          </div>
          <ul class="coustom-breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Post a Ride</li>
          </ul>
        </div>
      </div>
      <!-- Dark Overlay-->
      <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <!--Contact-us-->
    <section class="contact_us section-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Got a Ride that you wanted to be rented? Let us know!</h3>
            <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
            <div class="contact_form gray-bg">
              <form method="post">
                <div class="form-group">
                  <label class="control-label">Full Name <span>*</span></label>
                  <input type="text" name="fullname" class="form-control white_bg" id="fullname" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Email Address <span>*</span></label>
                  <input type="email" name="email" class="form-control white_bg" id="emailaddress" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Phone Number <span>*</span></label>
                  <input type="text" name="contactno" class="form-control white_bg" id="phonenumber" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Message <span>*</span></label>
                  <textarea class="form-control white_bg" name="message" rows="4" required></textarea>
                </div>


                <div class="form-group">
                  <button class="btn" type="submit" name="send" type="submit">Send Message <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="page-title">Post A Vehicle</h2>

            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">Basic Info</div>
                  <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

                  <div class="panel-body">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Vehicle Title<span style="color:red">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" name="vehicletitle" class="form-control" required>
                        </div>
                        <label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
                        <div class="col-sm-4">
                          <select class="selectpicker" name="brandname" required>
                            <option value=""> Select </option>
                            <?php $ret = "select id,BrandName from tblbrands";
                            $query = $dbh->prepare($ret);
                            //$query->bindParam(':id',$id, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            if ($query->rowCount() > 0) {
                              foreach ($results as $result) {
                            ?>
                                <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?></option>
                            <?php }
                            } ?>

                          </select>
                        </div>
                      </div>

                      <div class="hr-dashed"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Vehicle Overview<span style="color:red">*</span></label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="vehicleoverview" rows="3" required></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Price Per Day(in PHP)<span style="color:red">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" name="priceperday" class="form-control" required>
                        </div>
                        <label class="col-sm-2 control-label">Select Fuel Type<span style="color:red">*</span></label>
                        <div class="col-sm-4">
                          <select class="selectpicker" name="fueltype" required>
                            <option value=""> Select </option>

                            <option value="Gasoline">Gasoline</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Electric">Electric</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="col-sm-2 control-label">Model Year<span style="color:red">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" name="modelyear" class="form-control" required>
                        </div>
                        <label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" name="seatingcapacity" class="form-control" required>
                        </div>
                      </div>
                      <div class="hr-dashed"></div>


                      <div class="form-group">
                        <div class="col-sm-12">
                          <h4><b>Upload Images</b></h4>
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="col-sm-4">
                          Vehicle photo<span style="color:red">*</span><input type="file" name="img1" required>
                        </div>
                        <div class="col-sm-4">
                          Vehicle photo<span style="color:red">*</span><input type="file" name="img2" required>
                        </div>
                        <div class="col-sm-4">
                          Vehicle Photo<span style="color:red">*</span><input type="file" name="img3" required>
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="col-sm-4">
                          Document Photo<span style="color:red">*</span><input type="file" name="img4" required>
                        </div>
                        <div class="col-sm-4">
                          Docomuent Photo<input type="file" name="img5">
                        </div>

                      </div>
                      <div class="col-sm-8 col-sm-offset-2">
                        <button class="btn btn-default" type="reset">Cancel</button>
                        <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
                      </div>
                  </div>




                  <div class="contact_detail">
                    <?php
                    $pagetype = $_GET['type'];
                    $sql = "SELECT Address,EmailId,ContactNo from tblcontactusinfo";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                      foreach ($results as $result) { ?>
                        <ul>
                          <li>
                            <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <div class="contact_info_m"><?php echo htmlentities($result->Address); ?></div>
                          </li>
                          <li>
                            <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            <div class="contact_info_m"><a href="tel:61-1234-567-90"><?php echo htmlentities($result->EmailId); ?></a></div>
                          </li>
                          <li>
                            <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                            <div class="contact_info_m"><a href="mailto:codeprojectsorg@gmail.com"><?php echo htmlentities($result->ContactNo); ?></a></div>
                          </li>
                        </ul>
                    <?php }
                    } ?>
                  </div>
                </div>
              </div>
            </div>
    </section>
    <!-- /Contact-us-->


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
    <!--/Forgot-password-Form -->

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/interface.js"></script>
    <!--Switcher-->
    <script src="assets/switcher/js/switcher.js"></script>
    <!--bootstrap-slider-JS-->
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <!--Slider-JS-->
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:55 GMT -->

</html>