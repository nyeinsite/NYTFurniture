
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/formsignin.css">
                <link rel="stylesheet" type="text/css" href="css/formstyle.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg  navbar navbar-dark" style="background-color:#b8b8b1;"><!--navbar-inverse bg-success-->


           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <a  class="navbar-brand" href="#">
               <img src="img/logo.png" width="100" height="50" alt="" loading="lazy">
             </a>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                 <a style="color:black;font-family: "system-ui";" class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item active">
                   <a style="color:black;font-family: "system-ui";" class="nav-link dropdown-toggle" data-toggle="dropdown"  href="#">About Us<span class="sr-only">(current)</span></a>
                   <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                     <button class="dropdown-item" type="button">Action</button>
                     <button class="dropdown-item" type="button">Another action</button>
                     <button class="dropdown-item" type="button">Something else here</button>
                   </div>
                 </li>
              
               <li class="nav-item dropdown">
                 <a style="color:black;font-family: "system-ui";" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Dropdown
                 </a>

                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="#">Action</a>
                   <a class="dropdown-item" href="#">Another action</a>
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="#">Something else here</a>
                 </div>
               </li>


             </ul>

             <form class="form-inline my-2 my-lg-0">
               <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button type="button" class="btn btn-primary">Primary</button>
             </form>
           </div>
         </nav>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
           <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  </body>
</html>

<?php
$con = mysqli_connect("localhost", "root", "", "furniture");
$formtype = 0;
$id = '';
$fname = '';
$lname = '';
$email = '';
$phno = '';
$username = '';
$password = '';
$gender = '';
$birthdate = '';
$address = '';
$flag = true;
$alreadyexist = '';
$editflag = true;
$eid = '';
$ename = '';
$eaddress = '';
$eemail = '';
$ephno = '';
$eusername = '';
$epassword = '';
$egender = '';
$edate = '';
$editid = '';
$editname = '';
$editaddress = '';
$editphno = '';
$editgender = '';
$editemail = '';
$editusername = '';
$editpassword = '';
$editbirthdate = '';
$seeall = 0;
//-----------------------------------------------------------------------------------Auto ID Test--------------------------------------------------------------------------------------
include "autoid.php";

$id=autoID("customer","CustomerID","C_",10,"C_0000000001");
//------------------------------------------------------------------------------------Delete Customer-------------------------------------------------------------------------------


if (isset($_REQUEST['did']))
{
    $did = $_REQUEST['did'];
    $query = "DELETE from customer where CustomerID='$did'";
    mysqli_query($con, $query);
    $seeall = 1;
}



//-----------------------------------------------------------------------------------------Update Customer-----------------------------------------------------------------------------------------------------------------
if (isset($_POST['edit']))
{

    $formtype = 1;
    if ($_POST['txtcustomerid'] == '')
    {
        $editid = '<font style="color:red;">Please Fill ID</font>';
        $editflag = false;
    }
    else
    {
        $editid = $_POST['txtcustomerid'];
    }

    if ($_POST['txtcustomername'] == '')
    {
        $editname = '<font style="color:red;">Please Fill Name</font>';
        $editflag = false;
    }
    else
    {
        $editname = $_POST['txtcustomername'];
    }

    if ($_POST['customeremail'] == '')
    {
        $editemail = '<font style="color:red;">Please Fill Email</font>';
        $editflag = false;
    }
    else
    {
        $editemail = $_POST['customeremail'];
    }
    if ($_POST['customerphone'] == '')
    {
        $editphno = '<font style="color:red;">Please Fill Phone Number</font>';
        $editflag = false;
    }
    else
    {
        $editphno = $_POST['customerphone'];
    }

    if ($_POST['txtusername'] == '')
    {
        $editusername = '<font style="color:red;">Please Fill User Name</font>';
        $editflag = false;
    }
    else
    {
        $editusername = $_POST['txtusername'];
    }
    if ($_POST['customerpassword'] == '')
    {
        $editpassword = '<font style="color:red;">Please Fill Password</font>';
        $editflag = false;
    }
    else
    {
        $editpassword = $_POST['customerpassword'];
    }
    if ($_POST['customergender'] == 'Choose Gender...')
    {
        $editgender = '<font style="color:red;">Please Choose Your Gender</font>';
        $editflag = false;
    }
    else
    {
        $editgender = $_POST['customergender'];
    }
    if ($_POST['customerbirthday'] == '')
    {
        $editbirthdate = '<font style="color:red;">Please Choose Your Birthday</font>';
        $editflag = false;
    }
    else
    {
        $editbirthdate = $_POST['customerbirthday'];
    }
    if ($_POST['customeraddress'] == '')
    {
        $editaddress = '<font style="color:red;">Please Enter Your Address</font>';
        $editflag = false;
    }
    else
    {
        $editaddress = $_POST['customeraddress'];
    }

    if ($editflag == true)
    {

        $query = "UPDATE customer SET Customername='$editname',address='$editaddress',phNo='$editphno',gender='$editgender',email='$editemail',dateofBirth='$editbirthdate',username='$editusername',password='$editpassword' where CustomerID='$editid'";
        mysqli_query($con, $query);
        $success = "Dear " . $editname . " Successfully Update";
        echo '<script type="text/javascript">alert("' . $success . '");</script>';
        $seeall = 1;
    }
    else
    {

    }

}
if (isset($_REQUEST['eid']))
{
    $formtype = 1;

    $editid = $_REQUEST['eid'];
    $selectquery = "SELECT * FROM customer where customerid='$editid'";
    $result = mysqli_query($con, $selectquery);
    while ($data = mysqli_fetch_array($result))
    {
        $eid = $data[0];
        $ename = $data[1];
        $eaddress = $data[2];
        $eemail = $data[5];
        $egender = $data[4];
        $ephno = $data[3];
        $eusername = $data[7];
        $epassword = $data[8];
        $edate = $data[6];
    }
}
if (isset($_REQUEST['eid']) || $editflag == false)
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Update Form</title>
    <link rel="stylesheet" href="css/bootstrap.css" class="css">
    <link rel="stylesheet" href="css/formstyle.css" class="css">
</head>

<body>
    <form action="customer.php" method="post">
        <div class="container ">
            <div class="row text-center">
                <div class="col-md-12">
                    <a href="customer.php"><button type="button" class="btn btn-primary btn">New Customer</button></a>
                    <a href="customer.php?seeall=1"><button type="button" class="btn btn-primary btn">See All
                            Customers</button></a>
                </div>
                <div class="col-md-6">

                </div>
            </div>
            <div clas="row">


            </div>
            <div class="row ">
                <div class="col-lg-2"> </div>
                <div class="col-lg-8">
                    <div id="ui">
                        <h1 class="text-center">Customer Update Form</h1>
                        <form class="form-group text-center">
                            <label>Customer ID:</label>
                            <input type="text" name="txtcustomerid" class="form-control" readonly="true"
                                value="<?php echo $eid ?>">

                            <br>

                            <label>Customer Name:</label>
                            <input type="text" name="txtcustomername" class="form-control" value="<?php echo $ename ?>">
                            <?php echo $editname; ?>

                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Email</label>
                                    <input type="email" name="customeremail" class="form-control"
                                        value="<?php echo $eemail ?>">
                                    <?php echo $editemail; ?>
                                </div>
                                <div class="col-lg-6">
                                    <label>Phone Number:</label>
                                    <input type="tel" name="customerphone" class="form-control"
                                        value="<?php echo $ephno ?>">
                                    <?php echo $editphno; ?>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Username:</label>
                                    <input type="text" name="txtusername" class="form-control"
                                        value="<?php echo $eusername ?>">
                                    <?php echo $editusername; ?>
                                </div>
                                <div class="col-lg-6">
                                    <label>Password:</label>
                                    <input type="password" name="customerpassword" class="form-control"
                                        value="<?php echo $epassword ?>">
                                    <?php echo $editpassword; ?>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Gender:</label>
                                    <select name="customergender" class="form-control">
                                        <option>Choose Gender...</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option selected><?php echo $egender ?></option>
                                        <option>Others</option>
                                    </select>
                                    <?php echo $editgender; ?>
                                </div>

                                <div class="col-lg-6">
                                    <label>Birth Date:</label>
                                    <input type="date" name="customerbirthday" class="form-control"
                                        value="<?php echo $edate ?>">
                                    <?php echo $editbirthdate; ?>
                                </div>

                            </div>
                            <br>
                            <label>Address:</label>
                            <textarea name="customeraddress" class="form-control"
                                rows="5"><?php echo $eaddress ?></textarea>
                            <?php echo $editaddress; ?>
                            <br>
                            <div class="row text-center">
                                <input type="submit" name="edit" value="Update"
                                    class="btn btn-primary btn-block btn-lg">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </form>
</body>

</html>
<?php
}

?>


<?php
//--------------------------------------------------------------------Show All Customers Table-----------------------------------------------------------------------------------------
if (isset($_REQUEST['seeall']) || $seeall == 1)
{
    $formtype = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer See All Form</title>
    <link rel="stylesheet" href="css/bootstrap.css" class="css">
    <link rel="stylesheet" href="css/formstyle.css" class="css">
</head>

<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <a href="customer.php"><button type="button" class="btn btn-primary btn">New Customer</button></a>
                <a href="customer.php?seeall=1"><button type="button" class="btn btn-primary btn">See All
                        Customers</button></a>
            </div>
        </div><br>
        <div class="row text-center">

            <div class="col-md-12">
                <h1 class="h1member">All Customers</h1>
            </div>
        </div>
        <div class="row text-center">

            <table style="width:900px; height:500px; overflow-y:auto;background-color:white;"
                class="table table-hover white">
                <tbody>
                    <tr>
                        <th scope="col"> ID:</th>
                        <th scope="col">Name</th>
                        <th scope="col"> Address</th>
                        <th scope="col"> Phone</th>
                        <th scope="col">Gender</th>
                        <th scope="col"> Email</th>
                        <th scope="col">Birthday</th>
                        <th scope="col"> Username</th>
                        <th scope="col"> Password</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                    <?php
    $query = "SELECT * FROM customer";
    $result = mysqli_query($con, $query);
    while ($data = mysqli_fetch_array($result))
    {
        echo "<tr><td scope='row'>" . $data[0] . "</td><td scope='row'>" . $data[1] . "</td><td scope='row'>" . $data[2] . "</td><td scope='row'>" . $data[3] . "</td><td scope='row'>" . $data[4] . "</td>
    <td scope='row'>" . $data[5] . "</td><td scope='row'>" . $data[6] . "</td><td scope='row'>" . $data[7] . "</td><td scope='row'>" . $data[8] . "</td><td scope='row'><a href='customer.php?eid=" . $data[0] . "'>Update</a></td><td scope='row'><a href='customer.php?did=" . $data[0] . "' ><font style='color:red;'>Delete</font></td></tr>";
    }
?>
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>
<?php
} ?>



<?php
//-------------------------------------------------------------------------New Customer Save Form-----------------------------------------------------------------------------------------
if ($formtype == 0)
{

    if (isset($_POST['customersubmit']))
    {
        if ($_POST['txtcustomerid'] == '')
        {
            $id = '<font style="color:red;">Please Fill ID</font>';
            $flag = false;
        }
        else
        {
            $id = $_POST['txtcustomerid'];
        }
        if ($_POST['txtcustomerfname'] == '')
        {
            $fname = '<font style="color:red;">Please Fill First Name</font>';
            $flag = false;
        }
        else
        {
            $fname = $_POST['txtcustomerfname'];
        }
        if ($_POST['txtcustomerlname'] == '')
        {
            $lname = '<font style="color:red;">Please Fill Last Name</font>';
            $flag = false;
        }
        else
        {
            $lname = $_POST['txtcustomerlname'];
        }
        if ($_POST['customeremail'] == '')
        {
            $email = '<font style="color:red;">Please Fill Email</font>';
            $flag = false;
        }
        else
        {
            $email = $_POST['customeremail'];
        }
        if ($_POST['customerphone'] == '')
        {
            $phno = '<font style="color:red;">Please Fill Phone Number</font>';
            $flag = false;
        }
        else
        {
            $phno = $_POST['customerphone'];
        }
        if ($_POST['txtusername'] == '')
        {
            $username = '<font style="color:red;">Please Fill User Name</font>';
            $flag = false;
        }
        else
        {
            $username = $_POST['txtusername'];
        }
        if ($_POST['customerpassword'] == '')
        {
            $password = '<font style="color:red;">Please Fill Password</font>';
            $flag = false;
        }
        else
        {
            $password = $_POST['customerpassword'];
        }
        if ($_POST['customergender'] == 'Choose Gender...')
        {
            $gender = '<font style="color:red;">Please Choose Your Gender</font>';
            $flag = false;
        }
        else
        {
            $gender = $_POST['customergender'];
        }
        if ($_POST['customerbirthday'] == '')
        {
            $birthdate = '<font style="color:red;">Please Choose Your Birthday</font>';
            $flag = false;
        }
        else
        {
            $birthdate = $_POST['customerbirthday'];
        }
        if ($_POST['customeraddress'] == '')
        {
            $address = '<font style="color:red;">Please Enter Your Address</font>';
            $flag = false;
        }
        else
        {
            $address = $_POST['customeraddress'];
        }
        if ($flag == true)
        {
            $name = $fname . " " . $lname;

            $selectall = "SELECT * FROM customer";
            $result = mysqli_query($con, $selectall);
            while ($row = mysqli_fetch_array($result))
            {
                if ($row[0] == $id || $row[3] == $phno || $row[5] == $email)
                {
                    $flag = false;
                }
            }
            if ($flag == true)
            {
                $query = "INSERT INTO customer VALUES ('$id','$name','$address','$phno','$gender','$email','$birthdate','$username','$password')";
                mysqli_query($con, $query);
                $success = "Dear " . $name . " Successfully Registered";
                echo '<script type="text/javascript">alert("' . $success . '");</script>';
                $id = '';
                $fname = '';
                $lname = '';
                $email = '';
                $phno = '';
                $username = '';
                $password = '';
                $gender = '';
                $birthdate = '';
                $address = '';
            }

            if ($flag == false)
            {
                $alreadyexist = "<center><h2 class='alreadyexist' style='color:red;'>You Are Already Exist</h2></center>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration Form</title>
    <link rel="stylesheet" href="css/bootstrap.css" class="css">
    <link rel="stylesheet" href="css/formstyle.css" class="css">
</head>

<body>

    <form action="customer.php" method="post">
        <div class="container ">
            <div class="row text-center">
                <div class="col-md-12">
                    <a href="customer.php"><button type="button" class="btn btn-primary btn">New Customer</button></a>
                    <a href="customer.php?seeall=1"><button type="button" class="btn btn-primary btn">See All
                            Customers</button></a>
                </div>
                <div class="col-md-6">

                </div>
            </div>
            <div clas="row">

                <?php echo $alreadyexist ?>
            </div>
            <div class="row ">
                <div class="col-lg-2"> </div>
                <div class="col-lg-8">
                    <div id="ui">
                        <h1 class="text-center">Customer Registration Form</h1>
                        <form class="form-group text-center">
                            <label>Customer ID:</label>
                            <input type="text" name="txtcustomerid" class="form-control"
                                placeholder="Enter your ID...." value="<?php echo $id;?>" readonly="true">
                            <?php echo $id; ?>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>First Name:</label>
                                    <input type="text" name="txtcustomerfname" class="form-control"
                                        placeholder="Enter your first name...">
                                    <?php echo $fname; ?>
                                </div>
                                <div class="col-lg-6">
                                    <label>Last Name:</label>
                                    <input type="text" name="txtcustomerlname" class="form-control"
                                        placeholder="Enter your last name...">
                                    <?php echo $lname; ?>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Email</label>
                                    <input type="email" name="customeremail" class="form-control"
                                        placeholder="Enter your address....">
                                    <?php echo $email; ?>
                                </div>
                                <div class="col-lg-6">
                                    <label>Phone Number:</label>
                                    <input type="tel" name="customerphone" class="form-control"
                                        placeholder="Enter your phone number.....">
                                    <?php echo $phno; ?>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Username:</label>
                                    <input type="text" name="txtusername" class="form-control"
                                        placeholder="Enter your username...">
                                    <?php echo $username; ?>
                                </div>
                                <div class="col-lg-6">
                                    <label>Password:</label>
                                    <input type="password" name="customerpassword" class="form-control"
                                        placeholder="Enter your password...">
                                    <?php echo $password; ?>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Gender:</label>
                                    <select name="customergender" class="form-control">
                                        <option>Choose Gender...</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Others</option>
                                    </select>
                                    <?php echo $gender; ?>
                                </div>

                                <div class="col-lg-6">
                                    <label>Birth Date:</label>
                                    <input type="date" name="customerbirthday" class="form-control">
                                    <?php echo $birthdate; ?>
                                </div>

                            </div>
                            <br>
                            <label>Address:</label>
                            <textarea name="customeraddress" class="form-control" rows="5"
                                placeholder="Enter your address here...."></textarea>
                            <?php echo $address; ?>
                            <br>
                            <div class="row text-center"> <input type="submit" name="customersubmit" value="Save"
                                    class="btn btn-primary btn-block btn-lg"></div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </form>
</body>

</html>
<?php
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="css/formsignin.css">
              <link rel="stylesheet" type="text/css" href="css/formstyle.css">
  </head>
  <body>
    <br><br>
    <div class="row">
    <div class="footer">
      <div class="innterfooter">
        <div class="footeritems">
          <h1>Giving Best Services</h1>
          <p>Our Paradise Furniture Company Branches Are Giving Your Choice
            Of Enjoyment</p>
        </div>
        <div class="footeritems">
          <h2>Services</h2>
          <div class="border"></div>
          <ul>
            <li> <a href="#">30% Discount</a></li>
            <li> <a href="#">Free Delivery</a></li>
            <li> <a href="#">Lucky Draw</a></li>
            <li> <a href="#">Give Away</a></li>
          </ul>

        </div>
        <div class="footeritems">
          <h2>Quick Links</h2>
          <div class="border"></div>
          <ul>
            <li> <a href="#">Home</a></li>
            <li> <a href="#">Shop</a></li>
            <li> <a href="#">Blog</a></li>
            <li> <a href="#">Features</a></li>
            <li> <a href="#">About Us</a></li>
            <li> <a href="#">Contact Us</a></li>
          </ul>

        </div>

        <ul>
          <li> <a href="#">FaceBook</a></li>
          <li> <a href="#">Instagram</a></li>
          <li> <a href="#">Twitter</a></li>

    </ul>
      </div>
      <div class="footerbottom">
        Design by Nyein Yadanar Tun (2020)
      </div>
    </div>
    </div>
  </body>
</html>
