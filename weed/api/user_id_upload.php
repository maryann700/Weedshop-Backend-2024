<?php
include (__DIR__ . "/../system/config.inc.php");
if (empty($_SERVER['HTTP_APPKEY']))
{
    $result = array(
        "response" => "false",
        "msg" => "Please provide api key.",
        "data" => array()
    );
}
else if ($_SERVER['HTTP_APPKEY'] != APPKEY)
{
    $result = array(
        "response" => "false",
        "msg" => "Please provide valid api key.",
        "data" => array()
    );
}
else if (!isset($_POST["user_id"]) || empty($_POST["user_id"]))
{
    $result = array(
        "response" => "false",
        "msg" => "Please provide user id.",
        "data" => array()
    );
}
else if (!isset($_POST["type"]) || empty($_POST["type"]))
{
    $result = array(
        "response" => "false",
        "msg" => "Please provide id type.",
        "data" => array()
    );
}
else
{
    $userid = $_POST["user_id"];
    $type = $_POST["type"];
    if ($type == "id_card")
    {
        $field = "identification_photo";
        $text = "Identification";
    }
    else if ($type == "medical_card")
    {
        $field = "recommendation_photo";
        $text = "Medical Recommendation";
    }
    else
    {
        $result = array(
            "response" => "false",
            "msg" => "Please provide valid Identification type.",
            "data" => array()
        );
        echo sendResponse($result);
        exit;
    } //upload file
    if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '')
    {
        $up_result = uploadImage($_FILES['file']['name'], $_FILES['file']['tmp_name'], USER_UPLOAD_PATH);
        if ($up_result['uploaded'])
        {
            $db->where('id', $userid);
            $user = $db->getOne('user');
            if ($user["$field"]) unlink(USER_UPLOAD_PATH . $user["$field"]);
            $data = Array(
                "$field" => $up_result['uploaded_name'],
                "adminApproved" => "Pending"
            );
            $db->where('id', $userid);
            $db->update('user', $data);
            $result = array(
                "response" => "true",
                "msg" => "Your $text photo added successfully.",
                "data" => array()
            );
        }
        else
        {
            if ($up_result['msg'] == "Error")
            {
                $msg = "Upload error! try agin to upload image.";
            }
            else
            {
                $msg = "Upload error! Image extension not allowed.";
            }
            $result = array(
                "response" => "false",
                "msg" => $msg,
                "data" => array()
            );
        }
    }
    else
    {
        $result = array(
            "response" => "false",
            "msg" => "Please select file.",
            "data" => array()
        );
    }
}
echo sendResponse($result);
exit;
?>