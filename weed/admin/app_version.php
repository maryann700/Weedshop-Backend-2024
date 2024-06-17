<?php 

// Dashboard file created by Mehul Sonagara # 17/3/2017

include('../system/config.inc.php');

include('function/app_version.php');

$headTitle = "Admin App Version";

$pageName = "app_version";

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

                                    <a href="index.php">Home</a>

                                    <i class="fa fa-circle"></i>

                                </li>

                                <li>

                                    <span>App version</span>

                                </li>

                            </ul>                           

                        </div>

                        <!-- END PAGE BAR -->

                        <!-- BEGIN PAGE TITLE-->

                        <h1 class="page-title"> App version                           

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

                               

                                <div class="tab-content">                                    

                                    <!--tab_1_2-->

                                    <div class="tab-pane active" id="tab_1_3">

                                        <div class="row profile-account">

                                            <div class="col-md-3">

                                                <ul class="ver-inline-menu tabbable margin-bottom-10">

                                                    <li class="active">

                                                        <a data-toggle="tab" href="#tab_1-1">

                                                            <i class="fa fa-cog"></i> Android </a>

                                                        <span class="after"> </span>

                                                    </li>                                                    

                                                    <li>

                                                        <a data-toggle="tab" href="#tab_3-3">

                                                            <i class="fa fa-lock"></i> ios </a>

                                                    </li>  

                                                    

                                                </ul>

                                            </div>

                                            <div class="col-md-9">

                                                <div class="tab-content">

                                                    <div id="tab_1-1" class="tab-pane active">

                                                        <form role="form" name="frmapp_version" action="" method="post">

                                                            <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>" />

                                                            <input type="hidden" name="device_type" value="Android" />
                                                           

                                                            <div class="form-group">

                                                                <label class="control-label">Customer App Version</label>

                                                                <input type="text" placeholder="please select customer app version" required="true" class="form-control" name="cust_version" value="<?php echo $store['cust_version']; ?>" /> </div>                                                            

                                                            <div class="form-group">

                                                                <label class="control-label">Driver App version</label>

                                                                <input type="text" placeholder="please select driver app version" required="true" class="form-control" name="driver_version"  value="<?php echo $store['driver_version']; ?>" /> </div>

                                                                                                                                                                        

                                                            <div class="margiv-top-10">

                                                                <input type="submit" value="Update" name="submit" class="btn green" />

                                                                <a href="app_version.php" class="btn default"> Cancel </a>

                                                            </div>

                                                        </form>

                                                    </div>                                                    

                                                    <div id="tab_3-3" class="tab-pane">

                                                        <form action="" method="post" name="frmios">

                                                            <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>" />
                                                            <input type="hidden" name="device_type" value="ios" />


                                                            <div class="form-group">

                                                                <label class="control-label">Customer App Version</label>

                                                                <input type="text" placeholder="please select custoer app version" required="true" class="form-control" name="cust_version" value="<?php echo $store1['cust_version']; ?>" /> </div>                                                            

                                                            <div class="form-group">

                                                                <label class="control-label">Driver App version</label>

                                                                <input type="text" placeholder="please select driver app version" required="true" class="form-control" name="driver_version"  value="<?php echo $store1['driver_version']; ?>" /> </div>


                                                            <div class="margin-top-10">                                                                

                                                                <input type="submit" value="Update" name="submit" class="btn green" />

                                                                <a href="app_version.php" class="btn default"> Cancel </a>

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