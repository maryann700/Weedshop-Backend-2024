<?php 

// Product file created by Mehul Sonagara # 17/3/2017

include('../system/config.inc.php');

include('function/drivers.php');

// delete store

if(isset($_GET['delete']) && $_GET['delete'] != "") {    

    $db->where ('id', $_GET['delete']);

    $results = $db->getOne ('driver',null);

    // if($results['image'])

    //     unlink(STORE_PROFILE_IMG_PATH.$results['image']);

    // if($results['logo'])

    //     unlink(STORE_PROFILE_IMG_PATH.$results['logo']);

    

    $data['status'] = 'Deleted';

    // $data['image'] = '';

    // $data['logo'] = '';

    $db->where ('id', $_GET['delete']);

    $db->update ('driver', $data);

    

            

    setSuccessMessage("Driver deleted successfully!");

    header("location:drivers.php");

    die();

}



$db->where ("status", "Deleted", "!=");

$stores = $db->get ("driver");



$db->where('status', Array('Active','Inactive'), 'IN');

$db->orderBy ("created_date","desc");

$drivers = $db->get ("driver");



$headTitle = "Drivers";

$pageName = "driver";

?>

<?php 

    include('include/header.php');

?>

<head>
    <style>
    td.ab {
    width:280px;
    }
    </style>

</head>

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

                                    <span>Drivers</span>

                                </li>

                            </ul>                            

                        </div>

                        <!-- END PAGE BAR -->

                        <!-- BEGIN PAGE TITLE-->

                        <h1 class="page-title">Driver List</h1>

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

                                   

                                <div class="portlet-body">

                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">

                                        <thead>

                                            <tr>                                                

                                                <th class="all">Name</th>

                                                <th class="min-phone-l">email</th>

                                                <th class="all">Phone</th>                                                

                                                <th class="min-phone-l">Created Date</th>

                                                <th class="min-phone-l">Status</th>

                                                <th class="all">Admin Approved</th>

                                                <th class="all">Action</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php 

                                                for($i=0;$i<count($drivers);$i++) {

                                                    $class="";

                                                    if($drivers[$i]['adminApproved']=="Approved")

                                                        $class = "label-success";

                                                    elseif($drivers[$i]['adminApproved']=="Rejected") 

                                                        $class = "label-danger";

                                                    else

                                                        $class = "label-warning";

                                            ?>

                                            <tr>

                                                <td><?php echo $drivers[$i]['name']; ?></td>

                                                <td><?php echo $drivers[$i]['email']; ?></td>

                                                <td><?php echo $drivers[$i]['mobile']; ?></td>                                               

                                                <td><?php echo date('d-m-Y',strtotime($drivers[$i]['created_date'])); ?></td>                                                

                                                <td><?php echo $drivers[$i]['status']; ?></td>

                                                 <td>

                                                     <a title="Take Action" style="text-decoration: none;" class="user-detail" data-id="<?php echo $drivers[$i]['id']; ?>"><span class="label label-sm <?php echo $class; ?>"> <?php echo $drivers[$i]['adminApproved']; ?>

                                                        <i class="fa fa-share"></i>

                                                    </span></a>

                                                 </td>

                                                <td>

                                                    <div class="pull-left">

                                                        <a title="View Detail" class="btn btn-xs yellow user-detail" data-id="<?php echo $drivers[$i]['id']; ?>">

                                                                            <i class="fa fa-search"></i>

                                                                        </a>

                                                        

                                                       

                                                    </div>

                                                    <div class="ab">

                                                        <a title="Location" class="btn btn-xs yellow driver-detail" data-id="<?php echo $drivers[$i]['id']; ?>">

                                                                            <i class="fa fa-map-marker"></i>

                                                                        </a>

                                                                          <a href="order.php?driver=<?php echo $drivers[$i]['id']; ?>" target="_blank" title="History" class="btn btn-xs yellow" data-id="<?php echo $drivers[$i]['id']; ?>">

                                                                            <i class="fa fa-history"></i>

                                                                        </a>

                                                                           <a  class="btn btn-xs yellow" href="drivers.php?delete=<?php echo $drivers[$i]['id']; ?>" onclick="ans = confirm('Are you sure for delete?'); if(ans == false){ return false;}">

                                                                    <i class="fa fa-close"></i>
                                                                </a>

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

       

        <!-- /.modal -->

        <div class="modal fade bs-modal-lg" id="detail" tabindex="-1" role="dialog" aria-hidden="true">

            <div class="modal-dialog modal-lg">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                        <h4 class="modal-title">Driver</h4>

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

        <!-- END PAGE LEVEL PLUGINS -->

        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBHVb8KglxgjastSPBA4qZ2B3pJgPPmDus"></script>

        <?php 

            include('include/footer_script2.php');

        ?>

        

        <script>

               

            $(".user-detail").click(function(){

                var iid = $(this).attr('data-id'); 

                //$('#detail').modal('show');

                $.ajax({

                   url: "ajax/driver_detail.php",

                   cache: false,

                   data: {id:iid},

                   success: function(html){  

                        $(".modal-detail").html(html);

                        $('#detail').modal('show');

                   }

                 });

            });  

            $(".driver-detail").click(function(){

                var iid = $(this).attr('data-id');                 

                //$('#detail').modal('show');

                $.ajax({

                   url: "ajax/driver_location.php",

                   cache: false,

                   data: {id:iid},

                   success: function(data){  

                        //$(".modal-detail").html(html);

                        $('#detail').modal('show');                          

                        if(data != "" && data.latitude) {                            

                            $(".modal-detail").html('<div id="map" style="width:100%; height: 350px; border:2px solid #666;"></div>');

                            showmap(data.latitude,data.longitude,data.address);

                        } else {

                            $(".modal-detail").html('<h3>Map will be display when driver login with APP</h3>');                            

                        }

                    }

                 });

            });  

            function showhidefield() {

                var val = $("#adminApproved").val();            

                if(val==="Approved") {                

                    $(".reject1").show();                    

                    $(".reject").hide();                   

                } else if(val==="Rejected") {

                    $(".reject1").hide();                    

                    $(".reject").show();                    

                }

            }

            function showmap(lat,long,contentString){

                $('#detail').on('shown.bs.modal', function () 

                {

                    var latlng = new google.maps.LatLng(lat, long);

                    var myOptions =

                    {

                        zoom: 8,

                        center: latlng,

                        mapTypeId: google.maps.MapTypeId.ROADMAP

                    };

                    map = new google.maps.Map(document.getElementById("map"), myOptions);



                    var marker = new google.maps.Marker({

                       position: latlng,

                       animation: google.maps.Animation.BOUNCE

                    });

                    marker.setMap(map);

                    if(contentString) {

                        var infowindow = new google.maps.InfoWindow({

                          content: contentString

                        });

                        marker.addListener('click', function() {

                          infowindow.open(map, marker);

                        });

                    }

                    google.maps.event.trigger(map, "resize");

                });

            }

        </script>

    </body>



</html>