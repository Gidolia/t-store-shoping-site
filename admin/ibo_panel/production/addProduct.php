<?php include "config.php";
if(isset($_POST[ad_cat])){
        
        $cid=$_POST[category];
        $abc=$con->query("SELECT * FROM `category` WHERE `cat_id`='$cid'");
        $my=$abc->fetch_assoc();
        $mk="SELECT MAX(p_id) AS max_id FROM `product` ";
        $x=$con->query($mk);
        $fe=$x->fetch_assoc();
       
        if (file_exists("pro1" .$fe['max_id'].".jpg"))
        {
        unlink("pro1" .$fe['max_id'].".jpg");
          echo $fe['max_id'].".jpg" . " already exists. ";
        }
        if(move_uploaded_file($_FILES["img_1"]["tmp_name"], "images/pro1".$fe['max_id'].".jpg"))
    {
        
            $img1="pro1" .$fe['max_id'].".jpg";
            $img2="pro2" .$fe['max_id'].".jpg";
          //  $pid=$fe['p_id'];
            $cid=$_POST['category'];
            $name=$_POST['cat_name'];
            $mrp=$_POST['mrp'];
            $dp=$_POST['dp'];
            $qty=$_POST['qty'];
            $sd=$_POST['short_des'];
            $ls=$_POST['long_des'];
            $dic=$_POST['discount'];
            $unq=$my['unq_id'];
            
    $hg="INSERT INTO `product`(`p_id`, `cat_id`, `unq_id`, `name`, `image1`,  `mrp`, `dp`, `qty`, `short_description`, `long_description`, `date`, `time`) VALUES (NULL,'$cid','$unq','$name','$img1','$mrp','$dp','$qty','$sd','$ls','$date','$time');";
            if($con->query($hg)==TRUE)
            {
                echo "<script>alert('add product Sucessfully');
                       location.href='addProduct.php';</script>";
            }
            else{ 
                echo "<script>alert(' failed please try again');
                      location.href='addProduct.php';</script>";
            }
              
            }else{ 
            echo "<script>alert(' failed img1 not uploaded please try again');
    location.href='addProduct.php';</script>";
                
            }
    }
    
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

    <title>Add Product</title>

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
                    <h3>Add New Product</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post">
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                             <select name="category" class="form-control ">
           <?php
            $yr=0;
            $hfgh="SELECT * FROM `category`";
            $dff=$con->query($hfgh);
            while($tr=$dff->fetch_assoc())
            { $yr++;    ?>
                     <option value="<?php echo $tr['cat_id'];?>"><?php echo $tr['cat_name'];?></option>  

            <?php  }    ?>                
                          </select>
                        </div>
                      </div>
                     
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Product Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="cat_name" required="required" class="form-control ">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Image 1<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" name="img_1" required="required" class="form-control ">
                        </div>
                      </div>
                      <!--<div class="item form-group">-->
                      <!--  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Image 2<span class="required">*</span>-->
                      <!--  </label>-->
                      <!--  <div class="col-md-6 col-sm-6 ">-->
                      <!--    <input type="file" name="img_2" required="required" class="form-control ">-->
                      <!--  </div>-->
                      <!--</div>-->
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">MRP <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="mrp" required="required" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">DP <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="dp" required="required" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Available Qty <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="qty" required="required" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Short Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="short_des" required="required" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Long Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="long_des" required="required" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Discount <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="discount" required="required" class="form-control ">
                          
                        </div>
                      </div>
                      <!--<div class="item form-group">-->
                      <!--  <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Include In Top Category <span class="required">*</span>-->
                      <!--  </label>-->
                      <!--  <div class="col-md-6 col-sm-6 ">-->
                      <!--  <select name="yesn" class="form-control ">-->
                      <!--        <option>No</option>-->
                      <!--        <option>Yes</option>-->
                      <!--    </select>-->
                          
                      <!--   </div>-->
                      <!--</div>-->
                      
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="ad_cat" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                      
            </form>
    <?php
   
    ?>
            
            </div>
            </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Product List</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
            <br>
        <table class="table table-striped table-bordered" id="datatable">
            <thead><tr><th>ID</th><th>Name</th><th>Image1</th><th>Action</th></tr></thead>
            <?php
            $a=0;
            $g="SELECT * FROM `product`";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; ?>
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo $d['name'];?></td>
                <th><img src="./images/<?php echo $d['image1'];?>" height="100px" weight="100px"></th>
                <!--<th><img src="./images/<?php echo $d['image2'];?>" height="100px" weight="100px"></th>-->
                <td><a href="edit_product.php?id=<?php echo $d['p_id'];?> "><button class="btn btn-success">Edit</button></a>
                    <a href="delete_product.php?id=<?php echo $d['p_id'];?>"><button class="btn btn-danger" >Delete</button></a></td>
                
            </tr>
            <?php
            }?>
        </table>
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
