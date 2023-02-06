<?php
include('config.php');
if(isset($_POST[btn_reg])){
    
    $r="INSERT INTO `order_bill`(`ob_id`, `c_id`,`name`, `email`, `mobile`, `address`, `city`, `state`, `pincode`, `country`, `r_date`, `r_time`,`pay_mode`,`bill_price`,`est_price`,`est_coins`,`coins`) VALUES (NULL ,'$d_detail[c_id]','$_POST[name]','$_POST[email]','$_POST[mobile]','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[pincode]','$_POST[country]','$date','$time','$_POST[pay]','$_POST[price]','$_POST[est_price]','$_POST[est_coins]','$_POST[cns]');";
    
    $m="SELECT * FROM `order_bill` WHERE `c_id`='$d_detail[c_id]' ORDER BY `ob_id` DESC;";
    

    if($con->query($r)===TRUE AND $mn=$con->query($m)){
    $val2=$mn->fetch_assoc();
    $qry="SELECT * FROM `add_cart` WHERE `c_id`='$d_detail[c_id]'";
    $res=$con->query($qry);
    $n=$res->num_rows;
    $total_price=0;
    $total_mrp=0;
    $total_dp=0;
    while($val=$res->fetch_assoc()){
        $total_mrp=$total_mrp+$val[p_mrp];
        $total_dp=$total_dp+$val[p_dp];
        $total_price=$total_price+$val[p_total];
        $coins=$total_price*(25/100);
        $coins_total=$d_detail[coins]-$_POST[est_coins];
        $c="UPDATE `costumer` SET `coins`='$coins_total' WHERE `c_id`='$d_detail[c_id]'";
       
       //echo "$d_detail[coins]";
        $f="INSERT INTO `order_bill_detail`(`obd_id`, `ob_id`, `c_id`,`p_id`, `p_qty`, `p_mrp`, `p_dp`, `p_total`, `r_date`, `r_time`) VALUES (NULL,'$val2[ob_id]','$d_detail[c_id]','$val[p_id]','$val[p_qty]','$val[p_mrp]','$val[p_dp]','$val[p_total]','$date','$time');";
        
        if($con->query($f)===TRUE AND $con->query($c)===TRUE ){
            
            $se="SELECT * FROM `costumer` WHERE `c_id`='$d_detail[c_id]'";
            $m=$con->query($se);
            $val=$m->fetch_assoc();
            
            $my_coins=$val[coins]+$_POST[cns];
            
            $s="DELETE FROM `add_cart` WHERE `c_id`='$d_detail[c_id]';";
             
            $ad="UPDATE `admin_wallet` SET `admin_wallet`='$total_price'";
        
            $ds="UPDATE `costumer` SET `coins`='$my_coins' WHERE `c_id`='$d_detail[c_id]'";
             
            if( $con->query($s)===TRUE AND $con->query($ad)===TRUE AND $con->query($ds)){
                echo"<script>alert('Ordered Successfull');location.href='order1.php';</script>";
            }else{
                echo"<script>alert('Ordered Fail');location.href='checkout.php';</script>";
                 }
           }
        }
    }else{
        echo "<script>alert('Order Bill Query!Failed');location.href='./checkout.php';</script>";
    }
}
?>