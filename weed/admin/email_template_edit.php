<?php 
// Dashboard file created by Mehul Sonagara # 17/3/2017
include('../system/config.inc.php');
include('function/email_template.php');
$headTitle = "Email Template";
$pageName = "email";
generateCSRFToken();
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
                                    <a href="email_template.php">Email Templates</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span><?php echo ($id=="add")? "Add" : "Edit"; ?> Email Template</span>
                                </li>
                            </ul>
                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
<!--                        <h1 class="page-title">  <?php echo ($id=="add")? "Add" : "Edit"; ?></h1>-->
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
                                <form class="form-horizontal form-row-seperated" action="" method="post" enctype="multipart/form-data" id="frmemail">
                                    <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>" />
                                    <input type="hidden" name="action" value="addeditemail" />
                                    <input type="hidden" name="id" value="<?php echo $id; ?>" />                                   
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-shopping-cart"></i> Email Template <?php echo ($id=="add")? "New" : $email['name']; ?> </div>
                                            <div class="actions btn-set">
                                               
                                                    <a href="email_template.php" class="btn btn-success">
                                                    <i class="fa fa-angle-left"></i> Back</a>
<!--                                                <button class="btn btn-secondary-outline">
                                                    <i class="fa fa-reply"></i> Reset</button>-->
                                                    <button type="submit" name="save" value="save" class="btn btn-success">
                                                    <i class="fa fa-check"></i> Save</button>
                                                <button type="submit" name="saveedit" value="continue" class="btn btn-success">
                                                    <i class="fa fa-check-circle"></i> Save & Continue Edit</button>  
                                                <?php if($id!="add") { ?>    
                                                    <button type="submit" name="delete" value="delete" class="btn btn-success" onclick="ans=confirm('Are you sure for delete ?'); if(ans==false){return false;}">        
                                                    <i class="fa fa-trash-o"></i> Delete</button>                                        
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
<!--                                            <div class="tabbable-bordered">-->
                                               
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_general">
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Name:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="text" required="true" class="form-control" name="email[name]" placeholder="" value="<?php echo $email['name']; ?>"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Subject:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="text" required="true" class="form-control" name="email[subject]" placeholder="" value="<?php echo $email['subject']; ?>"> </div>
                                                            </div>
                                                             <div class="form-group">
                                                                <label class="col-md-2 control-label">Email Body:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">                                                                   
                                                                    <textarea class="ckeditor form-control" required="true" name="email[email_body]" rows="6"><?php echo $email['email_body']; ?></textarea>
                                                                </div>
                                                            </div>  
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Status:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <select class="table-group-action-input form-control input-medium" name="email[status]">                                                                        
                                                                        <option value="Active" <?php echo ($email['status']=="Active") ? "selected" : ""; ?>>Active</option>
                                                                        <option value="Inactive" <?php echo ($email['status']=="Inactive") ? "selected" : ""; ?>>Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    

                                                </div>
<!--                                            </div>-->
                                        </div>
                                    </div>
                                </form>
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
        <script src="../assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/components-form-tools.min.js" type="text/javascript"></script>
        
        <?php 
            include('include/footer_script2.php');
        ?>
    </body>

</html>