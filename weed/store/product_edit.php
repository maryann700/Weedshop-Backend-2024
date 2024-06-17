<?php 
// Dashboard file created by Mehul Sonagara # 17/3/2017
include('../system/config.inc.php');
include('function/product.php');
$headTitle = "Store Product";
$pageName = "product";
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
                                   <a href="index.html">Manage Products</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span><?php echo ($id=="add")? "Add" : "Edit"; ?> Product</span>
                                </li>
                            </ul>
                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
<!--                        <h1 class="page-title"> Product <?php echo ($id=="add")? "Add" : "Edit"; ?></h1>-->
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
                                <form class="form-horizontal form-row-seperated" action="" method="post" enctype="multipart/form-data" id="frmproduct">
                                    <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>" />
                                    <input type="hidden" name="action" value="addeditproduct" />
                                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-shopping-cart"></i> Product <?php echo ($id=="add")? "New" : $product['name']; ?> </div>
                                            <div class="actions btn-set">
                                               
                                                    <a href="product.php" class="btn btn-success">
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
                                            <div class="tabbable-bordered">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_general" data-toggle="tab"> General </a>
                                                    </li>
<!--                                                    <li>
                                                        <a href="#tab_meta" data-toggle="tab"> Meta </a>
                                                    </li>-->
                                                    <li>
                                                        <a href="#tab_images" data-toggle="tab"> Images </a>
                                                    </li>
<!--                                                    <li>
                                                        <a href="#tab_reviews" data-toggle="tab"> Reviews
                                                            <span class="badge badge-success"> 3 </span>
                                                        </a>
                                                    </li>-->                                                    
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_general">
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Name:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="text" required="true" class="form-control" name="product[name]" placeholder="" value="<?php echo $product['name']; ?>"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Description:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <textarea class="form-control" required="true" name="product[description]"><?php echo $product['description']; ?></textarea>
                                                                </div>
                                                            </div>                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Categories:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <select required="true" class="table-group-action-input form-control input-medium" name="product[category_id]">
                                                                        <option value="">Select Category</option>
                                                                        <?php for($i=0;$i<count($categories);$i++) { ?>
                                                                            <option value="<?php echo $categories[$i]['id']; ?>" <?php echo ($product['category_id']==$categories[$i]['id']) ? "selected" : ""; ?>><?php echo $categories[$i]['name']; ?></option>
                                                                        <?php } ?>                                                                                                                                          
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Type
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <select required="true" class="table-group-action-input form-control input-medium" name="product[type_id]">
                                                                        <option value="">Select Type</option>
                                                                        <?php for($i=0;$i<count($types);$i++) { ?>
                                                                            <option value="<?php echo $types[$i]['id']; ?>" <?php echo ($product['type_id']==$types[$i]['id']) ? "selected" : ""; ?>><?php echo $types[$i]['name']; ?></option>
                                                                        <?php } ?>                                                                       
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Attributes
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <label class="col-md-4" style="padding-left: 0;padding-top: 10px;">Attribute Text</label>
                                                                    <label class="col-md-2" style="padding-left: 0;padding-top: 10px;">Attribute</label>
                                                                    <label class="col-md-2" style="padding-left: 0;padding-top: 10px;">Action</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mt-repeater" style="margin-left:0;margin-right:0;">                                                                
                                                                <div data-repeater-list="attribute">
                                                                    <?php for($j=0;$j<count($prod_attributes);$j++) { ?>
                                                                    <div data-repeater-item class="mt-repeater-item" style="border-bottom:none;"  data-attr-id="<?php echo $prod_attributes[$j]['id'];?>">
                                                                        <div class="row mt-repeater-row">                                                                             
                                                                                <label class="col-md-2 control-label">&nbsp;</label>
                                                                                <div class="col-md-3">
                                                                                     <input type="text" name="attr_txt" placeholder="100gm" value="<?php echo $prod_attributes[$j]['attribute_text'];?>" class="form-control"/>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <select name="attr_id" class="form-control"> 
                                                                                        <option value=""> Select </option>
                                                                                        <?php for($i=0;$i<count($attributes);$i++) { ?>
                                                                                            <option value="<?php echo $attributes[$i]['id']?>" <?php if($prod_attributes[$j]['attribute_id'] == $attributes[$i]['id']){ echo "selected"; } ?>><?php echo $attributes[$i]['name']?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete" style="margin-top:0px;">
                                                                                        <i class="fa fa-close"></i>
                                                                                    </a>
                                                                                </div>                                                                           
                                                                        </div>
                                                                    </div>
                                                                     <?php } ?>
                                                                    <div data-repeater-item class="mt-repeater-item" style="border-bottom:none;"  data-attr-id="">
                                                                        <div class="row mt-repeater-row">  
                                                                           <label class="col-md-2 control-label">&nbsp;</label>
                                                                            <div class="col-md-3">
                                                                                 <input type="text" name="attr_txt" placeholder="100gm" class="form-control" />
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <select name="attr_id" class="form-control" > 
                                                                                    <option value=""> Select </option>
                                                                                    <?php for($i=0;$i<count($attributes);$i++) { ?>
                                                                                        <option value="<?php echo $attributes[$i]['id']?>"><?php echo $attributes[$i]['name']?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete" style="margin-top:0px;">
                                                                                    <i class="fa fa-close"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">&nbsp;</div>
                                                                <div class="col-md-3" style="padding-left: 0;">                                                                    
                                                                    <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add">
                                                                    <i class="fa fa-plus"></i> Add Attributes</a>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Price:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input required="true" type="text" class="form-control" name="product[price]" placeholder="" value="<?php echo $product['price']; ?>" onKeyUp="numericFilter(this);"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Quantity:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input required="true" type="text" class="form-control" name="product[quantity]" placeholder="" value="<?php echo $product['quantity']; ?>" onKeyUp="numericFilter(this);"> </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Status:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <select class="table-group-action-input form-control input-medium" name="product[status]">                                                                        
                                                                        <option value="Active" <?php echo ($product['status']=="Active") ? "selected" : ""; ?>>Active</option>
                                                                        <option value="Inactive" <?php echo ($product['status']=="Inactive") ? "selected" : ""; ?>>Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Image:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <?php if($product['image'] != "") { ?>
                                                                                <img src="<?php echo $storeurl."upload/products/".$product['image']; ?>" alt="" /> 
                                                                        <?php } else { ?>
                                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>
                                                                            <input type="file" name="image">                                                                        
                                                                        </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
<!--                                                    <div class="tab-pane" id="tab_meta">
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Meta Title:</label>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control maxlength-handler" name="product[meta_title]" maxlength="100" placeholder="">
                                                                    <span class="help-block"> max 100 chars </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Meta Keywords:</label>
                                                                <div class="col-md-10">
                                                                    <textarea class="form-control maxlength-handler" rows="8" name="product[meta_keywords]" maxlength="1000"></textarea>
                                                                    <span class="help-block"> max 1000 chars </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Meta Description:</label>
                                                                <div class="col-md-10">
                                                                    <textarea class="form-control maxlength-handler" rows="8" name="product[meta_description]" maxlength="255"></textarea>
                                                                    <span class="help-block"> max 255 chars </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>-->
                                                    
                                                    <div class="tab-pane" id="tab_images">
                                                        <div>
                                                            <label class="control-label">Select Images:                                                                    
                                                            </label><br><br>
                                                        <span class="btn green">                                                                   
                                                            <input type="file" name="files[]" multiple=""> </span>
                                                        </div>
                                                          
                                                        
                                                        <?php if(count($prod_images)>0) {?>
                                                        <?php for($i=0;$i<count($prod_images);$i++) { ?>
                                                        <div class="fileinput fileinput-new margin-top-20 fileinput-<?php echo $prod_images[$i]['id']; ?>">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">                                                           
                                                                <?php if($prod_images[$i]['image'] != "") { ?>
                                                                        <img src="<?php echo $storeurl."upload/products/".$prod_images[$i]['image']; ?>" alt="" /> 
                                                                <?php } else { ?>
                                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                <?php } ?>
                                                            </div>
                                                            <div>
                                                                 <a href="javascript:;" divid="<?php echo $prod_images[$i]['id']; ?>" img-id="<?php echo $prod_images[$i]['id'].'|'.$prod_images[$i]['product_id'] ?>" class="btn default rmimages"> Remove </a>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                        <?php } ?>
                                                        
                                                        
                                                        
                                                    </div>
<!--                                                    <div class="tab-pane" id="tab_reviews">
                                                        <div class="table-container">
                                                            <table class="table table-striped table-bordered table-hover" id="datatable_reviews">
                                                                <thead>
                                                                    <tr role="row" class="heading">
                                                                        <th width="5%"> Review&nbsp;# </th>
                                                                        <th width="10%"> Review&nbsp;Date </th>
                                                                        <th width="10%"> Customer </th>
                                                                        <th width="20%"> Review&nbsp;Content </th>
                                                                        <th width="10%"> Status </th>
                                                                        <th width="10%"> Actions </th>
                                                                    </tr>
                                                                    <tr role="row" class="filter">
                                                                        <td>
                                                                            <input type="text" class="form-control form-filter input-sm" name="product_review_no"> </td>
                                                                        <td>
                                                                            <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                                                                <input type="text" class="form-control form-filter input-sm" readonly name="product_review_date_from" placeholder="From">
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn btn-sm default" type="button">
                                                                                        <i class="fa fa-calendar"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                                                                <input type="text" class="form-control form-filter input-sm" readonly name="product_review_date_to" placeholder="To">
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn btn-sm default" type="button">
                                                                                        <i class="fa fa-calendar"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control form-filter input-sm" name="product_review_customer"> </td>
                                                                        <td>
                                                                            <input type="text" class="form-control form-filter input-sm" name="product_review_content"> </td>
                                                                        <td>
                                                                            <select name="product_review_status" class="form-control form-filter input-sm">
                                                                                <option value="">Select...</option>
                                                                                <option value="pending">Pending</option>
                                                                                <option value="approved">Approved</option>
                                                                                <option value="rejected">Rejected</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <div class="margin-bottom-5">
                                                                                <button class="btn btn-sm btn-success filter-submit margin-bottom">
                                                                                    <i class="fa fa-search"></i> Search</button>
                                                                            </div>
                                                                            <button class="btn btn-sm btn-danger filter-cancel">
                                                                                <i class="fa fa-times"></i> Reset</button>
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody> </tbody>
                                                            </table>
                                                        </div>
                                                    </div>-->
<!--                                                    <div class="tab-pane" id="tab_history">
                                                        <div class="table-container">
                                                            <table class="table table-striped table-bordered table-hover" id="datatable_history">
                                                                <thead>
                                                                    <tr role="row" class="heading">
                                                                        <th width="25%"> Datetime </th>
                                                                        <th width="55%"> Description </th>
                                                                        <th width="10%"> Notification </th>
                                                                        <th width="10%"> Actions </th>
                                                                    </tr>
                                                                    <tr role="row" class="filter">
                                                                        <td>
                                                                            <div class="input-group date datetime-picker margin-bottom-5" data-date-format="dd/mm/yyyy hh:ii">
                                                                                <input type="text" class="form-control form-filter input-sm" readonly name="product_history_date_from" placeholder="From">
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn btn-sm default date-set" type="button">
                                                                                        <i class="fa fa-calendar"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                            <div class="input-group date datetime-picker" data-date-format="dd/mm/yyyy hh:ii">
                                                                                <input type="text" class="form-control form-filter input-sm" readonly name="product_history_date_to" placeholder="To">
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn btn-sm default date-set" type="button">
                                                                                        <i class="fa fa-calendar"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control form-filter input-sm" name="product_history_desc" placeholder="To" /> </td>
                                                                        <td>
                                                                            <select name="product_history_notification" class="form-control form-filter input-sm">
                                                                                <option value="">Select...</option>
                                                                                <option value="pending">Pending</option>
                                                                                <option value="notified">Notified</option>
                                                                                <option value="failed">Failed</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <div class="margin-bottom-5">
                                                                                <button class="btn btn-sm btn-default filter-submit margin-bottom">
                                                                                    <i class="fa fa-search"></i> Search</button>
                                                                            </div>
                                                                            <button class="btn btn-sm btn-danger-outline filter-cancel">
                                                                                <i class="fa fa-times"></i> Reset</button>
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody> </tbody>
                                                            </table>
                                                        </div>
                                                    </div>-->
                                                </div>
                                            </div>
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
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
<!--        <script src="../assets/global/plugins/plupload/js/plupload.full.min.js" type="text/javascript"></script>-->
        <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>
       
        <!-- END PAGE LEVEL PLUGINS -->
        <script>
            function numericFilter(txb) {
                txb.value = txb.value.replace(/[^\0-9]/ig, "");
             }
             
            $(".rmimages").click(function(){
                var iid = $(this).attr('img-id'); 
                var divid = $(this).attr("divid");
                $.ajax({
                   url: "ajax/images_delete.php",
                   cache: false,
                   data: {id:iid},
                   success: function(html){  
                       $(".fileinput-"+divid).remove();                       
                   }
                 });
            });             
            var store_url = "<?php echo $storeurl; ?>";
        </script>
        <?php 
            include('include/footer_script2.php');
        ?>
    </body>

</html>