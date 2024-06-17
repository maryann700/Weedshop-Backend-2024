<?php 
// Dashboard file created by Mehul Sonagara # 17/3/2017
include('../system/config.inc.php');
include('function/profile.php');
$headTitle = "Store Profile";
$pageName = "profile";
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
                                    <a href="index.php">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Profile</span>
                                </li>
                            </ul>                           
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Store Profile                           
                        </h1>
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
                        <div class="profile">
                            <div class="tabbable-line tabbable-full-width">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab"> Overview </a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab"> Edit Profile </a>
                                    </li>                                    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1_1">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <ul class="list-unstyled profile-nav">
                                                    <li>                                                       
                                                        <img src="<?php echo $storeurl."upload/store/".$store['image']; ?>" class="img-responsive pic-bordered" alt="" />                                                         
<!--                                                        <img src="../assets/pages/media/profile/people19.png" class="img-responsive pic-bordered" alt="" />-->
<!--                                                        <a href="javascript:;" class="profile-edit"> edit </a>-->
                                                    </li>
                                                    <li>
                                                        <a href="product.php"> Products </a>
                                                    </li>
                                                    <!-- <li>
                                                        <a href="javascript:;"> Messages
                                                            <span> 3 </span>
                                                        </a>
                                                    </li> -->
                                                    <li>
                                                        <a href="order.php"> Orders </a>
                                                    </li>                                                    
                                                </ul>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">                                                    
                                                    <div class="col-md-8 profile-info">
                                                        <h1 class="font-green sbold uppercase"><?php echo $store['name']; ?></h1>
                                                        <p> <?php echo $store['description']; ?> </p>
                                                        <p>
                                                            <i class="fa fa-map-marker"></i> <?php echo $store['address']; ?>
                                                        </p>
                                                        <ul class="list-inline">
                                                            <li>
                                                                <i class="fa fa-map-marker"></i> <?php echo $store['phone']; ?> </li>
                                                            <li>
                                                                <i class="fa fa-calendar"></i> <?php echo $store['email']; ?> </li>                                                            
                                                        </ul>
                                                    </div>
                                                    <!--end col-md-8-->
                                                    <div class="col-md-4">
                                                        <div class="portlet sale-summary">
                                                            <div class="portlet-title">
                                                                <div class="caption font-red sbold"> Sales Summary </div>
                                                                <div class="tools">
                                                                    <a class="reload" href="javascript:;"> </a>
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <ul class="list-unstyled">
                                                                    <li>
                                                                        <span class="sale-info"> TODAY SOLD
                                                                            <i class="fa fa-img-up"></i>
                                                                        </span>
                                                                        <span class="sale-num"> 23 </span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="sale-info"> WEEKLY SALES
                                                                            <i class="fa fa-img-down"></i>
                                                                        </span>
                                                                        <span class="sale-num"> 87 </span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="sale-info"> TOTAL SOLD </span>
                                                                        <span class="sale-num"> 2377 </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end col-md-4-->
                                                </div>
                                                <!--end row-->
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!--tab_1_2-->
                                    <div class="tab-pane" id="tab_1_3">
                                        <div class="row profile-account">
                                            <div class="col-md-3">
                                                <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                    <li class="active">
                                                        <a data-toggle="tab" href="#tab_1-1" onclick="hidemap('show');">
                                                            <i class="fa fa-cog"></i> Store info </a>
                                                        <span class="after"> </span>
                                                    </li>
                                                    <li>
                                                        <a data-toggle="tab" href="#tab_2-2" onclick="hidemap('hide');">
                                                            <i class="fa fa-picture-o"></i> Change Profile Image </a>
                                                    </li>
                                                    <li>
                                                        <a data-toggle="tab" href="#tab_3-3" onclick="hidemap('hide');">
                                                            <i class="fa fa-lock"></i> Change Password </a>
                                                    </li>   
                                                    <li class="margin-top-10">
                                                        <div id="map" style="width:246px; height:350px; border:2px solid #666;"></div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="tab-content">
                                                    <div id="tab_1-1" class="tab-pane active">
                                                        <form role="form" name="frmprofile" action="" method="post">
                                                            <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>" />
                                                            <input type="hidden" name="action" value="profile" />
                                                            <div class="form-group">
                                                                <label class="control-label">Store Name</label>
                                                                <input type="text" placeholder="House of Dunk" required="true" class="form-control" name="name" value="<?php echo $store['name']; ?>" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">About Store </label>
                                                                <textarea class="form-control" rows="3" required="true" placeholder="Short Description about store!!!" name="description"><?php echo $store['description']; ?></textarea> </div>                                                                    
                                                            <div class="form-group">
                                                                <label class="control-label">Owner Name</label>
                                                                <input type="text" placeholder="John Doe" required="true" class="form-control" name="owner"  value="<?php echo $store['owner']; ?>" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Mobile Number</label>
                                                                <input type="text" placeholder="+1 646 580 DEMO (6284)" required="true" class="form-control" name="phone"  value="<?php echo $store['phone']; ?>" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Address                                                                    
                                                                </label>
                                                                <textarea class="form-control" required="true" rows="3" placeholder="Address here!!!" name="address" id="address" onblur="showAddress(this.value)"><?php echo $store['address']; ?></textarea>
                                                                <br><span class="label label-danger"> NOTE! </span><span>Enter Address first and select your exact store location from map using drag map marker.</span>
                                                            </div>                                                            
                                                            <div class="form-group">
                                                                <label class="control-label">Region</label>                                                                
                                                                <select required="true" class="table-group-action-input form-control input-medium" name="region">
                                                                    <?php for($i=0;$i<count($regions);$i++) { ?>
                                                                         <option value="<?php echo $regions[$i]['name'];?>" <?php echo ($regions[$i]['name']==$store['region']) ? "selected" : ""; ?>><?php echo $regions[$i]['name'];?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                            </div>    
                                                            <div class="form-group">
                                                                <label class="control-label">Zipcode</label>
                                                                <input type="text" placeholder="2020" class="form-control" required="true" name="zipcode" value="<?php echo $store['zipcode']; ?>" /> </div>       
                                                            <div class="form-group">
                                                                <label class="control-label">Latitude</label>
                                                                <input type="text" placeholder="12333" class="form-control" required="true" id="lat" name="latitude" value="<?php echo $store['latitude']; ?>" readonly="true"/> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Longitude</label>
                                                                <input type="text" placeholder="12333" class="form-control" required="true" id="lng" name="longitude" value="<?php echo $store['longitude']; ?>" readonly="true"/> </div>                                                            
                                                            <div class="margiv-top-10">
                                                                <input type="submit" value="Save Changes" name="submit" class="btn green" />
                                                                <a href="profile.php" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="tab_2-2" class="tab-pane">
                                                        <p> Store Profile Image</p>
                                                        <form action="" role="form" method="post" name="frmlogo" enctype="multipart/form-data">
                                                            <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>" />
                                                            <input type="hidden" name="action" value="logoimage" />
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <?php if($store['image'] != "") { ?>
                                                                            <img src="<?php echo $storeurl."upload/store/".$store['image']; ?>" alt="" /> 
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
                                                                <div class="clearfix margin-top-10">
                                                                    <span class="label label-danger"> NOTE! </span>
                                                                    <span> &nbsp;Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only AND Image allowed extension are jpg, jpeg, png AND Image size should be <b>width:250px</b> and <b>Height:200px</b></span>
                                                                </div>
                                                            </div>
                                                            <p> Store Logo </p>
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <?php if($store['logo'] != "") { ?>
                                                                            <img src="<?php echo $storeurl."upload/store/".$store['logo']; ?>" alt="" /> 
                                                                        <?php } else { ?>
                                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                        <?php } ?>    
                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>
                                                                            <input type="file" name="logo"> </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix margin-top-10">
                                                                    <span class="label label-danger"> NOTE! </span>
                                                                    <span> &nbsp;Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only AND Image allowed extension are jpg, jpeg, png AND Image size should be <b>width:100px</b> and <b>Height:100px</b></span>
                                                                </div>
                                                            </div>
                                                            <div class="margin-top-10">                                                                
                                                                <input type="submit" value="Submit" name="logo_submit" class="btn green" />
                                                                <a href="profile.php" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="tab_3-3" class="tab-pane">
                                                        <form action="" method="post" name="frmpassword">
                                                            <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>" />
                                                            <input type="hidden" name="action" value="change_password" />
                                                            <div class="form-group">
                                                                <label class="control-label">Current Password</label>
                                                                <input type="password" name="o_password" class="form-control" required="true" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">New Password</label>
                                                                <input type="password" name="password" class="form-control" required="true" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Re-type New Password</label>
                                                                <input type="password" name="c_password" class="form-control" required="true" /> </div>
                                                            <div class="margin-top-10">                                                                
                                                                <input type="submit" value="Change Password" name="submit" class="btn green" />
                                                                <a href="profile.php" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                            <!--end col-md-9-->
                                        </div>
                                    </div>
                                    <!--end tab-pane-->                                    
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
        <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<!--        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <script src="../assets/global/plugins/gmaps/gmaps.min.js" type="text/javascript"></script>-->
        <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyBHVb8KglxgjastSPBA4qZ2B3pJgPPmDus"type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->        
        <?php 
            include('include/footer_script2.php');
        ?>
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
                                            alert(address + " not found");
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
                    function hidemap(val) {
                        if(val=="hide"){
                            $("#map").hide();
                        } else {
                            $("#map").show();
                        }
                    }
                </script>
    </body>

</html>