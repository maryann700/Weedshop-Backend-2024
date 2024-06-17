<?php 
// Product file created by Mehul Sonagara # 17/3/2017
include('../system/config.inc.php');
include('function/type.php');

$headTitle = "Type";
$pageName = "type";
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
                                    <a href="index.html">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Types</span>
                                </li>
                            </ul>                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">Weed Type Management</h1>
                        <?php if(checkErrorMessage()) { ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                            <?php echo getErrorMessage(); unsetErrorMessage(); ?>
                        </div>              
                        <?php } ?>
                        <?php if(checkSuccessMessage()) { ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                            <?php echo getSuccessMessage(); unsetSuccessMessage(); ?>
                        </div>              
                        <?php } ?>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">                                
                                 <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
<!--                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Product List</span>                                        
                                    </div>-->
                                    <div>
<!--                                        <a class="btn sbold green" href="type.php?id=add">Add New
                                            <i class="fa fa-plus"></i>
                                        </a>-->
                                        <form class="form-horizontal form-row-seperated" action="" method="post" enctype="multipart/form-data" id="frmproduct">
                                            <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>" />
                                            <input type="hidden" name="action" value="addedittype" />
                                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                    <label class="col-md-1 control-label">Name:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-2">
                                                        <input type="text" required="true" class="form-control" name="type[name]" placeholder="" value="<?php echo $type['name']; ?>"> </div>
                                                    <label class="col-md-1 control-label">Color:
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-2">
                                                        <input type="text" required="true" class="form-control demo" style="height: auto;" data-control="hue" id="color" name="type[color]" placeholder="#8a1a1a" value="<?php echo $type['color']; ?>"> </div>    
                                                        
                                                    <label class="col-md-1 control-label">Status:                                                       
                                                    </label>
                                                    <div class="col-md-2">
                                                        <select class="table-group-action-input form-control" name="type[status]">                                                                        
                                                            <option value="Active" <?php echo ($type['status']=="Active") ? "selected" : ""; ?>>Active</option>
                                                            <option value="Inactive" <?php echo ($type['status']=="Inactive") ? "selected" : ""; ?>>Inactive</option>
                                                        </select>
                                                    </div> 
                                                    <div class="col-md-3">
                                                        <button type="submit" name="save" value="save" class="btn btn-success">
                                                            <i class="fa fa-check"></i> Save</button>
                                                         <a href="type.php" class="btn btn-success">Cancel</a>   
                                                    </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <div class="tools">                                         
                                    </div>                                   
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="category">
                                        <thead>
                                            <tr>
                                                <th class="all">Type Name</th>
                                                <th class="all">Color</th>
                                                <th class="all">Status</th>                                                
                                                <th class="all">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                for($i=0;$i<count($types);$i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $types[$i]['name']; ?></td>
                                                <td style="background-color: <?php echo $types[$i]['color']; ?>"><?php echo $types[$i]['color']; ?></td>
                                                <td><?php echo $types[$i]['status']; ?></td>
                                                <td>
                                                    <div class="btn-group pull-left">
                                                        <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Action
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="type.php?id=<?php echo $types[$i]['id']; ?>">
                                                                    <i class="fa fa-pencil"></i> Edit </a>
                                                            </li>
                                                            <li>
                                                                <a href="type.php?delete=<?php echo $types[$i]['id']; ?>" onclick="ans = confirm('Are you sure for delete?'); if(ans == false){ return false;}">
                                                                    <i class="fa fa-trash-o"></i> Delete </a>
                                                            </li>                                                            
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>                                                                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
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
        <script src="../assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <?php 
            include('include/footer_script2.php');
        ?>
        <script>
            $("#color").minicolors({control:'wheel'});
        </script>
    </body>

</html>