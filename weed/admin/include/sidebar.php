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
                            <li class="nav-item start <?php if($pageName=="store") { ?>active open <?php } ?>">
                                <a class="nav-link " href="store.php">
                                    <i class="icon-basket"></i>
                                    <span class="title">Stores</span> 
                                    <?php if($pageName=="store") { ?>
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
                            <li class="nav-item start <?php if($pageName=="user") { ?>active open <?php } ?>">
                                <a class="nav-link " href="users.php">
                                    <i class="fa fa-users"></i>
                                    <span class="title">Users</span> 
                                    <?php if($pageName=="user") { ?>
                                    <span class="selected"></span>
                                    <?php } ?> 
                                </a>
                            </li>
                            <li class="nav-item start <?php if($pageName=="driver") { ?>active open <?php } ?>">
                                <a class="nav-link " href="drivers.php">
                                    <i class="fa fa-users"></i>
                                    <span class="title">Drivers</span> 
                                    <?php if($pageName=="driver") { ?>
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
                            <?php							
                                $db->where ("status", "Pending", "=");
                                $db->where ("driver_id", "0", "=");							
                                $cnt_pending_order = $db->getValue ("orders", "count(id)");
                            ?>
                            <li class="nav-item start <?php if($pageName=="pending") { ?>active open <?php } ?>">
                                <a class="nav-link " href="pending.php">
                                    <i class="icon-basket"></i>
                                    <span class="title">Pending Orders</span>
                                    <span class="badge badge-default"><?php echo $cnt_pending_order; ?></span>
                                    <?php if($pageName=="pending") { ?>
                                    <span class="selected"></span>
                                    <?php } ?> 
                                </a>
                            </li>
                             <li class="nav-item <?php if($pageName=="category" || $pageName=="type" || $pageName=="region" || $pageName=="delivery") { ?>active open <?php } ?>">
                                <a class="nav-link nav-toggle" href="category.php">
                                    <i class="fa fa-gear"></i>
                                    <span class="title">General</span> 
                                    <?php if($pageName=="category" || $pageName=="type" || $pageName=="region") { ?>
                                    <span class="selected"></span>
                                    <?php } ?> 
                                </a>
                                 <ul class="sub-menu" <?php if($pageName=="category" || $pageName=="type" || $pageName=="region") { ?>style="display: block;"<?php } ?>>
                                    <li class="nav-item start <?php if($pageName=="category") { ?>active open <?php } ?>">
                                        <a class="nav-link" href="category.php">
<!--                                            <i class="fa fa-gear"></i>-->
                                            <span class="title">Weed Categories</span> 
                                            <?php if($pageName=="category") { ?>
                                            <span class="selected"></span>
                                            <?php } ?> 
                                        </a>
                                    </li>
                                    <li class="nav-item start <?php if($pageName=="type") { ?>active open <?php } ?>">
                                        <a class="nav-link" href="type.php">
<!--                                            <i class="fa fa-gear"></i>-->
                                            <span class="title">Weed Types</span> 
                                            <?php if($pageName=="type") { ?>
                                            <span class="selected"></span>
                                            <?php } ?> 
                                        </a>
                                    </li>
                                    <li class="nav-item start <?php if($pageName=="region") { ?>active open <?php } ?>">
                                        <a class="nav-link" href="region.php">
<!--                                            <i class="fa fa-gear"></i>-->
                                            <span class="title">Regions</span> 
                                            <?php if($pageName=="region") { ?>
                                            <span class="selected"></span>
                                            <?php } ?> 
                                        </a>
                                    </li>
                                    <li class="nav-item start <?php if($pageName=="delivery") { ?>active open <?php } ?>">
                                        <a class="nav-link" href="delivery_fees.php">
<!--                                            <i class="fa fa-gear"></i>-->
                                            <span class="title">Delivery Fees</span> 
                                            <?php if($pageName=="delivery") { ?>
                                            <span class="selected"></span>
                                            <?php } ?> 
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                            
                             <li class="nav-item start <?php if($pageName=="app_version") { ?>active open <?php } ?>">
                                <a href="app_version.php" class="nav-link ">
                                    <i class="icon-basket"></i> 
                                    <span class="title">App Version</span>
                                    <?php if($pageName=="app_version") { ?>
                                    <span class="selected"></span>
                                    <?php } ?>  
                                </a>
                            </li>        
                            
                            <!--
                            <li class="nav-item start <?php if($pageName=="notification") { ?>active open <?php } ?>">
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