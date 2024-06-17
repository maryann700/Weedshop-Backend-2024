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
                                    <span class="thin uppercase hidden-xs">February 15, 2017</span>   
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
                                                <span data-counter="counterup" data-value="755">0</span>
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
                                                <span data-counter="counterup" data-value="70"></span>
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
                                                <span data-counter="counterup" data-value="6"></span>
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
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="#overview_4" data-toggle="tab">
                                                                <i class="icon-bell"></i> Latest Orders </a>
                                                        </li>
                                                        <li>
                                                            <a href="#overview_4" data-toggle="tab">
                                                                <i class="icon-info"></i> Pending Orders </a>
                                                        </li>
                                                        <li>
                                                            <a href="#overview_4" data-toggle="tab">
                                                                <i class="icon-speech"></i> Completed Orders </a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="#overview_4" data-toggle="tab">
                                                                <i class="icon-settings"></i> Rejected Orders </a>
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
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Apple iPhone 4s - 16GB - Black </a>
                                                                    </td>
                                                                    <td> $625.50 </td>
                                                                    <td> 809 </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Samsung Galaxy S III SGH-I747 - 16GB </a>
                                                                    </td>
                                                                    <td> $915.50 </td>
                                                                    <td> 6709 </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Motorola Droid 4 XT894 - 16GB - Black </a>
                                                                    </td>
                                                                    <td> $878.50 </td>
                                                                    <td> 784 </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Samsung Galaxy Note 4 </a>
                                                                    </td>
                                                                    <td> $925.50 </td>
                                                                    <td> 21245 </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Regatta Luca 3 in 1 Jacket </a>
                                                                    </td>
                                                                    <td> $25.50 </td>
                                                                    <td> 1245 </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Samsung Galaxy Note 3 </a>
                                                                    </td>
                                                                    <td> $925.50 </td>
                                                                    <td> 21245 </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
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
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> David Wilson </a>
                                                                    </td>
                                                                    <td> 3 </td>
                                                                    <td> $625.50 </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Amanda Nilson </a>
                                                                    </td>
                                                                    <td> 4 </td>
                                                                    <td> $12625.50 </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Paul Strong </a>
                                                                    </td>
                                                                    <td> 1 </td>
                                                                    <td> $890.85 </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Jhon Doe </a>
                                                                    </td>
                                                                    <td> 2 </td>
                                                                    <td> $125.00 </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Bill Chang </a>
                                                                    </td>
                                                                    <td> 45 </td>
                                                                    <td> $12,125.70 </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Paul Strong </a>
                                                                    </td>
                                                                    <td> 1 </td>
                                                                    <td> $890.85 </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="overview_4">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th> Customer Name </th>
                                                                    <th> Date </th>
                                                                    <th> Amount </th>
                                                                    <th> Status </th>
                                                                    <th> </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> David Wilson </a>
                                                                    </td>
                                                                    <td> 12 March, 2017 </td>
                                                                    <td> $65.50 </td>
                                                                    <td>
                                                                        <span class="label label-sm label-warning"> Pending </span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Amanda Nilson </a>
                                                                    </td>
                                                                    <td> 12 Mar, 2017 </td>
                                                                    <td> $90.00 </td>
                                                                    <td>
                                                                        <span class="label label-sm label-warning"> Pending </span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Paul Strong </a>
                                                                    </td>
                                                                    <td> 10 Mar, 2017 </td>
                                                                    <td> $110.50 </td>
                                                                    <td>
                                                                        <span class="label label-sm label-success"> Success </span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Jhon Doe </a>
                                                                    </td>
                                                                    <td> 5 Mar, 2017 </td>
                                                                    <td> $125.00 </td>
                                                                    <td>
                                                                        <span class="label label-sm label-success"> Success </span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Bill Chang </a>
                                                                    </td>
                                                                    <td> 25 Feb, 2017 </td>
                                                                    <td> $75.70 </td>
                                                                    <td>
                                                                        <span class="label label-sm label-info"> In Process </span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;"> Paul Strong </a>
                                                                    </td>
                                                                    <td> 24 Feb, 2017 </td>
                                                                    <td> $45.00 </td>
                                                                    <td>
                                                                        <span class="label label-sm label-success"> Success </span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:;" class="btn btn-sm btn-default">
                                                                            <i class="fa fa-search"></i> View </a>
                                                                    </td>
                                                                </tr>
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
                                                    <h3>$755</h3>
                                                </div>
                                                
                                                <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                    <span class="label label-warning"> Orders: </span>
                                                    <h3>70</h3>
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
                                <!-- BEGIN PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption">
                                            <i class="icon-globe font-dark hide"></i>
                                            <span class="caption-subject font-dark bold uppercase">Notifications</span>
                                        </div>                                        
                                    </div>
                                    <div class="portlet-body">
                                        <!--BEGIN TABS-->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1_1">
                                                <div class="scroller" style="height: 339px;" data-always-visible="1" data-rail-visible="0">
                                                    <ul class="feeds">                                                        
                                                        
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 30 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 40 mins </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-warning">
                                                                            <i class="fa fa-plus"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 1.5 hours </div>
                                                            </div>
                                                        </li>                                                        
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-default">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 3 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-warning">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 5 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 18 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-default">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 21 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 22 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-default">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 21 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 22 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-default">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 21 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 22 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-default">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 21 hours </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-info">
                                                                            <i class="fa fa-bullhorn"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received. Please take care of it. </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 22 hours </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <!--END TABS-->
                                    </div>
                                </div>
                                <!-- END PORTLET-->
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
                                                <div class="item">
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
                                                    
                                                </div>
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
        <!-- END PAGE LEVEL PLUGINS -->
        <?php 
            include('include/footer_script2.php');
        ?>
    </body>

</html>