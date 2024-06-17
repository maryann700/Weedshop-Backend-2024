<?php 

// Product file created by Mehul Sonagara # 17/3/2017

include('../system/config.inc.php');

include('function/users.php');


// delete store

if(isset($_GET['delete']) && $_GET['delete'] != "") {    

    $db->where ('id', $_GET['delete']);

    $results = $db->getOne ('user',null);

    // if($results['image'])

    //     unlink(STORE_PROFILE_IMG_PATH.$results['image']);

    // if($results['logo'])

    //     unlink(STORE_PROFILE_IMG_PATH.$results['logo']);

    

    $data['status'] = 'Deleted';

    // $data['image'] = '';

    // $data['logo'] = '';

    $db->where ('id', $_GET['delete']);

    $db->update ('user', $data);

    

            

    setSuccessMessage("User deleted successfully!");

    header("location:users.php");

    die();

}



$db->where ("status", "Deleted", "!=");

$stores = $db->get ("user");



// $headTitle = "Stores";

// $pageName = "store";




$db->where('status', Array('Active','Inactive'), 'IN');

$db->orderBy ("created_date","desc");

$users = $db->get ("user");



$headTitle = "Users";

$pageName = "user";

?>




<?php 

    include('include/header.php');

?>

<head>
    <style>
    td.aa {
    width: 130px;
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

                                    <span>Users</span>

                                </li>

                            </ul>                            

                        </div>

                        <!-- END PAGE BAR -->

                        <!-- BEGIN PAGE TITLE-->

                        <h1 class="page-title">User List</h1>

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

                                                for($i=0;$i<count($users);$i++) {

                                                    $class="";

                                                    if($users[$i]['adminApproved']=="Approved")

                                                        $class = "label-success";

                                                    elseif($users[$i]['adminApproved']=="Rejected") 

                                                        $class = "label-danger";

                                                    else

                                                        $class = "label-warning";

                                            ?>

                                            <tr>

                                                <td><?php echo $users[$i]['name']; ?></td>

                                                <td><?php echo $users[$i]['email']; ?></td>

                                                <td><?php echo $users[$i]['mobile']; ?></td>                                               

                                                <td><?php echo date('d-m-Y',strtotime($users[$i]['created_date'])); ?></td>                                                

                                                <td><?php echo $users[$i]['status']; ?></td>

                                                 <td>

                                                     <a style="text-decoration: none;" class="user-detail" data-id="<?php echo $users[$i]['id']; ?>"><span class="label label-sm <?php echo $class; ?>"> <?php echo $users[$i]['adminApproved']; ?>

                                                        <i class="fa fa-share"></i>

                                                    </span></a>

                                                 </td>


                                                <td class="aa">

                                                    <div class="btn-group pull-right">
                                                        
                                                        <a class="btn btn-xs yellow user-detail" data-id="<?php echo $users[$i]['id']; ?>"> View

                                                        <i class="fa fa-search"></i>

                                                       </a>
                                                     

                                                
                                                      <!--   <a class="btn btn-xs yellow delete-row" data-id="<?php echo $users[$i]['id']; ?>">Delete
                                                           <i class="fa fa-close"></i>
                  -->

                                                     <a  class="btn btn-xs yellow" href="users.php?delete=<?php echo $users[$i]['id']; ?>" onclick="ans = confirm('Are you sure for delete?'); if(ans == false){ return false;}">

                                                                    <i class="fa fa-close"></i> Delete </a>


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

        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>

        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>

        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

        <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

        <script src="../assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

        <script src="../assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL PLUGINS -->

        <?php 

            include('include/footer_script2.php');

        ?>

<!-- <script type="text/javascript">

   $( "a.delete-row" ).click(function() {

        var getdata = $(this).attr('data-id');
         $.ajax({
            type: 'POST',  
            url: 'delete-row.php', 
            data: { 
                rowid: getdata
            },
            success: function(response) {
                console.log(response);
            }
        });

    });

</script>>
 -->
    </body>



</html>
