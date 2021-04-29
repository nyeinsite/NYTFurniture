<?php
session_start();
$login='';
$loginsuccess=false;
$con=mysqli_connect("localhost","root","","furniture");
$username='';
$password='';
if(isset($_REQUEST["btn"])){
$username=$_POST['username'];
$password=$_POST['password'];
if($username=='admin' && $password=='admin'){
$loginsuccess=true;
$login='Admin';
$_SESSION['user']='Admin';
$_SESSION['logout']='Log out';
}
else{
$query="SELECT * from customer";
$result=mysqli_query($con,$query);
while($data=mysqli_fetch_array($result)){
if(($data[7]==$username && $data[8]==$password)  || ($data[5]==$username && $data[8]==$password) ){
$login=$data[7];
$loginsuccess=true;
$_SESSION['userid']=$data[0];
$_SESSION['phoneno']=$data[3];
$_SESSION['user']=$login;
$_SESSION['logout']='logout';
}
}}
if($loginsuccess==true){
echo $login;
}else{
echo "";
}
}
?>