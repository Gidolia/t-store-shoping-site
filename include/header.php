<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
    <?php if(isset($_SESSION[mob])){?>
	<div class="span6">Welcome!<strong> &nbsp;<?php echo $d_detail[name];?></strong><strong> &nbsp;&nbsp;&nbsp;<img src="themes/sc.png" style="height:15px;width:20px;">&nbsp;<?php echo $d_detail[coins];?></strong></div>
	<?php
	}else{
	?>
	<div class="span6">Welcome!<strong> &nbsp;USER</strong></div>
	<?php
	}
	?>
	
	
	<div class="span6">
	<div class="pull-right">
		<?php if(isset($_SESSION[mob])){?>
		<a href="logout.php"><span class="btn btn-mini btn-success">Logout </span> </a>
		<?php }else{?>
		<a href="./register.php"  style="padding-right:0"><span class="btn btn-large btn-success">Register</span></a>
		<a href="./login.php"  style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
		<?php
		}
		?>
	</div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
      <!--<img src="themes/images/logo.png" alt="Bootsshop"/>-->
    <a class="brand" href="index.php"><font size="6">MY SHOP</font></a>
    <ul id="topMenu" class="nav pull-right">
    <li class=""><a href="index.php">Home</a></a></li>
	 <li class=""><a href="allProducts.php">All Products</a></li>
   

	 
<?php
if(isset($_SESSION[mob])){
$r=$con->query("SELECT * FROM `add_cart` WHERE `c_id`='$d_detail[c_id]'");
$num=0;
$num=$r->num_rows;    
}
?>
    <li class=""><a href="addToCart.php"><span ><i class="icon-shopping-cart icon-white"></i>Cart(<?php echo $num;?>) </span> </a></li>
    <li class=""><a href="order1.php">Order</a></li>
    <li class=""><a href="profileView.php">My Account</a></li>
    
    
<?php if(isset($_SESSION[mob])){?>        
	 
<?php }else{ ?>
     <li class=""><a href="contact1.php">Contact</a></li>
<?php }?>
    
 </ul>
  </div>
</div>
</div>
</div>