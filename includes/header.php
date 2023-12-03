
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
      
        
          </ul>
        </div>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
        <h1 style="font-size:40px"> <a href="index.php"> SakayLLC Vehicle Renting </a> </h1>
        <br><?php   if(strlen($_SESSION['login'])==0)
	{
?>
<div class="login_btn"> <a href="#loginform" style ="margin-left:1150px"class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a></div>
<?php }
else{
echo  " ";
 } ?>
 <br>
          <li><a href="index.php">Home</a>    </li>
          <li><a href="page.php?type=aboutus">About Us</a></li>
          <li><a href="page.php?type=faqs">FAQs</a></li>
          <li><a href="contact-us.php">Contact Us</a></li>
          <li><a href="payment.php">Payment</a></li>
          <li class="" style="margin-left:400px"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
          
<?php
$email=$_SESSION['login'];
$sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->FullName); }}?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
           <?php if($_SESSION['login']){?>
            <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="change-password.php">Update Password</a></li>
            <li><a href="my-booking.php">My Booking</a></li>
            <li><a href="post-feedbacks.php">Post a Feedbacks</a></li>
          <li><a href="my-feedbacks.php">My Feedbacks</a></li>
            <li><a id="logout" href="logout.php">Log Out</a></li>
            <?php } else { ?>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
              <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Update Password</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Booking</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Post a Feedbacl </a></li>
          <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Feedback</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Log Out</a></li>
            <?php } ?>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end -->
