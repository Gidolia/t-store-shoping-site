<?php
session_start();
error_reporting(0);
if(isset($_SESSION[mob])){
include('config.php');
}else{
include('database_connect.php');    
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Products By Category</title>
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
<?php
include('include/header.php');
?>
<!-- Header End====================================================================== -->
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
		<li class="active">Products</li>
    </ul>
	<!--<h4> 20% Discount Special offer<small class="pull-right"> 40 products are available </small></h4>	-->
	<hr class="soft"/>
	<!--<form class="form-horizontal span6">-->
	<!--	<div class="control-group">-->
	<!--	  <label class="control-label alignL">Sort By </label>-->
	<!--		<select>-->
 <!--             <option>Priduct name A - Z</option>-->
 <!--             <option>Priduct name Z - A</option>-->
 <!--             <option>Priduct Stoke</option>-->
 <!--             <option>Price Lowest first</option>-->
 <!--           </select>-->
	<!--	</div>-->
	<!--  </form>-->
	<div id="myTab" class="pull-right">
	 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
	 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
	</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane" id="listView">
	    
<?php
$r=$con->query("SELECT * FROM `product` WHERE `cat_id`='$_GET[c_id]'");
while($val=$r->fetch_assoc()){
?>
		<div class="row">	  

			<div class="span2">
			<img src="admin/ibo_panel/production/images/<?php echo $val[image1]?>" alt="" />
			</div>
			<div class="span4">
				<h3><?php echo $val[name]?></h3>				
				<hr class="soft"/>
				<!--<h5><?php #echo $val[name]?></h5>-->
				<p>
				<?php echo $val[long_description]?>
				</p>
				<!--<a class="btn btn-small pull-right" href="product_details.php?pid=<?php #echo $val[p_id];?>">View Details</a>-->
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> $<?php echo $val[mrp];?></h3>
		
			  <a href="process_addToCart.php?pid=<?php echo $val[p_id];?>" class="btn btn-large btn-primary"> Cart<i class=" icon-shopping-cart"></i></a>
			  <a href="product_details.php?pid=<?php echo $val[p_id];?>" class="btn btn-large">View</a>
				</form>
			</div>
		</div>
<?php
}
?>
</div>

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
<?php
$r=$con->query("SELECT * FROM `product` WHERE `cat_id`='$_GET[c_id]'");
while($val=$r->fetch_assoc()){
?>		    
			<li class="span3">
			  <div class="thumbnail">
				<a href="product_details.php?pid=<?php echo $val[p_id];?>"><img src="admin/ibo_panel/production/images/<?php echo $val[image1]?>" alt="" style="height:250px;"/></a>
				<div class="caption">
				  <h5><?php echo $val[name]?></h5>
				  <p> 
					 <?php echo $val[long_description]?>
				  </p>
				  <h4 style="text-align:center">
				      <a class="btn" href="product_details.php?pid=<?php echo $val[p_id];?>"> View</a>
				      <a class="btn" href="process_addToCart.php?pid=<?php echo $val[p_id];?>">Cart<i class="icon-shopping-cart"></i></a> 
				      <a class="btn btn-primary" >$<?php echo $val[mrp]?></a></h4>
				</div>
			  </div>
			</li>
<?php
}
?>	
		  </ul>


	<hr class="soft"/>
	</div>
</div>
<!--<a href="compair.html" class="btn btn-large pull-right">Compair Product</a>-->
	<!--<div class="pagination">-->
	<!--	<ul>-->
	<!--	<li><a href="#">&lsaquo;</a></li>-->
	<!--	<li><a href="#">1</a></li>-->
	<!--	<li><a href="#">2</a></li>-->
	<!--	<li><a href="#">3</a></li>-->
	<!--	<li><a href="#">4</a></li>-->
	<!--	<li><a href="#">...</a></li>-->
	<!--	<li><a href="#">&rsaquo;</a></li>-->
	<!--	</ul>-->
	<!--</div>-->
<br class="clr"/>
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
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
<!--	<div id="hideme" class="themeTitle">Style Selector</div>-->
<!--	<div class="themeName">Oregional Skin</div>-->
<!--	<div class="images style">-->
<!--	<a href="themes/css/#" name="bootshop"><img src="themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>-->
<!--	<a href="themes/css/#" name="businessltd"><img src="themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>-->
<!--	</div>-->
<!--	<div class="themeName">Bootswatch Skins (11)</div>-->
<!--	<div class="images style">-->
<!--		<a href="themes/css/#" name="amelia" title="Amelia"><img src="themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="spruce" title="Spruce"><img src="themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>-->
<!--		<a href="themes/css/#" name="superhero" title="Superhero"><img src="themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="cyborg"><img src="themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="cerulean"><img src="themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="journal"><img src="themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="readable"><img src="themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>	-->
<!--		<a href="themes/css/#" name="simplex"><img src="themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="slate"><img src="themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="spacelab"><img src="themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="united"><img src="themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>-->
<!--		<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>-->
<!--	</div>-->
<!--	<div class="themeName">Background Patterns </div>-->
<!--	<div class="images patterns">-->
<!--		<a href="themes/css/#" name="pattern1"><img src="themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>-->
<!--		<a href="themes/css/#" name="pattern2"><img src="themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern3"><img src="themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern4"><img src="themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern5"><img src="themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern6"><img src="themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern7"><img src="themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern8"><img src="themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern9"><img src="themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern10"><img src="themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>-->
		
<!--		<a href="themes/css/#" name="pattern11"><img src="themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern12"><img src="themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern13"><img src="themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern14"><img src="themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern15"><img src="themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>-->
		
<!--		<a href="themes/css/#" name="pattern16"><img src="themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern17"><img src="themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern18"><img src="themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern19"><img src="themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>-->
<!--		<a href="themes/css/#" name="pattern20"><img src="themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>-->
		 
<!--	</div>-->
<!--	</div>-->
<!--</div>-->
<!--<span id="themesBtn"></span>-->
</body>
</html>