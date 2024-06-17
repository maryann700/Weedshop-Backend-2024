<?php
include('../../system/config.inc.php');
if(isset($_POST['type'])){
	$type=$_POST['type'];
	
	if($type=="pending"){
		$db->join("user u","o.user_id=u.id","LEFT");
		$db->where("o.status","Pending");
		$db->orderBy("o.order_date","desc");
		$orders = $db->get("orders o",Array(0,6),"u.id as uid, u.name,o.order_date,o.final_total,o.status,o.id as orderid,u.image,"
        . " CASE o.status WHEN 'Pending' THEN 'warning'"
        . " WHEN 'Inprocess' THEN 'info'"
        . " WHEN 'Completed' THEN 'success'"
        . " WHEN 'Cancel' THEN 'danger'"
        . " END as statusclass");
} else if($type=="inprocess"){
		$db->join("user u","o.user_id=u.id","LEFT");
		$db->where("o.status","Inprocess");
		$db->orderBy("o.order_date","desc");
		$orders = $db->get("orders o",Array(0,6),"u.id as uid, u.name,o.order_date,o.final_total,o.status,o.id as orderid,u.image,"
        . " CASE o.status WHEN 'Pending' THEN 'warning'"
        . " WHEN 'Inprocess' THEN 'info'"
        . " WHEN 'Completed' THEN 'success'"
        . " WHEN 'Cancel' THEN 'danger'"
        . " END as statusclass");

	} else if($type=="latest"){
		$db->join("user u","o.user_id=u.id","LEFT");
		$db->orderBy("o.order_date","desc");
		$orders = $db->get("orders o",Array(0,6),"u.id as uid, u.name,o.order_date,o.final_total,o.status,o.id as orderid,u.image,"
        . " CASE o.status WHEN 'Pending' THEN 'warning'"
        . " WHEN 'Inprocess' THEN 'info'"
        . " WHEN 'Completed' THEN 'success'"
        . " WHEN 'Cancel' THEN 'danger'"
        . " END as statusclass");

		} else if($type=="completed"){
		$db->join("user u","o.user_id=u.id","LEFT");
		$db->where("o.status","Completed");
		$db->orderBy("o.order_date","desc");
		$orders = $db->get("orders o",Array(0,6),"u.id as uid, u.name,o.order_date,o.final_total,o.status,o.id as orderid,u.image,"
        . " CASE o.status WHEN 'Pending' THEN 'warning'"
        . " WHEN 'Inprocess' THEN 'info'"
        . " WHEN 'Completed' THEN 'success'"
        . " WHEN 'Cancel' THEN 'danger'"
        . " END as statusclass");
} else {
		echo "Not found";
		exit;
	}	
	$html = "";
	
        if(count($orders)>0) {
	for($i=0;$i<count($orders);$i++) { 
     $html.= '   <tr>
                 <td>
                     <a href="javascript:;">'. $orders[$i]['name'].' </a>
                 </td>
                 <td>'.date('d F, Y',strtotime($orders[$i]['order_date'])).'</td>
                 <td>'.$orders[$i]['final_total'].'</td>
                 <td>
                     <span class="label label-sm label-'. $orders[$i]['statusclass'].'">'. $orders[$i]['status'].'</span>
                 </td>
                 <td>
                     <a target="_blank" href="order_view.php?id='. $orders[$i]['orderid'].'" class="btn btn-sm btn-default">
                         <i class="fa fa-search"></i> View </a>
                 </td>
             </tr>';
	}
        } else {
            $html .= "<tr><td colspan='5'>Record not found!</td></tr>";
        }
		

	echo $html;
	exit;
}
echo "Not found";
exit;
                                                    