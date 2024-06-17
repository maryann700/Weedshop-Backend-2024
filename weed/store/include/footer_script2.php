        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="../assets/global/scripts/custom.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <?php if($pageName == "index") { ?>
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<!--        <script src="../assets/pages/scripts/ecommerce-dashboard.min.js" type="text/javascript"></script>-->
        <!-- END PAGE LEVEL SCRIPTS -->
        <?php } ?>
        <?php if($pageName == "product") { ?>
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
<!--        <script src="../assets/pages/scripts/ecommerce-products.min.js" type="text/javascript"></script>-->
        <script src="../assets/pages/scripts/table-datatables-responsive.js" type="text/javascript"></script>           
        <script src="../assets/pages/scripts/form-repeater.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <?php } ?>
        <?php if($pageName == "order") { ?>
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/table-datatables-responsive-order.js" type="text/javascript"></script>
<!--        <script src="../assets/pages/scripts/ecommerce-orders.min.js" type="text/javascript"></script>-->
<!--        <script src="../assets/pages/scripts/ecommerce-orders-view.min.js" type="text/javascript"></script>-->
        <!-- END PAGE LEVEL SCRIPTS -->
        <?php } ?>
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->