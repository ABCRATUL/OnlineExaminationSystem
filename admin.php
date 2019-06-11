<?php
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$email = $_POST['uname'];
$password = $_POST['password'];

$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);
$result = mysqli_query($con,"SELECT email FROM admin WHERE email = '$email' and password = '$password'") or die('Error');
$count=mysqli_num_rows($result);
if($count==1){
session_start();
if(isset($_SESSION['email'])){
session_unset();}
$_SESSION["name"] = 'Anirban';
$_SESSION["key"] ='anirban1234';
$_SESSION["email"] = 'anirbanchakraborty318@gmail.com';
header("location:dash.php?q=0");
}
else header("location:$ref?w=Warning : Access denied");
?>