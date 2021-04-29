
<?php
session_start();
$name='';       
if(isset($_SESSION['user'])){
$name=$_SESSION['user'];
}?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer See All Form
    </title>
    <link rel="stylesheet" href="css/bootstrap.css" class="css">
    <link rel="stylesheet" href="css/formstyle.css" class="css">
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
            <a style="color:black;font-family: 'system-ui';" class="nav-link dropdown-toggle" data-toggle="dropdown"  href="#">Users Info
              <span class="sr-only">(current)
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <button class="dropdown-item" type="submit" id="showcustomer">All Customers
              </button>
              <button class="dropdown-item" type="submit" id="showsupplier">All Suppliers
              </button>
              <button class="dropdown-item" type="submit" id="showdeliveryagent">All Agents
              </button>
              <button class="dropdown-item" type="submit" id="showfurnituretype">All Furniture Types
              </button>
            </div>
          </li>
          <li class="nav-item active">
            <a style="color:black;font-family: "system-ui";" class="nav-link dropdown-toggle" data-toggle="dropdown"  href="#">Services
              <span class="sr-only">(current)
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <button class="dropdown-item" type="button">Free Delivery
              </button>
              <button class="dropdown-item" type="button">Give Away
              </button>
              <button class="dropdown-item" type="button">Lucky Draw
              </button>
              <button class="dropdown-item" type="button">30% Discount
              </button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="color:black;font-family: "system-ui";"> 
              <?php if(isset($_SESSION['user'])){echo $_SESSION['user'];}?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home.php?destroy=1" style="color:black;font-family: "system-ui";">
              <?php if(isset($_SESSION['logout'])){echo $_SESSION['logout'];}?>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a style="color:black;font-family: 'system-ui';bhbbhh" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              About Us
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action
              </a>
              <a class="dropdown-item" href="#">Another action
              </a>
              <div class="dropdown-divider">
              </div>
              <a class="dropdown-item" href="#">Something else here
              </a>
            </div>
          </li>
        </ul>
        <div class="row">
        </div>
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
                  <font id="msg2" style="color:red;">
                  </font>
                  <font id="msg3" style="color:blue;">
                  </font>
                  <input type="text" id="txtname" name="username" class="form-control" placeholder="Username:" required>
                  <input type="password" id="txtpassword" name="password" class="form-control" placeholder="password" required>
                  <div class="checkbox">
                    <label for="">
                      <input type="checkbox">Remember Me!
                    </label>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="row">
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-primary btn-lg btn-block" id="login" >Login
                      </button>
                    </div>
                    <div class="col-sm-6">
                      <button  type="submit" class="btn btn-primary btn-lg btn-block" id="signup" onclick="signupfunction(this)">SignUp
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        &nbsp;
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button type="button" class="btn btn-primary">Search
          </button>
        </form>
      </div>
    </nav>
    <div class="container">
      <div class="row text-center">
        <div class="col-md-12">
          <h1 class="h1member">All Customers
          </h1>
        </div>
      </div>
      <div class="row text-center">
        <table style="width:900px; height:500px; overflow-y:auto;background-color:white;"
               class="table table-hover white">
          <tbody>
            <tr>
              <th scope="col"> ID:
              </th>
              <th scope="col">Name
              </th>
              <th scope="col"> Address
              </th>
              <th scope="col"> Phone
              </th>
              <th scope="col">Gender
              </th>
              <th scope="col"> Email
              </th>
              <th scope="col">Birthday
              </th>
              <th scope="col"> Username
              </th>
              <th scope="col"> Password
              </th>
              <th scope="col">Update
              </th>
            </tr>
            <?php
$con=mysqli_connect("localhost","root","","furniture");
$query = "SELECT * FROM customer where Customername='$name'";
$result = mysqli_query($con, $query);
while ($data = mysqli_fetch_array($result))
{
echo "<tr><td scope='row'>" . $data[0] . "</td><td scope='row'>" . $data[1] . "</td><td scope='row'>" . $data[2] . "</td><td scope='row'>" . $data[3] . "</td><td scope='row'>" . $data[4] . "</td>
<td scope='row'>" . $data[5] . "</td><td scope='row'>" . $data[6] . "</td><td scope='row'>" . $data[7] . "</td><td scope='row'>" . $data[8] . "</td><td scope='row'><a href='customer.php?eid=" . $data[0] . "'>Update</a></td></tr>";
}
?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
