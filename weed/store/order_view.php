<?php 
// Dashboard file created by Mehul Sonagara # 17/3/2017
include('../system/config.inc.php');
//include('function/index.php');
checkStoreLogin();

$headTitle = "Store Order";
$pageName = "order";

$db->join("user u", "o.user_id=u.id", "LEFT");
$db->join("driver d", "o.driver_id=d.id", "LEFT");
$db->where ("o.store_id", $_SESSION['store']['id']);
$db->where ("o.id", $_GET['id']);
$order = $db->get ("orders o", Array (0, 1), "o.*,u.name as customer,u.email,u.zipcode,u.mobile,u.address,d.name as driver, d.email as driver_email, d.address as driver_address, d.mobile as driver_mobile,d.zipcode as driver_zipcode");
#echo "<pre>"; print_r($order); exit;
if($db->count <= 0) {
    header("location:order.php");
    die();
}

$db->join("products p", "op.product_id=p.id","LEFT");
$db->where("op.order_id",$_GET['id']);
$products = $db->get ("order_products op",null,"op.product_id,op.price,op.quantity,op.attribute_description,p.name");

?>
<?php 
    include('include/header.php');
?>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <?php
                include('include/top_headbar.php');
            ?> 
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <?php
                    include('include/sidebar.php');
                ?> 
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->                        
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.php">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="order.php">Orders</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Order #<?php echo $order[0]['order_code']; ?> </span>
                                </li>
                            </ul>
                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Order View                           
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Begin: life time stats -->
                                <div class="portlet light portlet-fit portlet-datatable bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject font-dark sbold uppercase"> Order #<?php echo $order[0]['order_code']; ?>
                                                <span class="hidden-xs">| <?php echo date('d-m-Y H:i:s',strtotime($order[0]['order_date'])); ?> </span>
                                            </span>
                                        </div>
<!--                                        <div class="actions">                                            
                                            <div class="btn-group">
                                                <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                                    <i class="fa fa-share"></i>
                                                    <span class="hidden-xs"> Tools </span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">                                                    
                                                    <li>
                                                        <a href="javascript:;"> Print Invoices </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>-->
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tabbable-line">
                                            <ul class="nav nav-tabs nav-tabs-lg">
                                                <li class="active">
                                                    <a href="#tab_1" data-toggle="tab"> Details </a>
                                                </li>                                                
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_1">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="portlet yellow-crusta box">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-cogs"></i>Order Details </div>
                                                                    <div class="actions">
                                                                   <!--     <a href="javascript:;" class="btn btn-default btn-sm">
                                                                            <i class="fa fa-pencil"></i> Edit </a>-->
                                                                    </div>
                                                                </div>
                                                                <div class="portlet-body">
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Order #: </div>
                                                                        <div class="col-md-7 value"> <?php echo $order[0]['order_code']; ?>
<!--                                                                            <span class="label label-info label-sm"> Email confirmation was sent </span>-->
                                                                        </div>
                                                                    </div>
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Order Date & Time: </div>
                                                                        <div class="col-md-7 value"> <?php echo date('d-m-Y H:i:s',strtotime($order[0]['order_date'])); ?> </div>
                                                                    </div>
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Order Status: </div>
                                                                        <div class="col-md-7 value">
                                                                            <span class="label label-<?php echo getOrderStatusClass($order[0]['status']); ?>"> <?php echo $order[0]['status']; ?> </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Grand Total: </div>
                                                                        <div class="col-md-7 value"> $<?php echo $order[0]['final_total']; ?> </div>
                                                                    </div>
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Payment Information: </div>
                                                                        <div class="col-md-7 value"> - </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="portlet red-sunglo box">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-cogs"></i>Shipping Address </div>
                                                                    <div class="actions">
                                                                <!--        <a href="javascript:;" class="btn btn-default btn-sm">
                                                                            <i class="fa fa-pencil"></i> Edit </a>-->
                                                                    </div>
                                                                </div>
                                                                <div class="portlet-body">
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Name: </div>
                                                                        <div class="col-md-7 value"> <?php echo $order[0]['delivery_name']; ?></div>
                                                                    </div>
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Phone: </div>
                                                                        <div class="col-md-7 value"> <?php echo $order[0]['delivery_phone']; ?></div>
                                                                    </div>
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Address: </div>
                                                                        <div class="col-md-7 value"> <?php echo $order[0]['delivery_address']; ?></div>
                                                                    </div>                                                                                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="portlet blue-hoki box">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-cogs"></i>Customer Information </div>
                                                                    <div class="actions">
                                                                   <!--     <a href="javascript:;" class="btn btn-default btn-sm">
                                                                            <i class="fa fa-pencil"></i> Edit </a>-->
                                                                    </div>
                                                                </div>
                                                                <div class="portlet-body">
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Customer Name: </div>
                                                                        <div class="col-md-7 value"> <?php echo $order[0]['customer']; ?></div>
                                                                    </div>
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Email: </div>
                                                                        <div class="col-md-7 value">  <?php echo $order[0]['email']; ?> </div>
                                                                    </div>
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Address: </div>
                                                                        <div class="col-md-7 value">  <?php echo $order[0]['address']; ?> </div>
                                                                    </div>
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Zipcode: </div>
                                                                        <div class="col-md-7 value">  <?php echo $order[0]['zipcode']; ?> </div>
                                                                    </div>
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Phone Number: </div>
                                                                        <div class="col-md-7 value"> <?php echo $order[0]['mobile']; ?> </div>
                                                                    </div>                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6 col-sm-12">
                                                        <div class="portlet blue-hoki box">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-cogs"></i>Driver Information </div>
                                                                    <div class="actions">
                                                                   <!--     <a href="javascript:;" class="btn btn-default btn-sm">
                                                                            <i class="fa fa-pencil"></i> Edit </a>-->
                                                                    </div>
                                                                </div>
                                                                <div class="portlet-body">
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Driver Name: </div>
                                                                        <div class="col-md-7 value"> <?php echo $order[0]['driver']; ?></div>
                                                                    </div>
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Email: </div>
                                                                        <div class="col-md-7 value">  <?php echo $order[0]['driver_email']; ?> </div>
                                                                    </div>
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Address: </div>
                                                                        <div class="col-md-7 value">  <?php echo $order[0]['driver_address']; ?> </div>
                                                                    </div>
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Zipcode: </div>
                                                                        <div class="col-md-7 value">  <?php echo $order[0]['driver_zipcode']; ?> </div>
                                                                    </div>
                                                                    <div class="row static-info">
                                                                        <div class="col-md-5 name"> Phone Number: </div>
                                                                        <div class="col-md-7 value"> <?php echo $order[0]['driver_mobile']; ?> </div>
                                                                    </div>                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="portlet grey-cascade box">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-cogs"></i>Shopping Cart </div>
                                                                    <div class="actions">
<!--                                                                        <a href="javascript:;" class="btn btn-default btn-sm">
                                                                            <i class="fa fa-pencil"></i> Edit </a>-->
                                                                    </div>
                                                                </div>
                                                                <div class="portlet-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-hover table-bordered table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th> Product </th>
                                                                                    <th> Attributes </th>                                                                                    
                                                                                    <th> Price </th>
                                                                                    <th> Quantity </th>                                                                                    
                                                                                    <th> Total </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php 
                                                                                $subtotal = 0;
                                                                                for($i=0;$i<count($products);$i++) { 
                                                                                $product_total = $products[$i]['quantity']*$products[$i]['price'];     
                                                                                $subtotal = $subtotal + $product_total;  
                                                                                ?>                                                                                    
                                                                                <tr>
                                                                                    <td><a href="product_edit.php?id=<?php echo $products[$i]['product_id'] ?>"> <?php echo $products[$i]['name'] ?> </a></td>
                                                                                    <td><?php echo $products[$i]['attribute_description'] ?> </td>
                                                                                    <td> $<?php echo $products[$i]['price'] ?> </td>
                                                                                    <td> <?php echo $products[$i]['quantity'] ?>  </td>                                                                                    
                                                                                    <td> $<?php echo ($products[$i]['quantity']*$products[$i]['price']) ?> </td>
                                                                                </tr>
                                                                                <?php } ?>                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6"> </div>
                                                        <div class="col-md-6">
                                                            <div class="well">
                                                                <div class="row static-info align-reverse">
                                                                    <div class="col-md-8 name"> Sub Total: </div>
                                                                    <div class="col-md-3"> $<?php echo $subtotal; ?> </div>
                                                                </div>
                                                                <div class="row static-info align-reverse">
                                                                    <div class="col-md-8 name"> Shipping: </div>
                                                                    <div class="col-md-3"> $<?php echo $order[0]['delivery_charge'];?> </div>
                                                                </div>
                                                                <div class="row static-info align-reverse">
                                                                    <div class="col-md-8 name"> Grand Total: </div>
                                                                    <div class="col-md-3"> $<?php echo ($subtotal+$order[0]['delivery_charge']); ?> </div>
                                                                </div>
<!--                                                                <div class="row static-info align-reverse">
                                                                    <div class="col-md-8 name"> Total Paid: </div>
                                                                    <div class="col-md-3 value"> $1,260.00 </div>
                                                                </div>
                                                                <div class="row static-info align-reverse">
                                                                    <div class="col-md-8 name"> Total Refunded: </div>
                                                                    <div class="col-md-3 value"> $0.00 </div>
                                                                </div>
                                                                <div class="row static-info align-reverse">
                                                                    <div class="col-md-8 name"> Total Due: </div>
                                                                    <div class="col-md-3 value"> $1,124.50 </div>
                                                                </div>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End: life time stats -->
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                <?php 
                    include('include/quick_sidebar.php');
                ?>  
            </div>
            <!-- END CONTAINER -->
            <?php 
                include('include/footer.php');
            ?> 
        </div>
        
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <?php 
            include('include/footer_script1.php');
        ?> 
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <?php 
            include('include/footer_script2.php');
        ?>
    </body>

</html>