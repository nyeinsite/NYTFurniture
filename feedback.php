<?php
session_start();
$con=mysqli_connect("localhost","root","","furniture");
if(isset($_REQUEST['destroy'])){
session_unset();
header("location:home.php");
}
include "autoid.php";
if(isset($_REQUEST['feedback'])){
$fid=autoID("feedback","FeedbackID","FE_",10,"FE_0000000001");
$cid=$_SESSION['userid'];
$subj=$_REQUEST['txtsubject'];
$cont=$_REQUEST['txtcontent'];
$query="INSERT INTO feedback values ('$fid','$cid','$subj','$cont')";
mysqli_query($con,$query);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration Form
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/slider.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
   
    <link rel="stylesheet"  type="text/css" href="css/feedback.css">
    
  </head>
  <body>
  <nav class="navbar navbar-expand-lg  navbar navbar-dark" style="background-color:#b8b8b1;">
      <!--navbar-inverse bg-success-->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
        </span>
      </button>
      <a  class="navbar-brand" href="#">
        <img src="img/logo.png" width="100" height="50" alt="" loading="lazy">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a style="color:black;font-family: "system-ui";" class="nav-link" href="home.php">Home 
              <span class="sr-only">(current)
              </span>
            </a>
          </li>
          <li class="nav-item active">
            <a style="color:black;font-family: "system-ui";" class="nav-link" href="furnituredisplay.php">Furniture Products
              <span class="sr-only">(current)
              </span>
            </a>
          </li>
          <li class="nav-item active">
            <a style="color:black;font-family: "system-ui";" class="nav-link" href="index.php">Contact Us
              <span class="sr-only">(current)
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home.php" style="color:black;font-family: "system-ui";" id="msg">
            </a>
          </li>       
          <li class="nav-item">
            <a class="nav-link" href="home.php?destroy=1" style="color:black;font-family:system-ui;" id="msg4">
            </a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" href="updateuser.php" style="color:black;font-family:system-ui;" id="msg5">
            </a>
          </li>   
          <?php if(isset($_SESSION['user'])){
?>
          <li class="nav-item">
            <a class="nav-link" href="home.php" style="color:black;font-family:system-ui;" value="">
              <?php echo $_SESSION['user'];?>
            </a>
          </li>  
          <?php if(isset($_SESSION['furnitureitems'])) {
if($_SESSION['furnitureitems']!=null){?>
          <li class="nav-item">
            <a class="nav-link" href="myitems.php" style="color:black;font-family:system-ui;" >My Items
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="checkout.php" style="color:black;font-family:system-ui;" >Checkout
            </a>
          </li> 
          <?php
}}?>
          <li class="nav-item">
            <a class="nav-link" href="home.php?destroy=1" style="color:black;font-family:system-ui;" >Logout
            </a>
          </li> 
          <?php }?>  
        </ul>
        <?php if(!isset($_SESSION['logout'])){?>
        <div class="row">
          <div class="col-md-12">
            <div class="signin"> 
              <a href="customer.php"  id="msg6">Register
              </a>
            </div>
            <div class="signin"> 
              <a href="#" data-target="#login-modal" data-toggle="modal" id="msg7" >Login
              </a>
            </div>
          </div>
        </div>
        <?php }?>
        <div class="modal fade" id="login-modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <img src="img/logo.png" alt="" class="img-thumbnail"  id="img-logo">
              </div>
              <div id="div-forms">
                <div class="modal-body">
                  <span>Please Login Here;
                  </span>
                  <h4 id="msg2" style="color:red;">
                  </h4>
                  <h4 id="msg3" style="color:blue;">
                  </h4>
                  <input type="text" id="txtusername" class="form-control" placeholder="Username:" required>  
                  <input type="password" id="txtpassword" class="form-control" placeholder="password" required>
                  <div class="checkbox">
                    <label for="">
                      <input type="checkbox">Remember Me!
                    </label>
                  </div>  
                </div>
                <div class="modal-footer">
                  <div class="row">
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-primary btn-lg btn-block" id="singin">Login
                      </button>
                    </div>
                    <div class="col-sm-6">
                      <button  type="submit" class="btn btn-primary btn-lg btn-block" id="signup">SignUp
                      </button>
                    </div>
                  </div>
                </div>  
              </div>
            </div>
          </div>
        </div>&nbsp;
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button type="button" class="btn btn-primary">Search
          </button>
        </form>
      </div>
    </nav>
    <div class="container ">
        <div clas="row">
        
        </div>
        <div class="row ">
          <div class="col-lg-2"> 
          </div>
          <div class="col-lg-8">
            
              <form action="feedback.php" method="post">
			<div id="contact-form" class="form-container" data-form-container style="color: rgb(46, 125, 50); background: rgb(200, 230, 201);">
			<div class="row">
				<div class="form-title" style="margin-left:240px;">
					<span> Customer Feedback </span>
				</div>
            </div>
            
			<div class="input-container">
				<div class="row">
					<span class="req-input valid" >
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Input your post title."> </span>
						<input type="text" data-min-length="8" placeholder="Subject:" name="txtsubject" required>
					</span>
				</div>
			
				<div class="row">
					<span class="req-input message-box valid">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Post Contents."> </span>
						<textarea type="textarea" data-min-length="10"  placeholder="Content:" name="txtcontent" required></textarea>
				</div>
				<div class="row submit-row">
					<button type="submit" name="feedback" class="btn btn-block submit-form valid">Submit</button>
				</div>
			</div>
			</div>
			</form>
            </div>
          </div>
        </div>
      </div>
    <br>
<br>
<br>
<br>
<br>
<br>
<div class="row">
  <div class="footer">
    <div class="innterfooter">
      <div class="footeritems">
        <h1>Giving Best Services
        </h1>
        <p>Our NYT Furniture Company Branches Are Giving Your Choice
          Of Enjoyment
        </p>
      </div>
      <div class="footeritems">
        <h2>Services
        </h2>
        <div class="border">
        </div>
        <ul>
          <li> 
            <a href="#">30% Discount
            </a>
          </li>
          <li> 
            <a href="#">Free Delivery
            </a>
          </li>
          <li> 
            <a href="#">Lucky Draw
            </a>
          </li>
          <li> 
            <a href="#">Give Away
            </a>
          </li>
        </ul>
      </div>
      <div class="footeritems">
        <h2>Quick Links
        </h2>
        <div class="border">
        </div>
        <ul>
          <li> 
            <a href="#">Home
            </a>
          </li>
          <li> 
            <a href="#">Shop
            </a>
          </li>
          <li> 
            <a href="#">Blog
            </a>
          </li>
          <li> 
            <a href="#">Features
            </a>
          </li>
          <li> 
            <a href="#">About Us
            </a>
          </li>
          <li> 
            <a href="#">Contact Us
            </a>
          </li>
        </ul>
      </div>
      <ul>
        <li> 
          <a href="#">FaceBook
          </a>
        </li>
        <li> 
          <a href="#">Instagram
          </a>
        </li>
        <li> 
          <a href="#">Twitter
          </a>
        </li>
      </ul>
    </div>
    <div class="footerbottom">
      Design by Nyein Yadanar Tun (2020)
    </div>
  </div>
</div>
<script src="js/feedback.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">
</script>
<script src="js/style.js">
</script>
<script type="text/javascript" src="js/owl.carousel.min.js">
</script>
<script type="text/javascript" src="js/custom.js">
</script>
<script type="text/javascript" src="js/jquery.js">
</script>
  </body>
</html>