<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Order Bill Detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	
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
<ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Billing Details</li>
    </ul>
<section id="Table">
  <div class="page-header">
    <h3>Billing Details</h3>
  </div>

  <div class="row-fluid">
	<div class="span8">
		<table class="table table-striped table-bordered table-responsive" >
             <?php
 $r=$con->query("SELECT * FROM `order_bill` WHERE `ob_id`='$_GET[id]' AND `c_id`='$d_detail[c_id]'");
 $val1=$r->fetch_assoc();
 ?>
  <thead>
          <tr>
            <th>Name</th>
            <th><?php echo $val1[name];?></th>
          </tr>
           <tr>
            <th>Mobile</th>
            <th><?php echo $val1[mobile];?></th>
          </tr>
           <tr>
            <th>Email</th>
            <th><?php echo $val1[email];?></th>
          </tr>
           <tr>
            <th>Address</th>
           <th><?php echo $val1[address];?></th>
          </tr>
           <tr>
            <th>City</th>
            <th><?php echo $val1[city];?></th>
          </tr>
           <tr>
            <th>State</th>
            <th><?php echo $val1[state];?></th>
          </tr>
           <tr>
            <th>Country</th>
            <th><?php echo $val1[country];?></th>
          </tr>
          <tr>
            <th>Pincode</th>
            <th><?php echo $val1[pincode];?></th>
          </tr>
          <tr>
            <th>Payment Mode</th>
            <th><?php
            if($val1[pay_mode]==1){
                echo "Cash on Delievery";
            }elseif($val1[pay_mode]==2){
                echo "Online Mode";
            }else{
                echo "-";
            }
            ?></th>
          </tr>
          <tr>
            <th>Total Bill Price</th>
            <th><?php echo "$".$val1[bill_price];?></th>
          </tr>
          <tr>
            <th>Pincode</th>
            <th><?php echo $val1[coins];?></th>
          </tr>
        </thead>
        <tbody>
          
          
        </tbody>
      </table>
	</div>
	</div>
	<!--<div class="row-fluid">-->
	<!--	<div class="span6">-->
	<!--	<table class="table table-bordered">-->
 <!--       <thead>-->
 <!--         <tr>-->
 <!--           <th>#</th>-->
 <!--           <th>First Name</th>-->
 <!--           <th>Last Name</th>-->
 <!--           <th>Username</th>-->
 <!--         </tr>-->
 <!--       </thead>-->
 <!--       <tbody>-->
 <!--         <tr>-->
 <!--           <td rowspan="2">1</td>-->
 <!--           <td>Mark</td>-->
 <!--           <td>Otto</td>-->
 <!--           <td>@mdo</td>-->
 <!--         </tr>-->
 <!--         <tr>-->
 <!--           <td>Mark</td>-->
 <!--           <td>Otto</td>-->
 <!--           <td>@TwBootstrap</td>-->
 <!--         </tr>-->
 <!--         <tr>-->
 <!--           <td>2</td>-->
 <!--           <td>Jacob</td>-->
 <!--           <td>Thornton</td>-->
 <!--           <td>@fat</td>-->
 <!--         </tr>-->
	<!--	  <tr>-->
 <!--           <td>3</td>-->
 <!--           <td>Jacob</td>-->
 <!--           <td>Thornton</td>-->
 <!--           <td>@fat</td>-->
 <!--         </tr>-->
	<!--	  <tr>-->
 <!--           <td>4</td>-->
 <!--           <td>Jacob</td>-->
 <!--           <td>Thornton</td>-->
 <!--           <td>@fat</td>-->
 <!--         </tr>-->
	<!--	  <tr>-->
 <!--           <td>5</td>-->
 <!--           <td>Jacob</td>-->
 <!--           <td>Thornton</td>-->
 <!--           <td>@fat</td>-->
 <!--         </tr>-->
 <!--         <tr>-->
 <!--           <td>6</td>-->
 <!--           <td colspan="2">Larry the Bird</td>-->
 <!--           <td>@twitter</td>-->
 <!--         </tr>-->
 <!--       </tbody>-->
 <!--     </table>-->
	<!--	</div>-->
	<!--	<div class="span6">-->
	<!--	<table class="table table-condensed">-->
 <!--       <thead>-->
 <!--         <tr>-->
 <!--           <th>#</th>-->
 <!--           <th>First Name</th>-->
 <!--           <th>Last Name</th>-->
 <!--           <th>Username</th>-->
 <!--         </tr>-->
 <!--       </thead>-->
 <!--       <tbody>-->
 <!--         <tr>-->
 <!--           <td>1</td>-->
 <!--           <td>Mark</td>-->
 <!--           <td>Otto</td>-->
 <!--           <td>@mdo</td>-->
 <!--         </tr>-->
 <!--         <tr>-->
		  
 <!--           <td>2</td>-->
 <!--           <td>Jacob</td>-->
 <!--           <td>Thornton</td>-->
 <!--           <td>@fat</td>-->
 <!--         </tr>-->
 <!--         <tr>-->
 <!--           <td>3</td>-->
 <!--           <td colspan="2">Larry the Bird</td>-->
 <!--           <td>@twitter</td>-->
 <!--         </tr>-->
 <!--       </tbody>-->
 <!--     </table>-->
	<!--  <br/>-->
	<!--  <table class="table table-striped table-bordered table-condensed">-->
 <!--       <thead>-->
 <!--         <tr>-->
 <!--           <th></th>-->
 <!--           <th colspan="2">Full name</th>-->
 <!--           <th></th>-->
 <!--         </tr>-->
 <!--         <tr>-->
 <!--           <th>#</th>-->
 <!--           <th>First Name</th>-->
 <!--           <th>Last Name</th>-->
 <!--           <th>Username</th>-->
 <!--         </tr>-->
 <!--       </thead>-->
 <!--       <tbody>-->
 <!--         <tr>-->
 <!--           <td>1</td>-->
 <!--           <td>Mark</td>-->
 <!--           <td>Otto</td>-->
 <!--           <td>@mdo</td>-->
 <!--         </tr>-->
 <!--         <tr>-->
 <!--           <td>2</td>-->
 <!--           <td>Jacob</td>-->
 <!--           <td>Thornton</td>-->
 <!--           <td>@fat</td>-->
 <!--         </tr>-->
 <!--         <tr>-->
 <!--           <td>3</td>-->
 <!--           <td colspan="2">Larry the Bird</td>-->
 <!--           <td>@twitter</td>-->
 <!--         </tr>-->
 <!--       </tbody>-->
 <!--     </table>-->
	<!--	</div>-->
	<!--</div>-->
</section>

</div>
</div>
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