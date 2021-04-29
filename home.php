<?php session_start();
$con=mysqli_connect("localhost","root","","furniture");
$data='';
if(isset($_REQUEST['destroy'])){
session_unset();
header("location:home.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/slider.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <script type="text/javascript">
      $(document).ready(function() {
        $("#myCarousel").on("slide.bs.carousel", function(e) {
          var $e = $(e.relatedTarget);
          var idx = $e.index();
          var itemsPerSlide = 3;
          var totalItems = $(".carousel-item").length;
          if (idx >= totalItems - (itemsPerSlide - 1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i = 0; i < it; i++) {
              // append slides to end
              if (e.direction == "left") {
                $(".carousel-item")
                  .eq(i)
                  .appendTo(".carousel-inner");
              }
              else {
                $(".carousel-item")
                  .eq(0)
                  .appendTo($(this).find(".carousel-inner"));
              }
            }
          }
        }
                           );
      }
                       );
    </script>
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
            <a style="color:black;font-family: "system-ui";" class="nav-link" href="#">Home 
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
<a class="nav-link" href="feedback.php" style="color:black;font-family:system-ui;" >
Feedback </a>
</li>   
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
    <div class="row">
      <div class="col-md-6">
        <br>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <section class="sectionbox">
          <div class="sectionbody">
            <div class="slidershow middle">
              <div cass="col-md-12">
                <h3 style="text-align:center;font-family:'system-ui';">Best Sales Of The Year
                </h3>
              </div>
              <div class="slides">
                <input type="radio" name="r" id="r1" checked>
                <input type="radio" name="r" id="r2">
                <input type="radio" name="r" id="r3">
                <input type="radio" name="r" id="r4">
                <input type="radio" name="r" id="r5">
                <div class="slide s1">
                  <img src="img/home/slideshow/slideshow1.jpg">
                  </img>
              </div>
              <div class="slide">
                <img src="img/home/slideshow/slideshow2.jpg">
                </img>
            </div>
            <div class="slide">
              <img src="img/home/slideshow/slideshow3.jpg">
              </img>
          </div>
          <div class="slide">
            <img src="img/home/slideshow/slideshow4.jpg">
            </img>
          </div>
        <div class="slide">
          <img src="img/home/slideshow/slideshow5.jpg">
          </img>
      </div>
    </div>
    <div class="navigation">
      <label for="r1" class="bar">
      </label>
      <label for="r2" class="bar">
      </label>
      <label for="r3" class="bar">
      </label>
      <label for="r4" class="bar">
      </label>
      <label for="r5" class="bar">
      </label>
    </div>
    </div>
  </div>
</section>
</div>
</div>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">
</script>
<script src="js/style.js">
</script>
<script type="text/javascript" src="js/jquery.js">
</script>
</body>
<script type="text/javascript" src="js/owl.carousel.min.js">
</script>
<script type="text/javascript" src="js/custom.js">
</script>
<script type="text/javascript">
  $("document").ready(function(e){
    $("#singin").click(function(){
      var  username=$("#txtusername").val();
      var password=$("#txtpassword").val();
      $.ajax({
        type:'POST',
        url:'loginajax.php',
        data:'username='+username+'&password='+password+'&btn=btn',
        success:function(msg){
          if(msg==""){
            $("#msg2").html("Please Try Again");
            $("#msg3").html("");
            $("#msg").html("");
            $("#msg4").html("");
          }
          else if(msg!="Admin"){
            $("#msg").html(msg);
            $("#msg3").html("Login Success");
            $("#msg2").html("");
            $("#msg4").html("Log out");
            setTimeout(function(){
              location.reload();
            }
                      );
            $_REQUEST['destroy']='';
          }
          else{
            $("#msg").html(msg);
            $("#msg3").html("Login Success");
            $("#msg2").html("");
            $("#msg4").html("Log out");
            $("#msg6").html("");
            $("#msg7").html("");
            setTimeout(function(){
              location.reload();
            }
                      );
            $_REQUEST['destroy']='';
          }
        }
      }
            );
    }
                      );
    $("#showcustomer").click(function(){
      window.location="showcustomer.php";
    }
                            );
    $("#showsupplier").click(function(){
      window.location="showsupplier.php";
    }
                            );
    $("#showdeliveryagent").click(function(){
      window.location="showdeliveryagent.php";
    }
                                 );
    $("#showfurnituretype").click(function(){
      window.location="showfurnituretype.php";
    }
                                 );
    $("#signup").click(function(){
      window.location="customer.php";
    }
                      );
  }
                     );
</script>
</body>
</html>
