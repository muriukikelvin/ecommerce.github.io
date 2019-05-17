
<?php
//ob_start();

    ob_start();

//session_start();

///if (!isset($_SESSION['user_email'])) {
    //echo "<script>window.open('login.php?not_admin=You are not an admin!','_self')</script>";
    //}
//else {

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Zaraa Farm Produce </title>
        <link href="../admin/css/farmer.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Bootstrap Core CSS -->
        <link href="../admin/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../admin/css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../admin/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../admin/css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../admin/css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Zaraa Farm</a>
                </div>
                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="../marketplace.php"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> Online <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>-->
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                           
                            <li>
                                <a href="faccount.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            
                            <li>
                                <a href=""><i class="fa fa-sitemap fa-fw"></i> Manage Your Account<!--<span class="fa arrow"></span>--></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="faccount.php?insert_product">Insert New Product</a>
                                    </li>
                                   <!-- <li>
                                        <a href="">View All Products </a>
                                    </li>-->
                                    <li>
                                        
                                        <ul class="nav nav-third-level">
                                        <!--<li>
                                        <a href="faccount.php?view_customers">View Customers </a>
                                          </li>-->  

                                            <?php // if ($_SESSION['user_role'] == 1) { ?>  
                                            <?php //} ?>
                                            
                                            <li>
                                                <a href="faccount.php?view_orders">View Orders</a>
                                            </li>

                                            <li>
                                                <a href="faccount.php?view_products">View All Products </a>
                                            </li>

                                            <!--<li>
                                                <a href="index.php?view_farmers">View Farmers</a>
                                            </li>-->
                                        
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <ul class="nav nav-second-level">
                                    <!--<li>
                                        <a href="#">Categories</a>
                                    </li>-->
                                    <li>
                                        <a href="">Print </a>
                                    </li>
                                    <li>
                                        
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="orderreport.php">Print Orders </a>
                                            </li>
                                            <!--<li>
                                                <a href="index.php?view_cats">View All Categories </a>
                                            </li>-->
                                           
                                        </ul>
                                    
                                    </li>
                                </ul>
                            <li>
                                <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>  Logout<!--<span class="fa arrow"></span>--></a>
                                
                                <!-- /.nav-second-level -->
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Welcome to Zaraa Farm Produce Marketers</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
          <div id="left">
                <h3 style="color:black; text-align:center;"><?php echo @$_GET['logged_in']; ?></h3>
                        <?php 

                        if (isset($_GET['insert_product'])) {
                            include ("insert_product.php"); 
                        }

                        if (isset($_GET['view_products'])){
                            include ("view_products.php"); 
                        }

                        if (isset($_GET['edit_pro'])) {
                            include ("edit_pro.php"); 
                        }
                        
                       // if (isset($_GET['view_farmers']) ) {
                            // include ("view_farmers.php"); 
                        // }

                        if (isset($_GET['view_customers'])) {
                            include ("view_customers.php"); 
                        }
                         if (isset($_GET['view_orders'])) {
                            include ("view_orders.php"); 
                        }
                        // if (isset($_GET['insert_cat'])) {
                            // include ("insert_cat.php"); 
                        // }
                        // if (isset($_GET['view_cats'])) {
                            //include ("view_cat.php"); 
                        //}
                        // if (isset($_GET['edit_cat'])) {
                            // include ("edit_cat.php"); 
                        // }
                        ?>
                         </div>




            </div>

                <!-- /.row -->
               
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../admin/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../admin/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../admin/js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../admin/js/raphael.min.js"></script>
        <script src="../admin/js/morris.min.js"></script>
        <script src="../admin/js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../admin/js/startmin.js"></script>

    </body>
</html>
