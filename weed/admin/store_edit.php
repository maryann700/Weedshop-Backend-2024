<?php 
// Dashboard file created by Mehul Sonagara # 17/3/2017
include('../system/config.inc.php');
include('function/store.php');
$headTitle = "Store";
$pageName = "store";
generateCSRFToken();
?>
<?php 
    include('include/header.php');
?>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" onload="load()">
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
                                   <a href="store.php">Manage Stores</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span><?php echo ($id=="add")? "Add" : "Edit"; ?> Stores</span>
                                </li>
                            </ul>
                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
<!--                        <h1 class="page-title"> Store <?php echo ($id=="add")? "Add" : "Edit"; ?></h1>-->
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
                                <form class="form-horizontal form-row-seperated" action="" method="post" enctype="multipart/form-data" id="frmstore">
                                    <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>" />
                                    <input type="hidden" name="action" value="addeditstore" />
                                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                    <input type="hidden" id="lat" name="store[latitude]" value="<?php echo $store['latitude']; ?>" />
                                    <input type="hidden" id="lng" name="store[longitude]" value="<?php echo $store['longitude']; ?>" />
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-shopping-cart"></i> Store <?php echo ($id=="add")? "New" : $store['name']; ?> </div>
                                            <div class="actions btn-set">
                                               
                                                    <a href="store.php" class="btn btn-success">
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
                                                                    <input type="text" required="true" class="form-control" name="store[name]" placeholder="" value="<?php echo $store['name']; ?>"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Owner:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="text" required="true" class="form-control" name="store[owner]" placeholder="" value="<?php echo $store['owner']; ?>"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Email:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="text" required="true" class="form-control" name="store[email]" placeholder="" value="<?php echo $store['email']; ?>"> </div>
                                                            </div>
                                                            <?php if(isset($id) && $id == "add") { ?>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Password:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="password" required="true" class="form-control" name="store[password]" placeholder="" value="<?php echo $store['password']; ?>"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Confirm Password:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="password" required="true" class="form-control" name="store[cpassword]" placeholder="" value="<?php echo $store['cpassword']; ?>"> </div>
                                                            </div>
                                                            <?php } ?>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Description:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <textarea class="form-control" required="true" name="store[description]"><?php echo $store['description']; ?></textarea>
                                                                </div>
                                                            </div>  
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Phone:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input required="true" type="text" class="form-control" name="store[phone]" placeholder="" value="<?php echo $store['phone']; ?>" onKeyUp="numericFilter(this);"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Address:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                               <div class="col-md-10">
                                                                    <textarea class="form-control" required="true" name="store[address]" id="address" onblur="showAddress(this.value)"><?php echo $store['address']; ?></textarea>
                                                                </div>
                                                            </div>
                                                             <div class="form-group">
                                                                <label class="col-md-2 control-label">Zipcode:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input required="true" type="text" class="form-control" name="store[zipcode]" placeholder="" value="<?php echo $store['zipcode']; ?>"> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Region:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <select required="true" class="table-group-action-input form-control input-medium" name="store[region]">
                                                                        <option value="">Select Region</option>
                                                                        <?php for($i=0;$i<count($regions);$i++) { ?>
                                                                            <option value="<?php echo $regions[$i]['name']; ?>" <?php echo ($store['region']==$regions[$i]['name']) ? "selected" : ""; ?>><?php echo $regions[$i]['name']; ?></option>
                                                                        <?php } ?>                                                                                                                                          
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Status:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <select class="table-group-action-input form-control input-medium" name="store[status]">                                                                        
                                                                        <option value="Active" <?php echo ($store['status']=="Active") ? "selected" : ""; ?>>Active</option>
                                                                        <option value="Inactive" <?php echo ($store['status']=="Inactive") ? "selected" : ""; ?>>Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Image:                                                                    
                                                                </label>
                                                                <div class="col-md-3">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <?php if($store['image'] != "") { ?>
                                                                                <img src="<?php echo STORE_PROFILE_IMG_URL."".$store['image']; ?>" alt="" /> 
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
                                                                <div class="col-md-5">
                                                                 <label class="col-md-2 control-label">Logo:                                                                    
                                                                </label>
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <?php if($store['logo'] != "") { ?>
                                                                                <img src="<?php echo STORE_PROFILE_IMG_URL."".$store['logo']; ?>" alt="" /> 
                                                                        <?php } else { ?>
                                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>
                                                                            <input type="file" name="logo">                                                                        
                                                                        </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div id="map" style="display:none;width:246px; height:350px; border:2px solid #666;"></div>
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
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        
<!--        <script src="../assets/global/plugins/plupload/js/plupload.full.min.js" type="text/javascript"></script>-->
        <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        
        
        <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyBHVb8KglxgjastSPBA4qZ2B3pJgPPmDus"type="text/javascript"></script>
       
        <!-- END PAGE LEVEL PLUGINS -->
        <script>
            function numericFilter(txb) {
                txb.value = txb.value.replace(/[^\0-9]/ig, "");
             }       
            var store_url = "<?php echo $storeurl; ?>";
        </script>
        <script type="text/javascript">

                    function load() {
                        if (GBrowserIsCompatible()) {
                            var map = new GMap2(document.getElementById("map"));
                            map.addControl(new GSmallMapControl());
                            map.addControl(new GMapTypeControl());
                            var center = new GLatLng(<?php if ($store['latitude']) {
    echo $store['latitude'];
} else {
    echo "0";
} ?>,<?php if ($store['longitude']) {
    echo $store['longitude'];
} else {
    echo "0";
} ?>);
                            map.setCenter(center, <?php if ($store['latitude'] && $store['longitude']) {
    echo "10";
} else {
    echo "1";
} ?>);
                            geocoder = new GClientGeocoder();
                            var marker = new GMarker(center, {draggable: true});
                            map.addOverlay(marker);
                            document.getElementById("lat").value = center.lat().toFixed(5);
                            document.getElementById("lng").value = center.lng().toFixed(5);

                            GEvent.addListener(marker, "dragend", function () {
                                var point = marker.getPoint();
                                map.panTo(point);
                                document.getElementById("lat").value = point.lat().toFixed(5);
                                document.getElementById("lng").value = point.lng().toFixed(5);
                            });

                            GEvent.addListener(map, "moveend", function () {
                                map.clearOverlays();
                                var center = map.getCenter();
                                var marker = new GMarker(center, {draggable: true});
                                map.addOverlay(marker);
                                document.getElementById("lat").value = center.lat().toFixed(5);
                                document.getElementById("lng").value = center.lng().toFixed(5);

                                GEvent.addListener(marker, "dragend", function () {
                                    var point = marker.getPoint();
                                    map.panTo(point);
                                    document.getElementById("lat").value = point.lat().toFixed(5);
                                    document.getElementById("lng").value = point.lng().toFixed(5);
                                });
                            });
                        }
                    }

                    function showAddress(address) {
                        var map = new GMap2(document.getElementById("map"));
                        map.addControl(new GSmallMapControl());
                        map.addControl(new GMapTypeControl());
                        if (geocoder) {
                            geocoder.getLatLng(
                                    address,
                                    function (point) {
                                        if (!point) {
                                            alert(address + "address not found");
                                        } else {
                                            document.getElementById("lat").value = point.lat().toFixed(5);
                                            document.getElementById("lng").value = point.lng().toFixed(5);
                                            map.clearOverlays()
                                            map.setCenter(point, 6);
                                            var marker = new GMarker(point, {draggable: true});
                                            map.addOverlay(marker);

                                            GEvent.addListener(marker, "dragend", function () {
                                                var pt = marker.getPoint();
                                                map.panTo(pt);
                                                document.getElementById("lat").value = pt.lat().toFixed(5);
                                                document.getElementById("lng").value = pt.lng().toFixed(5);
                                            });


                                            GEvent.addListener(map, "moveend", function () {
                                                map.clearOverlays();
                                                var center = map.getCenter();
                                                var marker = new GMarker(center, {draggable: true});
                                                map.addOverlay(marker);
                                                document.getElementById("lat").value = center.lat().toFixed(5);
                                                document.getElementById("lng").value = center.lng().toFixed(5);

                                                GEvent.addListener(marker, "dragend", function () {
                                                    var pt = marker.getPoint();
                                                    map.panTo(pt);
                                                    document.getElementById("lat").value = pt.lat().toFixed(5);
                                                    document.getElementById("lng").value = pt.lng().toFixed(5);
                                                });
                                            });
                                        }
                                    });
                        }
                    }                    
                </script>
        <?php 
            include('include/footer_script2.php');
        ?>
    </body>

</html>