<?php 
//Close the session when the user wants to logout
session_start();
if(isset($_SESSION['name'])){
session_destroy();}
header("location:register.php");
?>