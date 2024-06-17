<?php 
checkStoreLogin();
$db->where("store_id",$_SESSION['store']['id']);
$db->where ("status", 'Deleted', "!=");
$totalProducts = $db->getValue ("products", "count(id)");

$db->where("store_id",$_SESSION['store']['id']);
$db->where ("status", 'completed');
$totalsells = $db->getValue ("orders", "sum(final_total)");
$totalsells = ($totalsells) ? $totalsells : 0;

$db->where("store_id",$_SESSION['store']['id']);
$db->where ("status", 'completed');
$totalorders = $db->getValue ("orders", "count(id)");

$db->where("store_id",$_SESSION['store']['id']);
$db->where ("status", 'Inprocess');
$totalinprocess = $db->getValue ("orders", "count(id)");

$db->join("products p","op.product_id=p.id","LEFT");
$db->join("orders o","op.order_id=o.id","LEFT");
$db->where("p.store_id",$_SESSION['store']['id']);
$db->where("o.status","Completed");
$db->groupBy ("op.product_id");
$db->orderBy("totalsell","desc");        
$topproducts = $db->get("order_products op",Array(0,5),"op.product_id,count(op.product_id) as totalsell,p.id,p.name,p.price");

$db->join("orders o","u.id=o.user_id","LEFT");
$db->where("o.store_id",$_SESSION['store']['id']);
$db->where("o.status","Completed");
$db->where("u.status","Active");
$db->groupBy ("u.id");
$db->orderBy("totalorder","desc");
$newcustomers = $db->get("user u",Array(0,5),"u.id as u_id,o.id as order_id,u.name,count(o.user_id) as totalorder, SUM(o.final_total) as totalprice");

$db->join("user u","o.user_id=u.id","LEFT");
$db->where("o.store_id",$_SESSION['store']['id']);
$db->orderBy("o.order_date","desc");
$latestorders = $db->get("orders o",Array(0,5),"u.id as uid, u.name,o.order_date,o.final_total,o.status,o.id as orderid,u.image,"
        . " CASE o.status WHEN 'Pending' THEN 'warning'"
        . " WHEN 'Inprocess' THEN 'info'"
        . " WHEN 'Completed' THEN 'success'"
        . " WHEN 'Cancel' THEN 'danger'"
        . " END as statusclass");


$monthsell=$db->rawQuery("SELECT DATE_FORMAT(order_date, '%m/%Y') AS Month, sum(final_total) AS Sell
FROM orders
WHERE status='Completed' and store_id='".$_SESSION['store']['id']."' and order_date >= Date_add(Now(),interval - 12 month)
GROUP BY DATE_FORMAT(order_date, '%m/%Y') order by order_date"); 
$monthtotalsell="";
 for($i=0;$i<count($monthsell);$i++){	 	
        $monthtotalsell .= "['".$monthsell[$i]['Month']."', ".floor($monthsell[$i]['Sell'])."],";
}
$monthtotalsell = rtrim($monthtotalsell,",");