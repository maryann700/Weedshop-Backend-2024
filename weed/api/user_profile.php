<?phpinclude(__DIR__ . "/../system/config.inc.php");if(empty($_SERVER['HTTP_APPKEY'])) {    $result = array("response"=>"false","msg"=>"Please provide api key.","data"=>array());} else if($_SERVER['HTTP_APPKEY'] != APPKEY) {    $result = array("response"=>"false","msg"=>"Please provide valid api key.","data"=>array());} else if(!isset($_POST["user_id"]) || empty($_POST["user_id"])) {    $result = array("response"=>"false","msg"=>"Please provide user id.","data"=>array());} else if(!isset($_POST["action"]) || empty($_POST["action"])) {    $result = array("response"=>"false","msg"=>"Please provide action.","data"=>array());} else {    if($_POST["action"] == "edit") {         if(!isset($_POST["name"]) || empty($_POST["name"])) {           $result = array("response"=>"false","msg"=>"Please provide name.","data"=>array());         } else if(!isset($_POST["mobile"]) || empty($_POST["mobile"])) {           $result = array("response"=>"false","msg"=>"Please provide phone.","data"=>array());         } else if(!isset($_POST["birthdate"]) || empty($_POST["birthdate"])) {           $result = array("response"=>"false","msg"=>"Please provide birthdate.","data"=>array());         } else if(!isset($_POST["address"]) || empty($_POST["address"])) {           $result = array("response"=>"false","msg"=>"Please provide address.","data"=>array());          } else {            $data = array(                'name' => $_POST["name"],                'mobile' => $_POST["mobile"],                'birthdate' => $_POST["birthdate"],                'address' => trim($_POST["address"])            );              if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {                $up_result = uploadImage($_FILES['image']['name'],$_FILES['image']['tmp_name'],USER_UPLOAD_PATH);                if($up_result['uploaded']) {                                $db->where ('id', $_POST['user_id']);                    $user = $db->getOne ('user');                    if($user["image"])                        unlink(USER_UPLOAD_PATH.$user["image"]);                    $data['image'] = $up_result['uploaded_name'];                }            }            $db->where ('id', $_POST['user_id']);            $db->update ('user', $data);              $db->where ("u.id", $_POST['user_id']);                $user = $db->get ("user u",array(0,1),'u.id,u.name,u.email,u.birthdate,u.image,u.mobile,u.address,u.identification_id,u.recommendation_id,CONCAT("'.USER_UPLOAD_URL.'",u.`image`) AS `image_url`');            $msg = "User Profile Updated";            $result = array("response"=>"true","msg"=>$msg,"data"=> $user);          }        } else {        $db->where ("u.id", $_POST['user_id']);            $user = $db->get ("user u",array(0,1),'u.id,u.name,u.email,u.birthdate,u.image,u.mobile,u.address,u.identification_id,u.recommendation_id,CONCAT("'.USER_UPLOAD_URL.'",u.`image`) AS `image_url`');        $msg = "User Profile!";        $result = array("response"=>"true","msg"=>$msg,"data"=> $user);    }}echo sendResponse($result);exit;