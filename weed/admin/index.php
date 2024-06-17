<?php 
// Dashboard file created by Mehul Sonagara # 17/3/2017
include('../system/config.inc.php');
include('function/index.php');
$headTitle = "Admin Dashboard";
$pageName = "index";
?>
<?php 
    include('include/header.php');
?>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
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
                                    <a href="index.html">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Dashboard</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">    
                                <div class="pull-right tooltips btn btn-sm">
                                    <span class="thin uppercase hidden-xs"><?php echo date('F d, Y'); ?></span>   
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Admin Dashboard
<!--                            <small>statistics, charts, recent events and reports</small>-->
                        </h1>
                        <?php if(checkSuccessMessage()) { ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                            <?php echo getSuccessMessage(); unsetSuccessMessage(); ?>
                        </div>              
                        <?php } ?>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp">
                                                <span data-counter="counterup" data-value="<?php echo $totalstores; ?>">0</span>
<!--                                                <small class="font-green-sharp">$</small>-->
                                            </h3>
                                            <small>TOTAL STORES</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
                                                <span class="sr-only">100% progress</span>
                                            </span>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-red-haze">
                                                <span data-counter="counterup" data-value="<?php echo $totaldrivers; ?>">0</span>
<!--                                                <small class="font-green-sharp">$</small>-->
                                            </h3>
                                            <small>TOTAL DRIVERS</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
                                                <span class="sr-only">100% change</span>
                                            </span>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-blue-sharp">
                                                <span data-counter="counterup" data-value="<?php echo $totalusers; ?>">0</span>
                                            </h3>
                                            <small>TOTAL USERS</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-user"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                                                <span class="sr-only">100% grow</span>
                                            </span>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 ">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-purple-soft">
                                                <span data-counter="counterup" data-value="<?php echo $totalorders; ?>">0</span>
                                            </h3>
                                            <small>TOTAL ORDERS</small>
                                        </div>
                                        <div class="icon">                                            
                                            <i class="icon-basket"></i>
                                        </div>
                                    </div>
                                    <div class="progress-info">
                                        <div class="progress">
                                            <span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">
                                                <span class="sr-only">100% change</span>
                                            </span>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">                            
                            
                            <div class="col-md-6">
                                <!-- BEGIN MARKERS PORTLET-->
                                <div class="portlet light portlet-fit bordered" style="height: 507px;">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-blue"></i>
                                            <span class="caption-subject font-blue bold uppercase">stores</span>
                                        </div>                                        
                                    </div>
                                    <div class="portlet-body">
                                        <div id="gmap_marker" class="gmaps" style="height: 400px;"> </div>
                                    </div>
                                </div>
                                <!-- END MARKERS PORTLET-->
                            </div>
                            
                            <div class="col-md-6">
                                <!-- BEGIN MARKERS PORTLET-->
                                <div class="portlet light portlet-fit bordered" style="height: 507px;">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-blue"></i>
                                            <span class="caption-subject font-blue bold uppercase">drivers</span>
                                        </div>                                        
                                    </div>
                                    <div class="portlet-body">
                                        <div id="gmap_marker_driver" class="gmaps" style="height: 400px;"> </div>
                                    </div>
                                </div>
                                <!-- END MARKERS PORTLET-->
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Begin: life time stats -->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-share font-blue"></i>
                                            <span class="caption-subject font-blue bold uppercase">Overview</span>
<!--                                            <span class="caption-helper">report overview...</span>-->
                                        </div>                                        
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tabbable-line">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#overview_1" data-toggle="tab"> Top Selling </a>
                                                </li>                                               
                                                <li>
                                                    <a href="#overview_3" data-toggle="tab"> Top Customers </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> Orders
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right" id="order_list">
                                                        <li>
                                                            <a href="#overview_4" data-toggle="tab" ordertype="latest">
                                                                <i class="icon-bell"></i> Latest Orders </a>
                                                        </li>
                                                        <li>
                                                            <a href="#overview_4" data-toggle="tab" ordertype="pending">
                                                                <i class="icon-info"></i> Pending Orders </a>
                                                        </li>
                                                        <li>
                                                            <a href="#overview_4" data-toggle="tab" ordertype="inprocess">
                                                                <i class="icon-settings"></i> Inprocess Orders </a>
                                                        </li>
                                                        <li>
                                                            <a href="#overview_4" data-toggle="tab" ordertype="completed">
                                                                <i class="icon-speech"></i> Completed Orders </a>
                                                        </li>                                                        
                                                        
                                                    </ul>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="overview_1">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th> Product Name </th>
                                                                    <th> Price </th>
                                                                    <th> Sold </th>
                                                                    <th> </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php for($i=0;$i<count($topproducts);$i++) {?>
                                                                    <tr>
                                                                        <td>
                                                                            <a href="javascript:;"> <?php echo $topproducts[$i]['name']; ?> </a>
                                                                        </td>
                                                                        <td> $<?php echo $topproducts[$i]['price']; ?> </td>
                                                                        <td> <?php echo $topproducts[$i]['totalsell']; ?> </td>
                                                                        <td>
                                                                            <a href="javascript:;" class="btn btn-sm btn-default pr-detail" data-id="<?php echo $topproducts[$i]['id']; ?>">
                                                                                <i class="fa fa-search"></i> View </a>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>                                                               
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>                                                
                                                <div class="tab-pane" id="overview_3">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th> Customer Name </th>
                                                                    <th> Total Orders </th>
                                                                    <th> Total Amount </th>
                                                                    <th> </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php for($i=0;$i<count($newcustomers);$i++) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <a href="javascript:;"> <?php echo $newcustomers[$i]['name']; ?></a>
                                                                        </td>
                                                                        <td> <?php echo $newcustomers[$i]['totalorder']; ?> </td>
                                                                        <td> <?php echo ($newcustomers[$i]['totalprice']) ? "$".$newcustomers[$i]['totalprice'] : "$0"; ?> </td>
                                                                        <td>
                                                                            <a href="javascript:;" class="btn btn-sm btn-default user-detail" data-id="<?php echo $newcustomers[$i]['u_id']; ?>">
                                                                                <i class="fa fa-search"></i> View </a>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="overview_4">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th> Customer </th>
                                                                    <th> Date </th>
                                                                    <th> Amount </th>
                                                                    <th> Status </th>
                                                                    <th> </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>                                                                

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End: life time stats -->
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption caption-md">
                                            <i class="icon-bar-chart font-dark hide"></i>
                                            <span class="caption-subject font-dark bold uppercase">Latest Orders</span>                                            
                                        </div>                                       
                                    </div>
                                    <div class="portlet-body">
                                        <div class="scroller" style="height: 338px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                            <div class="general-item-list">
                                                <?php for($i=0;$i<count($latestorders);$i++) { ?>
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img style="width:35px;" class="item-pic rounded" src="<?php echo USER_UPLOAD_URL.$latestorders[$i]['image']; ?>">
                                                            <a target="_blank" href="order_view.php?id=<?php echo $latestorders[$i]['orderid']; ?>" class="item-name primary-link"><?php echo $latestorders[$i]['name']; ?></a>
                                                            <span class="item-label"><?php echo date('d F, Y',strtotime($latestorders[$i]['order_date'])); ?> | $<?php echo $latestorders[$i]['final_total']; ?> </span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-<?php echo $latestorders[$i]['statusclass']; ?>"></span> <?php echo $latestorders[$i]['status']; ?></span>
                                                    </div>                                                    
                                                </div>
                                                <?php } ?>
<!--                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="../assets/pages/media/users/avatar4.jpg">
                                                            <a href="" class="item-name primary-link">Nick Larson</a>
                                                            <span class="item-label">16 Mar, 2017 | $30</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-warning"></span> Pending</span>
                                                    </div>                                                    
                                                </div>
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="../assets/pages/media/users/avatar3.jpg">
                                                            <a href="" class="item-name primary-link">Mark</a>
                                                            <span class="item-label">12 Mar, 2017 | $50</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-warning"></span>Pending</span>
                                                    </div>                                                    
                                                </div>
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="../assets/pages/media/users/avatar6.jpg">
                                                            <a href="" class="item-name primary-link">Nick Larson</a>
                                                            <span class="item-label">12 Mar, 2017 | $60</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-primary"></span> Inprocess</span>
                                                    </div>                                                   
                                                </div>                                                
                                                <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                            <img class="item-pic rounded" src="../assets/pages/media/users/avatar2.jpg">
                                                            <a href="" class="item-name primary-link">Larry</a>
                                                            <span class="item-label">11 Mar, 2017 | $80</span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-success"></span>Success</span>
                                                    </div>
                                                    
                                                </div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        <!-- /.modal -->
        <div class="modal fade bs-modal-lg" id="detail" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Product</h4>
                    </div>
                    <div class="modal-body modal-detail">                         
                                              
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
<!--                        <button type="button" class="btn green">Save changes</button>-->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        
        <!-- /.modal -->
        <div class="modal fade bs-modal-lg" id="detail1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">User</h4>
                    </div>
                    <div class="modal-body modal-detail1">                         
                                              
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
<!--                        <button type="button" class="btn green">Save changes</button>-->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
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
        <script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>   
        <script src="../assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
       
        <script src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyBHVb8KglxgjastSPBA4qZ2B3pJgPPmDus" type="text/javascript"></script>
        <script src="../assets/global/plugins/gmaps/gmaps.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <?php 
            include('include/footer_script2.php');
        ?>
        <script>
            var locations = [ <?php echo $locstr; ?>];
            var locations_dr = [ <?php echo $locstr1; ?>];
            var MapsGoogle = function () {
                    var mapBasic = function () {
                        new GMaps({
                            div: '#gmap_marker',
                            lat: <?php echo $latitude; ?>,
                            lng: <?php echo $longitude; ?>
                            
                        });
                        new GMaps({
                            div: '#gmap_marker_driver',
                            lat: <?php echo $latitude_dr; ?>,
                            lng: <?php echo $longitude_dr; ?>
                            
                        });
                    }

                    var mapMarker = function () {
                        var map = new GMaps({
                            div: '#gmap_marker',
                           lat: <?php echo $latitude; ?>,
                           lng: <?php echo $longitude; ?>,
                           scrollwheel: false,
                        });
                     for (i = 0; i < locations.length; i++) { 
                        map.addMarker({
                            lat: locations[i][1],
                            lng: locations[i][2],
                            title: locations[i][0],
                            infoWindow: {
                                content: '<span style="color:#000">'+locations[i][0]+'</span>'
                            }
                        });
                      }
                        map.setZoom(6);
                    }
                    
                    var mapMarker1 = function () {
                        var map = new GMaps({
                            div: '#gmap_marker_driver',
                           lat: <?php echo $latitude_dr; ?>,
                           lng: <?php echo $longitude_dr; ?>,
                           scrollwheel: false,
                        });
                     for (i = 0; i < locations_dr.length; i++) { 
                        map.addMarker({
                            lat: locations_dr[i][1],
                            lng: locations_dr[i][2],
                            title: locations_dr[i][0],
                            infoWindow: {
                                content: '<span style="color:#000"><b>'+locations_dr[i][0]+'</b><br>'+locations_dr[i][3]+'</span>'
                            }
                        });
                      }
                        map.setZoom(6);
                    }

                    return {
                        //main function to initiate map samples
                        init: function () {                            
                            mapMarker();    
                            mapMarker1();
                        }

                    };

                }();

                jQuery(document).ready(function() {
                    MapsGoogle.init();
                });
                
                
        </script>
    </body>

</html>