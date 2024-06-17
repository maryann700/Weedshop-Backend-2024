<?php 
// Dashboard file created by Mehul Sonagara # 17/3/2017
include('../system/config.inc.php');
include('function/index.php');
$headTitle = "Store Dashboard";
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
                                    <span class="thin uppercase hidden-xs"><?php echo date('F d, Y');?></span>   
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Store Dashboard
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
                                                <span data-counter="counterup" data-value="<?php echo $totalProducts; ?>">0</span>
<!--                                                <small class="font-green-sharp">$</small>-->
                                            </h3>
                                            <small>TOTAL PRODUCTS</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-graph"></i>
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
                                                <span data-counter="counterup" data-value="<?php echo $totalsells ;?>">0</span>
                                                <small class="font-green-sharp">$</small>
                                            </h3>
                                            <small>TOTAL SELLS</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-tag"></i>
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
                                                <span data-counter="counterup" data-value="<?php echo $totalorders ;?>"></span>
                                            </h3>
                                            <small>TOTAL ORDERS</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-basket"></i>
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
                                                <span data-counter="counterup" data-value="<?php echo $totalinprocess ; ?>"></span>
                                            </h3>
                                            <small>IN-PROCESS ORDERS</small>
                                        </div>
                                        <div class="icon">
                                            <i class="icon-user"></i>
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
                                                    <a href="#overview_3" data-toggle="tab"> New Customers </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> Orders
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right" id="order_list">
                                                        <li id="late">
                                                            <a href="#overview_4" data-toggle="tab" ordertype="latest">
                                                                <i class="icon-bell"></i> Latest Orders </a>
                                                        </li>
                                                        <li>
                                                            <a href="#overview_4" data-toggle="tab" ordertype="pending">
                                                                <i class="icon-info"></i> Pending Orders </a>
                                                        </li>
                                                        
                                                        <!--<li class="divider"></li>-->
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
                                                                    <td><?php echo $topproducts[$i]['totalsell']; ?></td>
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
                                                                        <a href="javascript:;"> <?php echo $newcustomers[$i]['name']; ?> </a>
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
                            <div class="col-md-6">
                                <!-- Begin: life time stats -->
                                <!-- BEGIN PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption">
                                            <i class="icon-globe font-red"></i>
                                            <span class="caption-subject font-red bold uppercase">SELLS</span>
                                        </div>                                        
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="portlet_ecommerce_tab_1">
                                                <div id="statistics_1" class="chart"> </div>
                                            </div>

                                        </div>
                                        <div class="well margin-top-20">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                    <span class="label label-success"> Total Sells: </span>
                                                    <h3>$<?php echo $totalsells ;?></h3>
                                                </div>
                                                
                                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                    <span class="label label-warning"> Orders: </span>
                                                    <h3><?php echo $totalorders ;?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End: life time stats -->
                            </div>
                        </div>
                        
                        <div class="row">
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
                                                            <span class="item-label"><?php echo date('d F, Y',strtotime($latestorders[$i]['order_date'])); ?> | $<?php echo $latestorders[$i]['final_total']; ?></span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-<?php echo $latestorders[$i]['statusclass']; ?>"></span> <?php echo $latestorders[$i]['status']; ?></span>
                                                    </div>                                                    
                                                </div>
												<?php } ?>
                                                
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
        <!-- END PAGE LEVEL PLUGINS -->
        <?php 
            include('include/footer_script2.php');
        ?>
        <script>
            var EcommerceDashboard = function() {

            function showTooltip(x, y, labelX, labelY) {
                $('<div id="tooltip" class="chart-tooltip">' + (labelY.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')) + 'USD<\/div>').css({
                    position: 'absolute',
                    display: 'none',
                    top: y - 40,
                    left: x - 60,
                    border: '0px solid #ccc',
                    padding: '2px 6px',
                    'background-color': '#fff'
                }).appendTo("body").fadeIn(200);
            }

                var initChart1 = function() {

                    var data = [
                        <?php echo $monthtotalsell; ?>
                    ];

                    var plot_statistics = $.plot(
                        $("#statistics_1"), [{
                            data: data,
                            lines: {
                                fill: 0.6,
                                lineWidth: 0
                            },
                            color: ['#f89f9f']
                        }, {
                            data: data,
                            points: {
                                show: true,
                                fill: true,
                                radius: 5,
                                fillColor: "#f89f9f",
                                lineWidth: 3
                            },
                            color: '#fff',
                            shadowSize: 0
                        }], {

                            xaxis: {
                                tickLength: 0,
                                tickDecimals: 0,
                                mode: "categories",
                                min: 0,
                                font: {
                                    lineHeight: 15,
                                    style: "normal",
                                    variant: "small-caps",
                                    color: "#6F7B8A"
                                }
                            },
                            yaxis: {
                                ticks: 3,
                                tickDecimals: 0,
                                tickColor: "#f0f0f0",
                                font: {
                                    lineHeight: 15,
                                    style: "normal",
                                    variant: "small-caps",
                                    color: "#6F7B8A"
                                }
                            },
                            grid: {
                                backgroundColor: {
                                    colors: ["#fff", "#fff"]
                                },
                                borderWidth: 1,
                                borderColor: "#f0f0f0",
                                margin: 0,
                                minBorderMargin: 0,
                                labelMargin: 20,
                                hoverable: true,
                                clickable: true,
                                mouseActiveRadius: 6
                            },
                            legend: {
                                show: false
                            }
                        }
                    );

                    var previousPoint = null;

                    $("#statistics_1").bind("plothover", function(event, pos, item) {
                        $("#x").text(pos.x.toFixed(2));
                        $("#y").text(pos.y.toFixed(2));
                        if (item) {
                            if (previousPoint != item.dataIndex) {
                                previousPoint = item.dataIndex;

                                $("#tooltip").remove();
                                var x = item.datapoint[0].toFixed(2),
                                    y = item.datapoint[1].toFixed(2);

                                showTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1]);
                            }
                        } else {
                            $("#tooltip").remove();
                            previousPoint = null;
                        }
                    });

                }
                return {

                    //main function
                    init: function() {
                        initChart1();
                    }

                };

            }();

            $(document).ready(function() {    
               EcommerceDashboard.init();
            });
            </script>
    </body>

</html>