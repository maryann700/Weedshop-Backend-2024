
$(".pr-detail").click(function(){
   var iid = $(this).attr('data-id'); 
   //$('#detail').modal('show');
   $.ajax({
      url: "ajax/product_detail.php",
      cache: false,
      data: {id:iid},
      success: function(html){  
           $(".modal-detail").html(html);
           $('#detail').modal('show');
      }
    });
});  

$(".user-detail").click(function(){
    var iid = $(this).attr('data-id'); 
    //$('#detail').modal('show');
    $.ajax({
       url: "ajax/user_detail.php",
       cache: false,
       data: {id:iid},
       success: function(html){  
            $(".modal-detail1").html(html);
            $('#detail1').modal('show');
       }
     });
});  
function showhidefield() {
    var val = $("#adminApproved").val();            
    if(val==="Approved") {                
        $(".reject1").show();
        $(".reject2").show();                      
        $(".reject").hide();                   
    } else if(val==="Rejected") {
        $(".reject1").hide();
        $(".reject2").hide(); 
        $(".reject").show();                    
    }
}

$("#order_list li a").on("click", function(){
    var otype = $(this).attr('ordertype');
    $.ajax({
        url: "ajax/order_list.php",
        type: "POST",
        data: {type:otype},
        success: function(data){ 
            $("#overview_4 tbody").html(data);
        }
    });
});    
