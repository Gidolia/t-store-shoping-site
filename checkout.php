<?php
include('./config.php');
    $qry="SELECT * FROM `add_cart` WHERE `c_id`='$d_detail[c_id]'";
    $res=$con->query($qry);
    $n=$res->num_rows;
    $total_price1=0;
    $total_mrp=0;
    $total_dp=0;
    while($val=$res->fetch_assoc()){
        
        //total Marked Price
        $total_mrp=$total_mrp+$val[p_mrp];
        
        //total Discount Price
        $total_dp=$total_dp+$val[p_dp];
        
        ////total Price of Products buy
        $total_price1=$total_price1+$val[p_total];
        
        //1percent coins of total price
        $total_cns_price=$total_price1*(5/100);
        
        if($d_detail[coins]>$total_cns_price){
          //price after using coins
          $total_price=$total_price1-$total_cns_price;  
        }else{
           $total_price=$total_price1;
           $total_cns_price=0;
        }
        
        if($total_price1 > 499){
            $coins=$total_price1*(25/100);    
        }else{
            $coins=0;
        }
       
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Check out</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
<!-- Header ====-->
<?php
include('include/header.php');
?>	
<!-- Header end==== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
	    
<!-- Sidebar ================================================== -->
<?php
include('include/sidebar.php');
?>	
<!-- Sidebar end=============================================== -->

	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Checkout</li>
    </ul>
    <form class="form-horizontal" method="post" action="process_checkout.php">
	<!--<h3> Order Bill Details</h3>	-->
	<div class="well">
<section id="typography" style="background-color:orange;border-radius:35px;" >
    <div class="page-header" style="margin-bottom:-80px;">
        <h3><center>Cart Details </center></h3>
    </div>
    <div class="hero-unit" style="background-color:orange;">
        <h3>Total Products : <?php echo $n;?></h3>
        <?php if($coins>0){ ?>
        <h3>Coins Earned: <?php echo "<img src='themes/sc.png' style='height:25px;width:20px;'>".$coins;?></h3>
        <?php }?>
        <h3>Total Price : $<?php echo $total_price1;?></h3>
        <h3>Estimated Price : $<?php echo $total_price."+<img src='themes/sc.png' style='height:25px;width:20px;'>".$total_cns_price;?></h3>
    </div>
</section>

<h3><center>Order Bill Details</center> </h3>	
<center>
    <form class="form-horizontal" method="post" action="process_checkout.php">
        <input type="hidden" value="<?php echo $total_price1;?>" name="price">
        <input type="hidden" value="<?php echo $total_price;?>" name="est_price">
        <input type="hidden" value="<?php echo $total_cns_price;?>" name="est_coins">
        <input type="hidden" value="<?php echo $coins;?>" name="cns"> 
	    <!--<h4>Your personal information</h4>-->
		<div class="control-group ">
			<label class="control-label" for="pay">Payment Mode<sup>*</sup></label>
			<div class="controls">
			 <img src='themes/cod1.jpg' style='height:25px;width:100px;'>&nbsp;<input type="radio" id="pay"  name="pay" required value="1">&nbsp;
			 <img src='themes/visa.jpg' style='height:25px;width:30px;'>&nbsp;<input type="radio" id="pay"  name="pay" required value="2">
			</div>
		 </div>
		<div class="control-group ">
			<label class="control-label" for="inputFname1">Name<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputFname1" placeholder="First Name" name="name" required value="<?php echo $d_detail[name];?>">
			</div>
		 </div>
		 
		<div class="control-group">
		<label class="control-label" for="input_email">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" id="input_email" placeholder="Email" name="email" required value="<?php echo $d_detail[email];?>">
		</div>
	  </div>
	  	<div class="control-group">
			<label class="control-label" for="phone">Mobile<sup>*</sup></label>
			<div class="controls" required>
			  <input type="text"  name="mobile" id="phone" placeholder="Mobile" value="<?php echo $d_detail[mobile];?>"/> 
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="address">Address<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="address" placeholder="Address" name="address" required value="<?php echo $d_detail[address1];?>"/> 
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="city">City<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="city" placeholder="city" name="city" required value="<?php echo $d_detail[city];?>"/> 
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="state">State<sup>*</sup></label>
			<div class="controls">
			 <input type="text" name="state" value="0">
			</div>
		</div>		
		<div class="control-group">
			<label class="control-label" for="postcode">Zip / Postal Code<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="postcode" placeholder="Zip / Postal Code" name="pincode" required value="<?php echo $d_detail[pincode];?>"/> 
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="country">Country<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="country" placeholder="Country" name="country" required value="<?php echo $d_detail[country];?>"/> 
			</div>
		</div>
	
	<div class="control-group">
			<div class="controls">
			    <?php if($total_price > 0){?>
				<input class="btn btn-large btn-primary" type="submit" value="Confirm Checkout" name="btn_reg"/>
				<?php }else{ 
				
				?>
				
				<input class="btn btn-large btn-primary" type="submit" value="Confirm Checkout" name="" disabled/>
				<?php 
				echo "<br><b style='color:red;'>PLEASE SELECT PRODUCT TO BUY<br> CART DETAILS NOT BE EMPTY</b>";}	?>
			</div>
		</div>		
	</form>	
	</center>
</div>

</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<?php
include('include/footer.php');
?>

<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="themes/js/jquery.js" type="text/javascript"></script>
	<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>
	

<!--<div id="secectionBox">-->
<!--<link rel="stylesheet" href="themes/switch/themeswitch.css" type="text/css" media="screen" />-->
<!--<script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>-->
<!--	<div id="themeContainer">-->

<!--	</div>-->
<!--</div>-->
<!--<span id="themesBtn"></span>-->
</body>
</html>

