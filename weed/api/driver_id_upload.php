<?phpinclude(__DIR__ . "/../system/config.inc.php");if(empty($_SERVER['HTTP_APPKEY'])) {    $result = array("response"=>"false","msg"=>"Please provide api key.","data"=>array());} else if($_SERVER['HTTP_APPKEY'] != APPKEY) {    $result = array("response"=>"false","msg"=>"Please provide valid api key.","data"=>array());} else if(!isset($_POST["driver_id"]) || empty($_POST["driver_id"])) {    $result = array("response"=>"false","msg"=>"Please provide driver id.","data"=>array());} else if(!isset($_POST["type"]) || empty($_POST["type"])) {    $result = array("response"=>"false","msg"=>"Please provide id type.","data"=>array());} else {        $userid = $_POST["driver_id"];    $type = $_POST["type"];    if($type=="id_card") {        $field = "identification_photo";        $text = "Identification";    } else if($type=="car_document") {        $field = "car_document";        $text = "Car Information";        if(!isset($_POST['car_number']) || empty ($_POST['car_number'])) {            $result = array("response"=>"false","msg"=>"Please provide car number.","data"=>array());              echo sendResponse($result);            exit;         } else if(!isset($_POST['car_brand']) || empty ($_POST['car_brand'])) {            $result = array("response"=>"false","msg"=>"Please provide car brand name.","data"=>array());              echo sendResponse($result);            exit;        }    } else {       $result = array("response"=>"false","msg"=>"Please provide valid Identification type.","data"=>array());         echo sendResponse($result);       exit;    }          //upload file    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] !='') {        $up_result = uploadImage($_FILES['file']['name'],$_FILES['file']['tmp_name'],USER_UPLOAD_PATH);        if($up_result['uploaded']) {                        $db->where ('id', $userid);            $user = $db->getOne ('driver');            if($user["$field"])                unlink(USER_UPLOAD_PATH.$user["$field"]);                        if($type=="car_document") {                $data = Array (                    "$field" => $up_result['uploaded_name'],                    "car_number" => $_POST['car_number'],                    "car_brand" => $_POST['car_brand'],                    "adminApproved" => "Pending"                );            } else {                $data = Array (                    "$field" => $up_result['uploaded_name'],                    "adminApproved" => "Pending"                );            }            $db->where ('id', $userid);            $db->update ('driver', $data);            $result = array("response"=>"true","msg"=>"Your $text added successfully.","data"=>array());         } else {            if($up_result['msg'] == "Error") {                $msg = "Upload error! try agin to upload image.";                          } else {                $msg = "Upload error! Image extension not allowed.";                            }                                       $result = array("response"=>"false","msg"=>$msg,"data"=>array());          }                    } else {        $result = array("response"=>"false","msg"=>"Please select file.","data"=>array());            }}echo sendResponse($result);exit;