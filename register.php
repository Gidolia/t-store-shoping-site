<?php
include('./database_connect.php');
	if(isset($_POST[btn_reg])){
	   
	 $t="SELECT * FROM `costumer` WHERE `email`='$_POST[email]'";
	 $r=$con->query($t);
	 $num=$r->num_rows;
	 
	 if($num>0){
	    echo "<script>alert('Already Registered');location.href='./register.php';</script>";
	 }else{
	      $qry="INSERT INTO `costumer`(`c_id`, `name`, `email`, `password`, `dob`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `add_info`, `mobile`, `r_date`, `r_time`) VALUES (NULL,'$_POST[name]','$_POST[email]','$_POST[password]','$_POST[dob]','$_POST[address1]','','$_POST[city]','$_POST[state]','$_POST[country]','$_POST[pincode]','','$_POST[mobile]','$date','$time');";  
             if($con->query($qry)===TRUE){
                 echo "<script>alert('Registered Successfully');location.href='./login.php';</script>";
             }else{
                 echo "<script>alert('Registration Fail');location.href='./register.php?fail';</script>";
             }
	 }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Register || My Shop</title>
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
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>	
	<div class="well">

	<form class="form-horizontal" method="post">
	    <h4>Your personal information</h4>
		<div class="control-group ">
		
		</div>
		<div class="control-group ">
			<label class="control-label" for="inputFname1">Name<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputFname1" placeholder="Name" name="name" required>
			</div>
		 </div>
		 
		<div class="control-group">
		<label class="control-label" for="input_email">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" id="input_email" placeholder="Email" name="email" required>
		</div>
	  </div>
	  	<div class="control-group">
			<label class="control-label" for="phone">Mobile<sup>*</sup></label>
			<div class="controls" required>
			  <input type="text"  name="mobile" id="phone" placeholder="Mobile"/> 
			</div>
		</div>
	<div class="control-group">
		<label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="text" id="inputPassword1" placeholder="Password" name="password" required>
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label" for="inputPassword1">Date of Birth<sup>*</sup></label>
		<div class="controls">
		  <input type="date" id="inputPassword1" placeholder="Password" name="dob" required>
		</div>
	  </div>
		

	<!--<div class="alert alert-block alert-error fade in">-->
	<!--	<button type="button" class="close" data-dismiss="alert">??</button>-->
	<!--	<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s-->
	<!-- </div>	-->

		<h4>Your address</h4>
	
		<div class="control-group">
			<label class="control-label" for="address">Address<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="address" placeholder="Address" name="address1" required/> 
			</div>
		</div>
		
		<!--<div class="control-group">-->
		<!--	<label class="control-label" for="address2">Address (Line 2)<sup>*</sup></label>-->
		<!--	<div class="controls">-->
		<!--	  <input type="text" id="address2" placeholder="Adress line 2" name="address2"/> -->
		<!--	</div>-->
		<!--</div>-->
		<div class="control-group">
			<label class="control-label" for="city">City<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="city" placeholder="city" name="city" required/> 
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="state">State<sup>*</sup></label>
			<div class="controls">
			 <input type="text" placeholder="state" name="state" required />
			</div>
		</div>		
		<div class="control-group">
			<label class="control-label" for="postcode">Zip / Postal Code<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="postcode" placeholder="Zip / Postal Code" name="pincode" required/> 
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="country">Country<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="country" placeholder="Country" name="country" required/> 
			</div>
		</div>
		
			
		<!--<div class="control-group">-->
		<!--	<label class="control-label" for="aditionalInfo">Additional information</label>-->
		<!--	<div class="controls">-->
		<!--	  <textarea name="addInfo" id="aditionalInfo" cols="26" rows="3">Additional information</textarea>-->
		<!--	</div>-->
		<!--</div>-->
	<!--<p><sup>*</sup>Required field	</p>-->
	
	<div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input class="btn btn-large btn-success" type="submit" value="Register" name="btn_reg"/>
			</div>
		</div>		
	</form>


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
	
	<!-- Themes switcher section ============================================================================================= -->
<!--<div id="secectionBox">-->
<!--<link rel="stylesheet" href="themes/switch/themeswitch.css" type="text/css" media="screen" />-->
<!--<script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>-->
<!--	<div id="themeContainer">-->
	<!--<div id="hideme" class="themeTitle">Style Selector</div>-->
	<!--<div class="themeName">Oregional Skin</div>-->
	<!--<div class="images style">-->
	<!--<a href="themes/css/#" name="bootshop"><img src="themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>-->
	<!--<a href="themes/css/#" name="businessltd"><img src="themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>-->
	<!--</div>-->
	<!--<div class="themeName">Bootswatch Skins (11)</div>-->
	<!--<div class="images style">-->
	<!--	<a href="themes/css/#" name="amelia" title="Amelia"><img src="themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="spruce" title="Spruce"><img src="themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>-->
	<!--	<a href="themes/css/#" name="superhero" title="Superhero"><img src="themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="cyborg"><img src="themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="cerulean"><img src="themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="journal"><img src="themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="readable"><img src="themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>	-->
	<!--	<a href="themes/css/#" name="simplex"><img src="themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="slate"><img src="themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="spacelab"><img src="themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="united"><img src="themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>-->
	<!--	<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>-->
	<!--</div>-->
	<!--<div class="themeName">Background Patterns </div>-->
	<!--<div class="images patterns">-->
	<!--	<a href="themes/css/#" name="pattern1"><img src="themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>-->
	<!--	<a href="themes/css/#" name="pattern2"><img src="themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern3"><img src="themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern4"><img src="themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern5"><img src="themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern6"><img src="themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern7"><img src="themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern8"><img src="themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern9"><img src="themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern10"><img src="themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>-->
		
	<!--	<a href="themes/css/#" name="pattern11"><img src="themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern12"><img src="themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern13"><img src="themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern14"><img src="themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern15"><img src="themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>-->
		
	<!--	<a href="themes/css/#" name="pattern16"><img src="themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern17"><img src="themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern18"><img src="themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern19"><img src="themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>-->
	<!--	<a href="themes/css/#" name="pattern20"><img src="themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>-->
		 
	<!--</div>-->
<!--	</div>-->
<!--</div>-->
<!--<span id="themesBtn"></span>-->
</body>
</html>

