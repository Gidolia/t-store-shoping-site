<?php
error_reporting(0);
session_start();

include "./database_connect.php";
$que="SELECT * FROM `costumer` WHERE `email`='$_SESSION[mob]' AND `password`='$_SESSION[pass]'";

$res=$con->query($que);
  if ($res->num_rows != 1)
  {     
      echo "<script>location.href='./login.php';</script>";
  }
  else{
	  $d_detail=$res->fetch_assoc();
  }
?>