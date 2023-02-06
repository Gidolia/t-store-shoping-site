<?php
include('config.php');
$r=$con->query("SELECT * FROM `product` WHERE `p_id`='$_GET[pid]'");
$res=$r->fetch_assoc();
$qty=$res[qty]-1;

$s=$con->query("SELECT * FROM `category` WHERE `cat_id`='$res[cat_id]'");
$res1=$s->fetch_assoc();

$r=$con->query("INSERT INTO `add_cart`(`ac_id`, `c_id`, `cat_id`, `cat_name`, `p_id`, `p_name`, `p_image`, `p_mrp`, `p_dp`, `p_qty`, `p_total`, `p_discount`, `date`, `time`) VALUES (NULL,'$d_detail[c_id]','$res1[cat_id]','$res1[cat_name]','$_GET[pid]','$res[name]','$res[image1]','$res[mrp]','$res[dp]','1','$res[mrp]','','$date','$time');");

$upd=$con->query("UPDATE `product` SET `qty`='$qty' WHERE `p_id`='$_GET[pid]'");
if($r===TRUE AND $upd===TRUE){
    echo "<script>alert('Added To Cart');location.href='index.php';</script>";
}else{
    echo "<script>alert('Added Failed');location.href='index.php';</script>";
}










?>