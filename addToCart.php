<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cart</title>
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
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART</h3>	
	<hr class="soft"/>
	<table class="table table-bordered table-responsive-sm ">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Product(Category)</th>
                  <th>Quantity/Update/Remove</th>
                   <th>M.R.P</th>
                  <!--<th>Discount Price</th>-->
                  <th>Total</th>
				</tr>
              </thead>
              <tbody>
                  <?php
                  $r=$con->query("SELECT * FROM `add_cart` WHERE `c_id`='$d_detail[c_id]'");
                  while($val=$r->fetch_assoc()){
                  ?>
                <tr>
                  <td> <img width="60" src="admin/ibo_panel/production/images/<?php echo $val[p_image]?>" alt=""/></td>
                  <td><?php echo $val[p_name]?> (<?php echo $val[cat_name]?>)
                  </td>
				  <td>
					<div class="input-append">
					  <form method="post" action="update_cart.php">
					  <input class="iquantity" style="max-width:34px"  type="number" min="1" max="10" value="<?php echo $val[p_qty]?>" onchange="subTotal()" name="qty">
					  
					  <input type="hidden" value="<?php echo $val[ac_id]?>" name="id">
					  <input type="hidden" value="<?php echo $val[p_id]?>" name="pid">
					  <input type="hidden" value="<?php echo $val[p_mrp]?>" name="dp">
					  <a ><button class="btn btn-primary" type="submit" name="upd"><i class="icon-refresh icon-white"></i></button></a>
					   <a ><button class="btn btn-danger" type="submit" name="remove"><i class="icon-remove icon-white"></i></button></a>
					  
					 </div>
				  </td>
				  <td>$<?php echo $val[p_mrp]?><input type="hidden" value="<?php echo $val[p_mrp]?>" class="iprice"></td>
                  <!--<td>$<?php echo $val[p_dp]?></td>-->
                  
                  <td >$<span class="itotal"></span></td>
                  <!--<td></td>-->
                </tr>
                <?php
                  }
                ?>
			    <tr>
                  <td colspan="4" style="text-align:right"><strong>TOTAL =</strong></td>
                  <td class="label label-important" style="display:block" >$<span id="gtotal"></span></td>
                </tr>
				</tbody>
            </table>
           
            </form>
	
	<a href="index.php" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="checkout.php"><button  class="btn btn-large pull-right btn-primary" type="submit" name="submit">Proceed to Checkout </button> </a>
	
	
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
<script>
    var gt=0;
    var ht=0;
    var iprice=document.getElementsByClassName("iprice");
    var iquantity=document.getElementsByClassName("iquantity");
    var itotal=document.getElementsByClassName("itotal");
    var gtotal=document.getElementById("gtotal");
   //var htotal=document.getElementsByClassName("iprice");
    
    function subTotal(){
        var gt=0;
        //var ht=0;
        for(i=0;i<iprice.length;i++){
             itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
             //itotal[i].innerText=(iquantity[i].value);
            gt=gt+(iprice[i].value)*(iquantity[i].value);
            //ht=ht+(iprice[i].value);
        }
        gtotal.innerText=gt;
        //htotal.innerText=ht;
    }
    subTotal();
</script>
</html>