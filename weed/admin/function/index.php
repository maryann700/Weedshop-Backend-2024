<?php 
checkAdminLogin();
$totalProducts = 25;
$db->where("status","Active");
//$db->orderBy("id","desc");
$stores=$db->get("store",null,"id,latitude,longitude,name");
$locstr = "";
$latitude = "";
$longitude = "";
$totalstores = $db->count;
if($db->count>0) {
    for($i=0;$i<count($stores);$i++)
        $locstr .= "['".$stores[$i]['name']."', ".$stores[$i]['latitude'].", ".$stores[$i]['longitude']."],";   
    $locstr = rtrim($locstr,",");  
    $latitude = $stores[0]['latitude'];
    $longitude = $stores[0]['longitude'];
}

$db->join("driver d","dl.driver_id=d.id","LEFT");
$db->where("d.status","Active");
//$db->orderBy("id","desc");
$drivers=$db->get("driver_location dl",null,"dl.id,dl.latitude,dl.longitude,dl.address,d.name");
$locstr1 = "";
$latitude_dr = "";
$longitude_dr = "";
$totaldrivers = $db->count;
if($db->count>0) {
    for($i=0;$i<count($drivers);$i++)
        $locstr1 .= "['".$drivers[$i]['name']."', ".$drivers[$i]['latitude'].", ".$drivers[$i]['longitude'].", '".$drivers[$i]['address']."'],";   
    $locstr1 = rtrim($locstr1,",");  
    $latitude_dr = $drivers[0]['latitude'];
    $longitude_dr = $drivers[0]['longitude'];
}

$db->where("status",array('Active','Inactive'),"IN");
$totalusers = $db->getValue ("user", "count(id)");


$totalorders = $db->getValue ("orders", "count(id)");


$db->join("products p","op.product_id=p.id","LEFT");
$db->join("orders o","op.order_id=o.id","LEFT");
$db->where("o.status","Completed");
$db->groupBy ("op.product_id");
$db->orderBy("totalsell","desc");        
$topproducts = $db->get("order_products op",Array(0,5),"op.product_id,count(op.product_id) as totalsell,p.id,p.name,p.price");        
#echo "<pre>"; print_r($topproducts); exit;

$db->join("orders o","u.id=o.user_id","LEFT");
$db->where("u.status","Active");
$db->where("o.status","Completed");
$db->groupBy ("u.id");
$db->orderBy("totalorder","desc");
$newcustomers = $db->get("user u",Array(0,5),"u.id as u_id,o.id as order_id,u.name,count(o.user_id) as totalorder, SUM(o.final_total) as totalprice");
#echo $db->getLastQuery();
#echo "<pre>"; print_r($newcustomers); exit;

$db->join("user u","o.user_id=u.id","LEFT");
$db->orderBy("o.order_date","desc");
$latestorders = $db->get("orders o",Array(0,5),"u.id as uid, u.name,o.order_date,o.final_total,o.status,o.id as orderid,u.image,"
        . " CASE o.status WHEN 'Pending' THEN 'warning'"
        . " WHEN 'Inprocess' THEN 'info'"
        . " WHEN 'Completed' THEN 'success'"
        . " WHEN 'Cancel' THEN 'danger'"
        . " END as statusclass");
#echo "<pre>"; print_r($latestorders); exit;
?>