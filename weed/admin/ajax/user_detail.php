<?php

include('../../system/config.inc.php');

  /* 

   * Paging

   */



//echo "<pre>"; print_r($_REQUEST); exit;



$db->where("id",$_REQUEST['id']);

$user = $db->get ("user",1);



$pselected = "";

$aselected = "";

$rselected = "";

$numstyle = "";

$resstyle = "";

 switch ($user[0]['adminApproved']) {

    case "Pending":

        $pselected = "selected";

        $numstyle = "style=display:none;";

        $resstyle = "style=display:none;";

        break;

    case "Approved":

        $aselected = "selected";

        $numstyle = "";

        $resstyle = "style=display:none;";

        break;

    case "Rejected":

        $rselected = "selected";

        $numstyle = "style=display:none;";

        break;

 }



 $html = '<div class="portlet blue-hoki box">

        <div class="portlet-title">

            <div class="caption">

                <i class="fa fa-cogs"></i>User Details </div>                                

        </div>

        <div class="portlet-body">

            <div class="row static-info">

                <div class="col-md-2 name"> Name: </div>

                <div class="col-md-4 value"> '.$user[0]['name'].' </div>

                <div class="col-md-2 name"> Address: </div>

                <div class="col-md-4 value"> '.$user[0]['address'].' </div>    

            </div>

            <div class="row static-info">

                <div class="col-md-2 name"> Email: </div>

                <div class="col-md-4 value"> '.$user[0]['email'].' </div>

                <div class="col-md-2 name"> Zipcode: </div>

                <div class="col-md-4 value"> '.$user[0]['zipcode'].' </div>    

            </div>

            <div class="row static-info">

                <div class="col-md-2 name"> Phone: </div>

                <div class="col-md-4 value"> '.$user[0]['mobile'].' </div>

                 <div class="col-md-2 name"> BirthDate: </div>

                <div class="col-md-4 value"> '.$user[0]['birthdate'].' </div>   

            </div>

            <div class="row static-info">

                <div class="col-md-2 name"> Status: </div>

                <div class="col-md-4 value"> '.$user[0]['status'].' </div>

            </div> 

            <div class="row static-info">

                <div class="col-md-2 name"> Admin Approved: </div>

                <div class="col-md-4 value"> '.$user[0]['adminApproved'].' </div>

            </div>';

            if($user[0]['adminApproved'] == "Rejected") {

                $html .= '<div class="row static-info">

                    <div class="col-md-2 name"> Reject Reason: </div>

                    <div class="col-md-4 value"> '.$user[0]['adminRejectReason'].' </div>

                </div>';

            }

 

        $html .= '</div>

    </div>



    <div class="row">

    <div class="col-md-6 col-sm-12">

    <div class="portlet yellow-crusta box">

        <div class="portlet-title">

            <div class="caption">

                <i class="fa fa-cogs"></i>User Identifications </div>                               

        </div>

        <div class="portlet-body">

            <div class="row static-info">';

                $html .= '<div class="col-md-4 name"> Identification: </div>';

                if(isset($user[0]['identification_photo']) && $user[0]['identification_photo']) {    

                    

                    $html .= '<div class="col-md-4 name"> 

                        <a href="'.USER_UPLOAD_URL.$user[0]['identification_photo'].'" class="fancybox-button" rel="fancybox-button">

                            <img class="img-responsive" src="'.USER_UPLOAD_URL.$user[0]['identification_photo'].'" alt=""> 

                        </a>

                    </div>';

                } else {

                   $html .= '<div class="col-md-4 value">Not Added</div>';

                }                

            $html .='</div>

            </div>

    </div>

    </div>                                                        



    <div class="col-md-6 col-sm-12">

    <div class="portlet green-meadow box">

        <div class="portlet-title">

            <div class="caption">

                <i class="fa fa-cogs"></i>Admin Action </div>                               

        </div>

        <div class="portlet-body">

            <form name="frmapprove" method="post" action="">

            <input type="hidden" name="id" value="'.$_REQUEST['id'].'">

            <div class="row static-info">

                <div class="col-md-5 name"> Admin Approved: </div>

                <div class="col-md-7 value"> 

                <select class="form-control" id="adminApproved" name="adminApproved" onchange="showhidefield();">

                    <option disabled value="Pending"'.$pselected.'>Pending</option>

                    <option value="Approved"'.$aselected.'>Approved</option>

                    <option value="Rejected"'.$rselected.'>Rejected</option>

                </select> 

                </div>

            </div>

            <div class="row static-info reject1" '.$numstyle.'>

                <div class="col-md-5 name"> Identification Number: </div>

                <div class="col-md-7 value"> 

                <input class="form-control" type="text" name="identy_id" id="identy_id" value="'.$user[0]['identification_id'].'" />

                </div>

            </div>

            

            <div class="row static-info reject" '.$resstyle.'>

                <div class="col-md-5 name"> Reject Reason: </div>

                <div class="col-md-7 value"> 

                    <div class="mt-checkbox-list">

                        <label class="mt-checkbox mt-checkbox-outline">

                            <input type="checkbox" name="reason[]" value="Identification"> Identification Photo Invalid

                            <span></span>

                        </label>

                              

                    </div>

                </div>

            </div> 

            <div class="row static-info">

                <div class="col-md-5 name"> &nbsp; </div>

                <div class="col-md-7 value"> <button type="submit" value="adminaction" name="action" class="btn green">Save</button> </div>

            </div> 

            </form>

        </div>

    </div>

    </div>     

    </div>

    <script>

        $(".fancybox-button").fancybox();         

    </script>';

 echo $html; exit;

 