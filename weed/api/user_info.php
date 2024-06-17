<?php 
include(__DIR__ . "/../system/config.inc.php");
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
else
{
    $user_id = trim($_POST["user_id"]);
    $db->where("id", $user_id);
    $user = $db->getOne("user");
    if ($db->count > 0)
    {
        $approvemsg = "";
        switch ($user['adminApproved'])
        {
            case "Pending":
                $approvemsg = "We will verify your personal details and documents once completed that process then you can access this application.";
            break;
            case "Rejected":
                $rejectreason = str_replace(",", " and ", $user['adminRejectReason']);
                $approvemsg = "We was verified your personal detail and documents admin was rejected your $rejectreason dcouments, please again provide valid documents and access this application.";
            break;
        }
        $user['verifymsg'] = $approvemsg;
        $msg = "User info!";
        $result = array(
            "response" => "true",
            "msg" => $msg,
            "data" => $user
        );
    }
    else
    {
        $result = array(
            "response" => "false",
            "msg" => "Please provide valid user id",
            "data" => array()
        );
    }
}
echo sendResponse($result);
exit;

