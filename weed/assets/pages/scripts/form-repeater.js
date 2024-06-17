var FormRepeater = function () {

    return {
        //main function to initiate the module
        init: function () {
        	$('.mt-repeater').each(function(){
        		$(this).repeater({
        			show: function () {
	                	$(this).slideDown();
                        $('.date-picker').datepicker({
                            rtl: App.isRTL(),
                            orientation: "left",
                            autoclose: true
                        });
		            },

		            hide: function (deleteElement) {                                      
		                if(confirm('Are you sure you want to delete this element?')) {                                     
                                        var iid = $(this).attr('data-attr-id');   
                                        if(iid) {
                                        $.ajax({
                                           url: store_url+"ajax/attribute_delete.php",
                                           cache: false,
                                           data: {id:iid},
                                           success: function(html){  
                                               //$(".fileinput-"+divid).remove(); 
                                               if(html)
                                                $(this).slideUp(deleteElement);
                                           }
                                         });     
                                        }
		                }
		            },

		            ready: function (setIndexes) {

		            }

        		});
        	});
        }

    };

}();

jQuery(document).ready(function() {
    FormRepeater.init();
});
