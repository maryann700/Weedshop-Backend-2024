<?php 
// Product file created by Mehul Sonagara # 17/3/2017
include('../system/config.inc.php');
//include('function/type.php');
checkStoreLogin();

$headTitle = "Messages";
$pageName = "message";
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
                                    <span>Messages</span>
                                </li>
                            </ul>                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
<!--                        <h1 class="page-title">Notifications</h1>-->
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
                            <div class="col-lg-6 col-xs-12 col-sm-12">    
                                <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-hide hide"></i>
                                        <span class="caption-subject font-hide bold uppercase">Select Users for Chat</span>
                                    </div>
                                </div>    
                                <div class="tab-content">                                    
                                    <div class="mt-comments scroller" style="height: 442px;" data-always-visible="1" data-rail-visible1="1">    
                                        <h5 class="list-heading">Stores</h5>
                                        <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar4.jpg" /> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author" style="margin-bottom:0px;">Michael Baker                                                       
                                                    </span>                                                    
                                                    <div class="mt-comment-date media-status">
                                                        <span class="badge badge-success">8</span>
                                                    </div>                                                    
                                                </div>
                                                <span class="mt-comment-status">Centeral Coast</span>                                                
                                            </div>
                                        </div>
                                         <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar8.jpg" /> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author" style="margin-bottom:0px;">Michael Baker                                                       
                                                    </span>                                                    
                                                    <div class="mt-comment-date media-status">
<!--                                                        <span class="badge badge-success">8</span>-->
                                                    </div>                                                    
                                                </div>
                                                <span class="mt-comment-status">Centeral Coast</span>                                                
                                            </div>
                                        </div>
                                         <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar6.jpg" /> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author" style="margin-bottom:0px;">Michael Baker                                                       
                                                    </span>                                                    
                                                    <div class="mt-comment-date media-status">
<!--                                                        <span class="badge badge-success">8</span>-->
                                                    </div>                                                    
                                                </div>
                                                <span class="mt-comment-status">Centeral Coast</span>                                                
                                            </div>
                                        </div>
                                         <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar4.jpg" /> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author" style="margin-bottom:0px;">Michael Baker                                                       
                                                    </span>                                                    
                                                    <div class="mt-comment-date media-status">
                                                        <span class="badge badge-success">3</span>
                                                    </div>                                                    
                                                </div>
                                                <span class="mt-comment-status">Centeral Coast</span>                                                
                                            </div>
                                        </div>
                                         <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar4.jpg" /> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author" style="margin-bottom:0px;">Michael Baker                                                       
                                                    </span>                                                    
                                                    <div class="mt-comment-date media-status">
<!--                                                        <span class="badge badge-success">8</span>-->
                                                    </div>                                                    
                                                </div>
                                                <span class="mt-comment-status">Centeral Coast</span>                                                
                                            </div>
                                        </div>
                                        <h5 class="list-heading">Users</h5>
                                         <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar4.jpg" /> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author" style="margin-bottom:0px;">Michael Baker                                                       
                                                    </span>                                                    
                                                    <div class="mt-comment-date media-status">
<!--                                                        <span class="badge badge-success">8</span>-->
                                                    </div>                                                    
                                                </div>
                                                <span class="mt-comment-status">Centeral Coast</span>                                                
                                            </div>
                                        </div>
                                         <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar4.jpg" /> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author" style="margin-bottom:0px;">Michael Baker                                                       
                                                    </span>                                                    
                                                    <div class="mt-comment-date media-status">
<!--                                                        <span class="badge badge-success">8</span>-->
                                                    </div>                                                    
                                                </div>
                                                <span class="mt-comment-status">Centeral Coast</span>                                                
                                            </div>
                                        </div>
                                         <div class="mt-comment">
                                            <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar4.jpg" /> </div>
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author" style="margin-bottom:0px;">Michael Baker                                                       
                                                    </span>                                                    
                                                    <div class="mt-comment-date media-status">
<!--                                                        <span class="badge badge-success">8</span>-->
                                                    </div>                                                    
                                                </div>
                                                <span class="mt-comment-status">Centeral Coast</span>                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                             <div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-bubble font-hide hide"></i>
                                            <span class="caption-subject font-hide bold uppercase">Chats</span>
                                        </div>
<!--                                        <div class="actions">
                                            <div class="portlet-input input-inline">
                                                <div class="input-icon right">
                                                    <i class="icon-magnifier"></i>
                                                    <input type="text" class="form-control input-circle" placeholder="search..."> </div>
                                            </div>
                                        </div>-->
                                    </div>
                                    <div class="portlet-body" id="chats">
                                        <div class="scroller" style="height: 365px;" data-always-visible="1" data-rail-visible1="1">
                                            <ul class="chats">
                                                <li class="out">
                                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a href="javascript:;" class="name"> Lisa Wong </a>
                                                        <span class="datetime"> at 20:11 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                                <li class="out">
                                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a href="javascript:;" class="name"> Lisa Wong </a>
                                                        <span class="datetime"> at 20:11 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                                <li class="in">
                                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar1.jpg" />
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a href="javascript:;" class="name"> Bob Nilson </a>
                                                        <span class="datetime"> at 20:30 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                                <li class="in">
                                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar1.jpg" />
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a href="javascript:;" class="name"> Bob Nilson </a>
                                                        <span class="datetime"> at 20:30 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                                <li class="out">
                                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a href="javascript:;" class="name"> Richard Doe </a>
                                                        <span class="datetime"> at 20:33 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                                <li class="in">
                                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a href="javascript:;" class="name"> Richard Doe </a>
                                                        <span class="datetime"> at 20:35 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                                <li class="out">
                                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar1.jpg" />
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a href="javascript:;" class="name"> Bob Nilson </a>
                                                        <span class="datetime"> at 20:40 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                                <li class="in">
                                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a href="javascript:;" class="name"> Richard Doe </a>
                                                        <span class="datetime"> at 20:40 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                                <li class="out">
                                                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar1.jpg" />
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a href="javascript:;" class="name"> Bob Nilson </a>
                                                        <span class="datetime"> at 20:54 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod tincidunt ut laoreet.
                                                            </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="chat-form">
                                            <div class="input-cont">
                                                <input class="form-control" type="text" placeholder="Type a message here..." /> </div>
                                            <div class="btn-cont">
                                                <span class="arrow"> </span>
                                                <a href="" class="btn blue icn-only">
                                                    <i class="fa fa-check icon-white"></i>
                                                </a>
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
    </body>

</html>