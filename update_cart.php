<?php
include('config.php');
if(isset($_POST[upd])){
    //Fetch PRoduct Detail and update quantity
$sel=$con->query("SELECT * FROM `product` WHERE `p_id`='$_POST[pid]'");
$val=$sel->fetch_assoc();
$mq=$val[qty]-($_POST[qty]-1);
$upd=$con->query("UPDATE `product` SET `qty`='$mq' WHERE `p_id`='$_POST[pid]'");

//update qty in add to cart
$total1=$_POST[qty]*$_POST[dp];  
//$total=$total1-($total1*0.05);
// $cns=$total1*0.05;
// $total_coin=$d_detail[coins]-$cns;

$res=$con->query("UPDATE `add_cart` SET `p_qty`='$_POST[qty]',`p_total`='$total1' WHERE `ac_id`='$_POST[id]' AND `p_id`='$_POST[pid]'");
// $res1=$con->query("UPDATE `costumer` SET `coins`='$total_coin' WHERE `c_id`='$d_detail[c_id]'");


if($res===TRUE AND $upd===TRUE ){
    echo "<script>location.href='addToCart.php';</script>";
}else{
    echo "<script>location.href='addToCart.php';</script>";
}

}



if(isset($_POST[remove])){
    //Fetch PRoduct Detail and update quantity
$sel=$con->query("SELECT * FROM `product` WHERE `p_id`='$_POST[pid]'");
$val=$sel->fetch_assoc();
$mq=$val[qty]+($_POST[qty]);
$upd=$con->query("UPDATE `product` SET `qty`='$mq' WHERE `p_id`='$_POST[pid]'");

//$total1=$_POST[qty]*$_POST[dp];  

//$total=($total1*0.05);
//$total_coin=$d_detail[coins]+$total;    

// $res1=$con->query("UPDATE `costumer` SET `coins`='$total_coin' WHERE `c_id`='$d_detail[c_id]'");

//delete qty in add to cart
$res=$con->query("DELETE FROM `add_cart` WHERE `ac_id`='$_POST[id]'");
if($res===TRUE ){
    echo "<script>alert('Product Removed');location.href='addToCart.php';</script>";
}else{
    echo "<script>alert('Product Remove  Fail');location.href='addToCart.php';</script>";
}

}


?>