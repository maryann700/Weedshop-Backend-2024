                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <li class="sidebar-search-wrapper">&nbsp;</li>    
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <li class="nav-item start <?php if($pageName=="index") { ?>active open <?php } ?>">
                                <a href="index.php" class="nav-link ">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                    <?php if($pageName=="index") { ?>
                                    <span class="selected"></span>
                                    <?php } ?>                                    
                                </a>
                            </li>
                            <li class="nav-item start <?php if($pageName=="profile") { ?>active open <?php } ?>">
                                <a href="profile.php" class="nav-link ">
                                    <i class="icon-user"></i> 
                                    <span class="title">My Profile</span>
                                    <?php if($pageName=="profile") { ?>
                                    <span class="selected"></span>
                                    <?php } ?>  
                                </a>
                            </li>                            
                            <li class="nav-item start <?php if($pageName=="product") { ?>active open <?php } ?>">
                                <a class="nav-link " href="product.php">
                                    <i class="icon-graph"></i>
                                    <span class="title">Products</span> 
                                    <?php if($pageName=="product") { ?>
                                    <span class="selected"></span>
                                    <?php } ?> 
                                </a>
                            </li>
                            
                            <li class="nav-item start <?php if($pageName=="order") { ?>active open <?php } ?>">
                                <a class="nav-link " href="order.php">
                                    <i class="icon-basket"></i>
                                    <span class="title">Orders</span>   
                                    <?php if($pageName=="order") { ?>
                                    <span class="selected"></span>
                                    <?php } ?> 
                                </a>
                            </li>
                            
                            <!-- <li class="nav-item start <?php if($pageName=="notification") { ?>active open <?php } ?>">
                                <a class="nav-link " href="notifications.php">
                                   <i class="icon-bell"></i>
                                    <span class="title">Notifications</span>    
                                    <?php if($pageName=="notification") { ?>
                                    <span class="selected"></span>
                                    <?php } ?>
                                </a>
                            </li>
                            
                            <li class="nav-item start <?php if($pageName=="message") { ?>active open <?php } ?>">
                                <a class="nav-link " href="messages.php">
                                   <i class="icon-envelope-open"></i>
                                    <span class="title">Messages</span>   
                                    <?php if($pageName=="message") { ?>
                                    <span class="selected"></span>
                                    <?php } ?>
                                </a>
                            </li> -->
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->