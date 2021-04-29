
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contact V17
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
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
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>
        </title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/formsignin.css">
        <link rel="stylesheet" type="text/css" href="css/formstyle.css">
      </head>
      <body>
        <nav class="navbar navbar-expand-lg  navbar navbar-dark" style="background-color:#b8b8b1;">
          <!--navbar-inverse bg-success-->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
            </span>
          </button>
          <a  class="navbar-brand" href="#">
            <img src="images/logo.png" width="100" height="50" alt="" loading="lazy">
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
              <?php if(isset($_SESSION['furnitureitems'])) {?>
              <li class="nav-item">
                <a class="nav-link" href="myitems.php" style="color:black;font-family:system-ui;" >My Items
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="checkout.php" style="color:black;font-family:system-ui;" >Checkout
                </a>
              </li> 
              <?php
}?> 
              <li class="nav-item">
                <a class="nav-link" href="home.php?destroy=1" style="color:black;font-family:system-ui;" >Logout
                </a>
              </li> 
              <?php }?>  
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button type="button" class="btn btn-primary">Search
              </button>
            </form>
          </div>
        </nav>
        <div class="container-contact100">
          <div class="wrap-contact100">
            <form class="contact100-form validate-form" action="https://formspree.io/nyeinyadanartun2001@gmail.com/index.php" method="POST">
              <span class="contact100-form-title">
                Send Us A Message
              </span>
              <label class="label-input100" for="first-name">Tell us your name *
              </label>
              <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
                <input id="first-name" class="input100" type="text" name="first-name" placeholder="First name" required>
                <span class="focus-input100">
                </span>
              </div>
              <div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
                <input class="input100" type="text" name="last-name" placeholder="Last name" required>
                <span class="focus-input100">
                </span>
              </div>
              <label class="label-input100" for="email">Enter your email *
              </label>
              <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                <input  id="email" class="input100" type="email" name="_replyto" placeholder="Eg. example@email.com" required>
                <span class="focus-input100">
                </span>
              </div>
              <label class="label-input100" for="phone">Enter phone number
              </label>
              <div class="wrap-input100">
                <input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +1 800 000000" required>
                <span class="focus-input100">
                </span>
              </div>
              <label class="label-input100" for="message">Message *
              </label>
              <div class="wrap-input100 validate-input" data-validate = "Message is required">
                <textarea id="message" class="input100" name="message" placeholder="Write us a message" required>
                </textarea>
                <span class="focus-input100">
                </span>
              </div>
              <div class="container-contact100-form-btn">
                <button type="submit" class="contact100-form-btn">
                  Send Message
                </button>
              </div>
            </form>
            <div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-01.jpg');">
              <div class="flex-w size1 p-b-47">
                <div class="txt1 p-r-25">
                  <span class="lnr lnr-map-marker">
                  </span>
                </div>
                <div class="flex-col size2">
                  <span class="txt1 p-b-20">
                    Address
                  </span>
                  <span class="txt2">
                    No.(7) Bayint Naung Street, Kamarkyi Road, Thuwunna Yangon.
                  </span>
                </div>
              </div>
              <div class="dis-flex size1 p-b-47">
                <div class="txt1 p-r-25">
                  <span class="lnr lnr-phone-handset">
                  </span>
                </div>
                <div class="flex-col size2">
                  <span class="txt1 p-b-20">
                    Lets Talk
                  </span>
                  <span class="txt3">
                    +959425472782
                  </span>
                </div>
              </div>
              <div class="dis-flex size1 p-b-47">
                <div class="txt1 p-r-25">
                  <span class="lnr lnr-envelope">
                  </span>
                </div>
                <div class="flex-col size2">
                  <span class="txt1 p-b-20">
                    General Support
                  </span>
                  <span class="txt3">
                    nyeinyadanartun@ucsy.edu.mm
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="dropDownSelect1">
        </div>
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
        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js">
        </script>
        <!--===============================================================================================-->
        <script src="vendor/animsition/js/animsition.min.js">
        </script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js">
        </script>
        <script src="vendor/bootstrap/js/bootstrap.min.js">
        </script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js">
        </script>
        <script>
          $(".selection-2").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
          }
                                   );
        </script>
        <!--===============================================================================================-->
        <script src="vendor/daterangepicker/moment.min.js">
        </script>
        <script src="vendor/daterangepicker/daterangepicker.js">
        </script>
        <!--===============================================================================================-->
        <script src="vendor/countdowntime/countdowntime.js">
        </script>
        <!--===============================================================================================-->
        <script src="js/main.js">
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13">
        </script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){
            dataLayer.push(arguments);
          }
          gtag('js', new Date());
          gtag('config', 'UA-23581568-13');
        </script>
        <script type="text/javascript" src="js/owl.carousel.min.js">
        </script>
        <script type="text/javascript" src="js/custom.js">
        </script>
      </body>
    </html>
