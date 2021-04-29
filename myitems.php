<?php
session_start();
$form=1;
$flag=false;
$i=0;
$savesuccess='';
$removeno=-1;
$con=mysqli_connect("localhost","root","","furniture");
include "autoid.php";
$image='';
$purchaseid=autoID("purchase","PurchaseID","PU_",10,"PU_0000000001");
if(!isset($_SESSION['furnitureitems'])){
$_SESSION['furnitureitems']=array();
$_SESSION['furniturequantity']=array();
$_SESSION['furnitureprice']=array();
$_SESSION['furniturename']=array();
$_SESSION['furnitureimage']=array();
$_SESSION['price']=array();
$_SESSION['total']=0;
}
if(isset($_REQUEST['savedata'])){
$purchaseid=$_REQUEST['purchaseid'];
$supplierid=$_REQUEST['supplierid'];
$purchasedate=$_REQUEST['purchasedate'];
$total=$_REQUEST['total'];
$querysave="insert into purchase values('$purchaseid','$supplierid','$purchasedate','$total')";
mysqli_query($con,$querysave);
for($r=0;$r<count($_SESSION['furnitureitems']);$r++){
$furid=$_SESSION['furnitureitems'][$r];
$furqty=$_SESSION['furniturequantity'][$r];
$furprice=$_SESSION['furnitureprice'][$r];
$querydetail="insert into purchasedetail values('$purchaseid','$furid','$furqty','$furprice')";
mysqli_query($con,$querydetail);
$amount=$_SESSION['furniturequantity'][$r];
$furnitureamount="select * from furniture";
$resultamount=mysqli_query($con,$furnitureamount);
while($dataamount=mysqli_fetch_array($resultamount)){
if($_SESSION['furnitureitems'][$r]==$dataamount[0]){
$updateamount=(int)$dataamount[5]-$amount;
$updatequery="update furniture set quantity='$updateamount' where FurnitureID='$furid'";
mysqli_query($con,$updatequery);
}
}
$savesuccess="<h5 style='color:blue';>Successfully Save</h5>";
}
}
if(isset($_REQUEST['cancel'])){
session_unset();
}
if(isset($_REQUEST['removeno'])){
$removeno=$_REQUEST['removeno'];
$_SESSION['furnitureitems'][$removeno]="";
$_SESSION['furniturename'][$removeno]="";
$_SESSION['furniturequantity'][$removeno]=0;
$_SESSION['furnitureprice'][$removeno]=0;
$_SESSION['furnitureimage'][$removeno]='';
} 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
    </title>
  </head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/formsignin.css">
  <link rel="stylesheet" type="text/css" href="css/formstyle.css">
  <link rel="stylesheet" type="text/css" href="css/purchase.css">
  <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
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
<a class="nav-link" href="feedback.php" style="color:black;font-family:system-ui;" >
Feedback </a>
</li>   
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
    <div class="row purchasetitle">
      <h1>Your Items
      </h1>
    </div>
    <div class="row purchasebody" style="height:600px;">
      <div class="col-md-8" style="padding-top:40px;padding-left:540px;">
        <div class="container">
          <div class="row text-center showtable">
            <div class="col-md-12">
              <table style="width:1900px; height:400px; overflow-y:auto;background-color:white;"
                     class="table table-hover white">
                <tbody>
                  <tr> 
                    <th scope="col"> Furniture:
                    </th>
                    <th scope="col"> Furniture ID:
                    </th>
                    <th scope="col">Furniture Name
                    </th>
                    <th scope="col"> Quantity
                    </th>
                    <th scope="col"> Price
                    </th>
                  </tr>
                  <?php
if(isset($_SESSION['furnitureitems'])){
for($j=0;$j<count($_SESSION['furnitureitems']);$j++){
echo "<tr><td scope='row'><img src='".$_SESSION['furnitureimage'][$j]."' width='100' height='100'><td scope='row'>" . $_SESSION['furnitureitems'][$j] . "</td><td scope='row'>" .$_SESSION['furniturename'][$j] . "</td><td scope='row'>" . $_SESSION['furniturequantity'][$j] . "</td><td scope='row'>" . $_SESSION['furnitureprice'][$j] . "</td><td scope='row'><a href='purchasefurniture.php?removeno=".$j."'>Remove</td></tr>";
}}
?>              
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
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
  </body>
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
<script type="text/javascript" src="js/owl.carousel.min.js">
</script>
<script type="text/javascript" src="js/custom.js">
</script>
<script type="text/javascript">
  function handleSelect(elm)
  {
    window.location = "purchase.php?item="+elm.value;
  }
</script>
</html>
