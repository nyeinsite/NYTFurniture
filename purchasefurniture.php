
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

if(isset($_REQUEST['comment'])){
  $fid=$_POST['id'];
  $cid=$_POST['customerid'];
  $rid=$_POST['reviewid'];
  $comment=$_POST['txtcomment'];
  $sql="insert into review values('$rid','$cid','$fid','$comment')";
  mysqli_query($con,$sql);
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
          <?php if(isset($_SESSION['furnitureitems'])) {
if($_SESSION['furnitureitems']!=null){?>
          <li class="nav-item">
            <a class="nav-link" href="myitems.php" style="color:black;font-family:system-ui;" >My Items
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
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button type="button" class="btn btn-primary">Search
          </button>
        </form>
      </div>
    </nav>
    <div class="row purchasetitle">
      <h1>Furniture Detail
      </h1>
    </div>
    <div class="row purchasebody" style="height:1000px;">
      <div class="col-md-8 purchasebodycol">
        <div class="row " style="padding-left:340px;">
          <?PHP
if(isset($_REQUEST['id']) || isset($_REQUEST['comment'])){
$id=$_REQUEST['id'];
$query3="select * from furniture where FurnitureID='$id'";
$result3=mysqli_query($con,$query3);
while($data3=mysqli_fetch_array($result3)){
?>
          <div class="col-md-8">
            <h4>
            </h4>
            <form class="purchaseform2" action="furnituredisplay.php" method="post"> 
              <div class="form-group ">
                <label for="exampleFormControlInput1">Furniture ID
                </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data3[0]; ?>" name="furnitureid" readonly="true"  required>
              </div>
              <div class="form-group ">
                <label for="exampleFormControlInput1">furniture
                </label>
                <input type="text" class="form-control" id="exampleFormControlInput1"  value="<?php echo $data3[1];?>" name="furniturename" readonly="true" required>
              </div>
              <div class="form-group ">
                <label for="exampleFormControlInput1">quantity
                </label>
                <input type="number" min="0" max="<?php echo $data3[5]; ?>" class="form-control" id="exampleFormControlInput1"  readonly="true" value="<?php echo $data3[5]; ?>" name="furnitureqty" required> 
              </div>
              <div class="form-group ">
                <label for="exampleFormControlInput1">qty
                </label>
                <input type="number" min="0" max="<?php echo $data3[5]; ?>" class="form-control" id="exampleFormControlInput1"  name="furnitureqty" required> 
              </div>
              <div class="form-group ">
                <label for="exampleFormControlInput1">Price per 1
                </label>
                <input type="text" class="form-control" id="exampleFormControlInput1"  value="<?php echo $data3[3];?>" name="furnitureprice" readonly="true" required>
              </div>
              <div class="form-group ">
                <label for="exampleFormControlInput1">Image
                </label>
                <input type="text" class="form-control" id="exampleFormControlInput1"  value="<?php echo $data3[7];?>" name="furnitureimage" readonly="true" required>
              </div>
              <?php 
$image=$data3[7];
}
}else{?>
              <div class="col-md-8">
                <h4>
                </h4>
                <form class="purchaseform2" action="furnituredisplay.php" method="post">
                  <div class="form-group ">
                    <label for="exampleFormControlInput1">Furniture ID
                    </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="furnitureid" required>
                  </div>
                  <div class="form-group ">
                    <label for="exampleFormControlInput1">furniture
                    </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="furniturename"  required>
                  </div>
                  <div class="form-group ">
                    <label for="exampleFormControlInput1">quantity
                    </label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="furnitureqty" required>
                  </div>
                  <div class="form-group ">
                    <label for="exampleFormControlInput1">Price per 1
                    </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="furnitureprice" required>
                  </div>
                  <?PHP }
?>
                  <button type="submit" name="add" class="btn btn-danger">Order
                  </button>
                  </a><br>
                  
                </form>
              </div>
            <div class="col-md-1">
              <img src="<?php echo $image?>" width="400" height="500" alt="" name="furnitureimage"><br><br>
              <?php $reviewid="";
              $reviewid=autoID("review","Reviewid","RV_",10,"RV_0000000001");
              ?><form action="purchasefurniture.php" method="post">
              <div class="form-group ">
              <input type="hidden" class="form-control" id="exampleFormControlInput1" name="id" value="<?php echo $id;?>" required>
              <input type="hidden" class="form-control" id="exampleFormControlInput1" name="reviewid" value="<?php echo $reviewid;?>" required>
              <input type="hidden" class="form-control" id="exampleFormControlInput1" name="customerid" value="<?php echo $_SESSION['userid'];?>" required>
              <textarea name="txtcomment" rows="2" cols="30" required></textarea>
              <button type="submit" name="comment" class="btn btn-primary">Comment
                  </button>
     </div></form>
    
     <div class="row text-center">
        <table style="width:700px; height:300px; overflow-y:auto;background-color:white;"
               class="table table-hover white">
          <tbody>
            <tr>
            
              <th scope="col">Name
              </th>
        
    
              <th scope="col">Comment
              </th>
            </tr>
            <?php
$furniid=$_REQUEST['id'];
$query="SELECT * FROM review where Furnitureid='$furniid'";
$result = mysqli_query($con, $query);
while ($data = mysqli_fetch_array($result))
{
  $cid=$data[1];
  $query="SELECT * FROM customer where CustomerID='$cid'";
  $result2 = mysqli_query($con, $query);
  $data2=mysqli_fetch_array($result2);
echo "<tr><td scope='row'>" . $data[3] . "</td><td scope='row'>" . $data2[1] . "</td></tr>";
}
?>
          </tbody>
        </table>
      </div>
     <?php 
     
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
