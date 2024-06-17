<?php 
// Dashboard file created by Mehul Sonagara # 17/3/2017
include('system/config.inc.php');
include('function/reset.php');
$headTitle = "Reset Password";
$pageName = "login";
generateCSRFToken();
?>
<?php 
    include('include/header.php');
?>

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="#">
                <h3 class="form-title font-green"><b>HIGH 5 WEED</b></h3></a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">            
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="" method="post">
                <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>" />
                <input type="hidden" name="action" value="reset" />
                <h3 class="form-title font-green">Reset password</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any email and password. </span>
                </div>
               
                <?php if(isset($_SESSION['msg']) && $_SESSION['msg']=='mismatch'){ ?>                    
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                        <?php echo "Passwords mismatch."; ?>
                    </div>   
                    <?php unset($_SESSION['msg']); } if(isset($_SESSION['msg']) && $_SESSION['msg']=='expired'){ ?>                    
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                        <?php echo "This reset link is expired.";?>
                    </div> 
                    <?php unset($_SESSION['msg']); } if(isset($_SESSION['msg']) && $_SESSION['msg']=='reset'){ ?>                    
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                        <?php echo "Your password reset successfully. Please login in App with your new password";?>
                    </div> 
                    <?php unset($_SESSION['msg']); } ?>
                    <div class="form-group">
                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                        <label class="control-label visible-ie8 visible-ie9">Email</label>
                        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" value="<?php echo (isset($_SESSION['reset']['email'])) ? $_SESSION['reset']['email'] : ""; ?>" readonly="true"/> </div>
                    <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">New Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="New Password" name="password" /> </div>
                    <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirm Password" name="cpassword" /> </div>
                <div class="form-actions">
                    <button type="submit" name="reset" value="reset" class="btn green uppercase">Reset</button>                   
                </div>
                
<!--                <div class="create-account">
                    <p>
                        <a href="javascript:;" id="register-btn" class="uppercase">Create an account</a>
                    </p>
                </div>-->
            </form>
            <!-- END LOGIN FORM -->
           
        </div>
        <div class="copyright"> Copyright &copy; HIGH 5 WEED <?php echo date('Y'); ?> </div>
        <!--[if lt IE 9]>
        <script src="assets/global/plugins/respond.min.js"></script>
        <script src="assets/global/plugins/excanvas.min.js"></script> 
        <script src="assets/global/plugins/ie8.fix.min.js"></script> 
        <![endif]-->
        <?php 
            include('include/footer_script1.php');
        ?> 
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>