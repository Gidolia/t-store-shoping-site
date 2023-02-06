<?php include "config.php";
    $mk="SELECT * FROM `product` WHERE `p_id`='".$_GET['id']."'";
    $x=$con->query($mk);
    $fe=$x->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Edit Product </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include "include/sidebar.php";?>
        <!-- top navigation -->
        <?php include "include/header.php";?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Product </h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Edit Product</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Edit Product <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="name"  class="form-control " value="<?php echo $fe['name'];?>">
                          
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">M.R.P<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="mrp"  class="form-control " value="<?php echo $fe['mrp'];?>">
                          
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Discount Price<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="dp"  class="form-control " value="<?php echo $fe['dp'];?>">
                          
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Quantity*<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="qty"  class="form-control " value="<?php echo $fe['qty'];?>">
                          
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Short Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="sd"  class="form-control " value="<?php echo $fe['short_description'];?>">
                          
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Long Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="ld"  class="form-control " value="<?php echo $fe['long_description'];?>">
                          
                        </div>
                      </div>
                      <div class="item form-group">

                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name" va>Image 1<span class="">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <img src="./images/<?php echo $fe['image1'];?>" height="100px" style="border-radius: 10px;">
                          <input type="file" name="new_img"  class="form-control " value="<?php echo $fe['image1'];?>" required>
                        </div>
                      </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="edit_prod" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                      
            </form>
<?php
    if(isset($_POST[edit_prod])){
        
        $name=$_POST['upd_name'];
        $id=rand(1000,99999);
        $Mypic=$_FILES['new_img'];
        $filename="product".$id.".jpg";
        $dir="./images/";
        $NewLocation=$dir.$filename;
        move_uploaded_file($Mypic['tmp_name'], $NewLocation);
        
         $res=$con->query("UPDATE `product` SET `name`='$_POST[name]',`image1`='$filename',`mrp`='$_POST[mrp]',`dp`='$_POST[dp]',`qty`='$_POST[qty]',`short_description`='$_POST[sd]',`long_description`='$_POST[ld]' WHERE `p_id`='".$_GET['id']."';");
            if($res>0){
               echo "<script>alert('Success! Category Edit Successfully');location.href='addProduct.php';</script>";
            }else{
               echo "<script>alert('Category Update Fail');location.href='edit_product.php?id='.$_GET[id];</script>";
            }             
              
                        
                     
    }
    ?>
            
            </div>
            </div>
            </div>
            </div>
       <!--      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Category List</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
            <br> -->
     <!--    <table class="table table-striped table-bordered" id="datatable">
            <thead><tr><th>ID</th><th>Name</th><th>Images</th><th></th></tr></thead>
            <?php
            $a=0;
            $g="SELECT * FROM `category`";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { 
                $a++; ?>
            <tr>
                <td><?php echo $d['id'];?></td>
                <td><?php echo $d['name'];?></td>
                <th><img src="../../../images/<?php echo $d['image'];?>" height="100px" weight="100px"></th>
                <td><button class="btn btn-success">View Product List</button>
                   <a href="edit_category.php?id=<?php echo $d['id'];?>"> <button class="btn btn-success">Edit</button></a>
                    <a href="delete_category.php?id=<?php echo $d['id'];?>"><button class="btn btn-danger" >Delete</button></a></td>
                
            </tr>
            <?php
            }?>
        </table> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <?php include "include/footer.php";?>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
