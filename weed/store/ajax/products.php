<?php
include('../system/ajax_config.inc.php');
  /* 
   * Paging
   */

  //var_dump($_POST["selected"]);

  
  $cnt = $db->getValue ("products", "count(id)");
  $iTotalRecords = $cnt;
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  
  $records = array();
  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
  
//    $db->where ("id", $_SESSION['store']['id']);
    $products = $db->get ("products",array($iDisplayStart,$iDisplayLength));    
    for($i = 0; $i < count($products); $i++) {        
    $records["data"][] = array(
      '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="'.$products[$i]['id'].'"/><span></span></label>',
      $products[$i]['id'],
      $products[$i]['name'],
      'Hybrid',
      '$'.$products[$i]['price'],      
      $products[$i]['quantity'],
      date('d-m-Y',strtotime($products[$i]['created_date'])),
      '<span class="label label-sm label-default">'.$products[$i]['status'].'</span>',
      '<a href="ecommerce_products_edit.html" class="btn btn-sm btn-default btn-circle btn-editable"><i class="fa fa-pencil"></i> Edit</a>',
    );
  }

//  $status_list = array(
//    array("default" => "Publushed"),
//    array("default" => "Not Published"),
//    array("default" => "Deleted")
//  );
//
//  for($i = $iDisplayStart; $i < $end; $i++) {
//    $status = $status_list[rand(0, 2)];
//    $id = ($i + 1);
//    $records["data"][] = array(
//      '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="'.$id.'"/><span></span></label>',
//      $id,
//      'Test Product',
//      'Hybrid',
//      '185.50$',      
//      rand(5,4000),
//      '05/01/2017',
//      '<span class="label label-sm label-'.(key($status)).'">'.(current($status)).'</span>',
//      '<a href="ecommerce_products_edit.html" class="btn btn-sm btn-default btn-circle btn-editable"><i class="fa fa-pencil"></i> Edit</a>',
//    );
//  }

  if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
    $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
    $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
  }

  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  
  echo json_encode($records);
?>