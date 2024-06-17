<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?php echo $sitename.$headTitle?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Weed,Sativa,Hybrid" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <?php if($pageName == "index") { ?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->        
            <link href="../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />    
            <link href="../assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
            <!-- END PAGE LEVEL PLUGINS -->
        <?php } else if($pageName == "profile") { ?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
            <!-- END PAGE LEVEL PLUGINS -->
        <?php } else if($pageName == "product" || $pageName == "order" || $pageName == "category" || $pageName == "type" || $pageName == "region" || $pageName == "user" || $pageName == "store" || $pageName == "email" || $pageName == "driver" || $pageName == "pending" || $pageName == "delivery") { ?>    
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
            <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
            <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
            <link href="../assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
            <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
            
            <link href="../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css" />
            <link href="../assets/global/plugins/jquery-minicolors/jquery.minicolors.css" rel="stylesheet" type="text/css" />
            
            <!-- END PAGE LEVEL PLUGINS -->            
        <?php } else if($pageName == "login") { ?>
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <link href="../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
            <link href="../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
            <!-- END PAGE LEVEL PLUGINS -->
        <?php } ?>
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <?php if($pageName == "profile") { ?>
            <!-- BEGIN PAGE LEVEL STYLES -->
            <link href="../assets/pages/css/profile-2.min.css" rel="stylesheet" type="text/css" />
            <!-- END PAGE LEVEL STYLES -->
        <?php } ?>
        <?php if($pageName == "login") { ?>
            <!-- BEGIN PAGE LEVEL STYLES -->
            <link href="../assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
            <!-- END PAGE LEVEL STYLES -->
        <?php } ?>    
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
    </head>
    <!-- END HEAD -->