<?php 
	$id=$_GET['id'];
	include "../../../database_connect.php";
	
	$d=$con->query("SELECT * FROM `product` WHERE `p_id`='$id';");
	$val=$d->fetch_assoc();
	$del="DELETE FROM `product` WHERE `p_id`='$id'";
    if($con->query($del)===TRUE){
        unlink('images/'.$val[image1]);
        unlink('images/'.$val[image2]);
    header('Location:./addProduct.php?Success');    
    }else{
    header('Location:./addProduct.php?Fail');
    }


?>