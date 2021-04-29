
<?php
session_start();
$form=1;
$flag=false;
$i=0;
$savesuccess='';
$removeno=-1;
$total=0;
$qty=0;
$customerid='';
$customerphone='';
$con=mysqli_connect("localhost","root","","furniture");
include "autoid.php";
if(isset($_REQUEST['cancel'])){
unset($_SESSION['furnitureitems']);
}
$orderid=autoID("orderdetail","OrderNo","OR_",10,"OR_0000000001");
$deliveryid=autoID("delivery","DeliveryID","D_",10,"D_0000000001");
if(isset($_SESSION['userid'])){
if(isset($_SESSION['phoneno'])){
$customerid=$_SESSION['userid'];
$customerphone=$_SESSION['phoneno'];}}
if(!isset($_SESSION['furnitureitems'])){
$_SESSION['furnitureitems']=array();
$_SESSION['furniturequantity']=array();
$_SESSION['furnitureprice']=array();
$_SESSION['furniturename']=array();
$_SESSION['price']=array();
$_SESSION['total']=0;
}
if(isset($_REQUEST['add'])  ){
if(isset($_REQUEST['furnitureid'])){
for($i=0;$i<count($_SESSION['furnitureitems']);$i++){
if($_SESSION['furnitureitems'][$i]==$_REQUEST['furnitureid']){
$flag=true;
$_SESSION['furniturename'][$i]=$_REQUEST['furniturename'];
$_SESSION['furniturequantity'][$i]+=$_REQUEST['furnitureqty'];
$_SESSION['furnitureprice'][$i]=$_REQUEST['furnitureprice'];
}
// $_SESSION['total']+=$_SESSION['furnitureprice'][$i];
}
if($flag==false){
$_SESSION['furnitureitems'][$i]=$_REQUEST['furnitureid'];
$_SESSION['furniturequantity'][$i]=$_REQUEST['furnitureqty'];
$_SESSION['furnitureprice'][$i]=$_REQUEST['furnitureprice'];
$_SESSION['furniturename'][$i]=$_REQUEST['furniturename'];
}
}
}
if(isset($_REQUEST['savedata'])){
for($c=0;$c<count($_SESSION['furnitureitems']);$c++){
$total+=$_SESSION['furniturequantity'][$c]*$_SESSION['furnitureprice'][$c];
}
$customername=$_REQUEST['customername'];
$orderdate=$_REQUEST['orderdate'];
$total=$_REQUEST['total'];
$cardno=$_REQUEST['cardno'];
$cbc=$_REQUEST['cbcno'];
$addresss=$_REQUEST['deliveryaddress'];
for($r=0;$r<count($_SESSION['furnitureitems']);$r++){
$furid=$_SESSION['furnitureitems'][$r];
$furqty=$_SESSION['furniturequantity'][$r];
$qty+=$furqty;
$furprice=$_SESSION['furnitureprice'][$r];
$querydetail="insert into orderdetail values('$orderid','$furid','$furqty','$furprice')";
mysqli_query($con,$querydetail);
$amount=$_SESSION['furniturequantity'][$r];
$furnitureamount="select * from furniture";
$resultamount=mysqli_query($con,$furnitureamount);
while($dataamount=mysqli_fetch_array($resultamount)){
if($_SESSION['furnitureitems'][$r]==$dataamount[0]){
$updateamount=(int)$dataamount[5]+$amount;
$updatequery="update furniture set quantity='$updateamount' where FurnitureID='$furid'";
mysqli_query($con,$updatequery);
}
$query="insert into orderfurniture values('$orderid','$orderdate','$customerid','$deliveryid','$customername','$addresss','$customerphone','$cardno','-','-','$cbc','$total','Pending')";
mysqli_query($con,$query);
$savesuccess="<h5 style='color:blue';>Dear Customer,<br></h5><p style='color:blue';>Your order is success and we will deliver your order within two business days and following is your transaction no.
<br><b><h5 style='color:blue';>Transaction No:Sa_000007</h5><h5 style='color:blue';>Contact Ph:0942342332</h5><h5 style='color:blue';>Email:paradisefurniture@gmail.com</h5></b>";
}
}unset($_SESSION['furnitureitems']);
$customerid='';
}
if(isset($_REQUEST['cancel'])){
unset($_SESSION['furnitureitems']);
}
if(isset($_REQUEST['removeno'])){
$removeno=$_REQUEST['removeno'];
$_SESSION['furnitureitems'][$removeno]="";
$_SESSION['furniturename'][$removeno]="";
$_SESSION['furniturequantity'][$removeno]=0;
$_SESSION['furnitureprice'][$removeno]=0;
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
          <?php if(isset($_SESSION['user'])){
?>
          <li class="nav-item">
            <a class="nav-link" href="home.php" style="color:black;font-family: "system-ui";" value="">
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
            <a class="nav-link" href="home.php?destroy=1" style="color:black;font-family: "system-ui";" >Logout
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
      <h1>Check Out
      </h1>
    </div>
    <div class="row purchasebody" style="height:800px;">
      <div class="col-md-4 purchasebodycol ">
        <form class="purchaseform" method="get" action="checkout.php">
          <div class="form-group ">
            <label for="exampleFormControlInput1">Customer ID
            </label>
            <input type="text" class="form-control" name="customername" value="<?php echo $customerid; ?>" readonly="true" id="exampleFormControlInput1" required>
          </div>
          <div class="form-group ">
            <label for="exampleFormControlInput1">Customer Name
            </label>
            <input type="text" class="form-control" name="customername" id="exampleFormControlInput1" required>
          </div>
          <div class="form-group ">
            <label for="exampleFormControlInput1">Credit Card No
            </label>
            <input type="text" class="form-control" name="cardno" id="exampleFormControlInput1" required>
          </div>
          <div class="form-group ">
            <label for="exampleFormControlInput1">Order Date
            </label>
            <input name="orderdate" type="date" class="form-control" id="exampleFormControlInput1"  value="<?php echo date('Y-m-d'); ?>" readonly="true" required/>
          </div>
          <div class="form-group ">
            <label for="exampleFormControlInput1">CBC No
            </label>
            <input type="text" class="form-control" name="cbcno" id="exampleFormControlInput1" required>
          </div>
          <div class="form-group ">    
            <label for="exampleFormControlInput1">DeliveryAddress
            </label>
            <textarea name="deliveryaddress" class="form-control"
                      rows="5">
            </textarea>
          </div>
          <?php $total=0;
if(isset($_SESSION['furnitureitems'])){
for($c=0;$c<count($_SESSION['furnitureitems']);$c++){
$total+=$_SESSION['furniturequantity'][$c]*$_SESSION['furnitureprice'][$c];
}
?>
          <div class="form-group ">
            <label for="exampleFormControlInput1">TotalAmount
            </label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $total;?>" readonly="true" name="total" required>
          </div>
          <?php }else if(!isset($_SESSION['furnitureitems'])){?>
          <div class="form-group ">
            <label for="exampleFormControlInput1">TotalAmount
            </label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="0" name="total" readonly="true" required>
          </div>
          <?PHP }?>
          <button type="submit" name="savedata" class="btn btn-primary" id="save">Save Data
          </button>
          <button type="button" class="btn btn-default" id="cancel">Cancel
          </button>
        </form>
      </div>
      <div class="col-md-8 purchasebodycol " style="padding:80px 120px;">
        <div class="row ">
          <div class="col-md " >
            <div class="container">
              <div class="row text-center showtable">
                <table style="width:300px; height:300px; overflow-y:auto;background-color:white;"
                       class="table table-hover white">
                  <tbody>
                    <tr>
                      <th scope="col"> Furniture 
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
echo "<tr><td scope='row'><img src='".$_SESSION['furnitureimage'][$j]."' width='100' height='100'><td scope='row'>" . $_SESSION['furnitureitems'][$j] . "</td><td scope='row'>" .$_SESSION['furniturename'][$j] . "</td><td scope='row'>" . $_SESSION['furniturequantity'][$j] . "</td><td scope='row'>" . $_SESSION['furnitureprice'][$j] . "</td><td scope='row'><a href='myitems.php?removeno=".$j."'>Remove</td></tr>";
}}
?>              
                  </tbody>
                </table>
              </div>
            </div>
            <?php echo $savesuccess;
?>
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
  <script type="text/javascript">
    function handleSelect(elm)
    {
      window.location = "purchase.php?item="+elm.value;
    }
  </script>
  <script type="text/javascript">
    $("document").ready(function(e){
      $("#cancel").click(function(){
        window.location="checkout.php";
      }
                        );
      $("#save").click(function(){
        window.location="furnituredisplay.php";
      }
                      );
    }
                       );
  </script>
</html>
