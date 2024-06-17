<?php 
// Dashboard file created by Mehul Sonagara # 17/3/2017
include('../system/config.inc.php');
//include('function/order.php');
checkAdminLogin();

$db->join("user u", "o.user_id=u.id", "LEFT");
$db->where ("o.status", "pending", "=");
$db->where ("o.driver_id","0","=");
							
$orders = $db->get ("orders o", null, "o.*,u.name as customer");

$headTitle = "Pending Orders";
$pageName = "pending";
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
                                    <span>Pending Orders</span>
                                </li>
                            </ul>
                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">Pending Order List 
                            <?php if(isset($store_name)) {?>
                            of Store &nbsp;<b><?php echo $store_name; ?></b>
                            <?php } ?>
                            <?php if(isset($driver_name)) {?>
                            Driver &nbsp;<b><?php echo $driver_name; ?></b>
                            <?php } ?>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                                
                                <!-- Begin: life time stats -->
                                <div class="portlet light portlet-fit portlet-datatable bordered">
                                    
                                    <div class="portlet-body">
                                        <div class="table-container">
                                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                                <thead>
                                                    <tr>
                                                        <th class="all">Code#</th>
                                                        <th class="">Purchased On</th>
                                                        <th class="all">Customer</th>
                                                        <th class="min-phone-l">Ship To</th>
                                                        <th class="min-phone-l">Sub Total</th>
                                                        <th class="all">Final Total</th>  
                                                        <th class="all">Status</th>
                                                        <th class="all">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    
                                                     for($i=0;$i<count($orders);$i++) {
                                                        $statusClass =  getOrderStatusClass($orders[$i]['status']);
                                                        
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $orders[$i]['order_code']; ?></td>
                                                        <td><?php echo date('d-m-Y',strtotime($orders[$i]['order_date'])); ?></td>
                                                        <td><?php echo $orders[$i]['customer']; ?></td>
                                                        <td><?php echo $orders[$i]['delivery_address']; ?></td>
                                                        <td>$<?php echo $orders[$i]['sub_total']; ?></td>
                                                        <td>$<?php echo $orders[$i]['final_total']; ?></td>                                                        
                                                        <td><span class="label label-sm label-<?php echo $statusClass; ?>"><?php echo $orders[$i]['status']; ?></span></td>
                                                        <td>
                                                            <a href="pending_view.php?id=<?php echo $orders[$i]['id']; ?>" class="btn btn-sm btn-circle btn-default btn-editable"><i class="fa fa-search"></i> View</a>                                                                    
                                                        </td>
                                                    </tr>
                                                    <?php } ?>                                                                                    
                                                </tbody>
                                            </table>
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