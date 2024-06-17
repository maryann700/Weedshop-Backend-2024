<?PHP
/*--------------------------------------------------------------------------------------
@Desc       :   Simple and Cool Paging with PHP
@author     :   SachinKRaj - http://blog.sachinkraj.com
@updates    :   http://blog.sachinkraj.com/how-to-create-simple-paging-with-php-cs/
@Comments   :   If you like my work, please drop me a comment on the above post link. 
                Thanks!
---------------------------------------------------------------------------------------*/
    function check_integer($which) {
        if(isset($_REQUEST[$which])){
            if (intval($_REQUEST[$which])>0) {
                //check the paging variable was set or not, 
                //if yes then return its number:
                //for example: ?page=5, then it will return 5 (integer)
                return intval($_REQUEST[$which]);
            } else {
                return false;
            }
        }
        return false;
    }//end of check_integer()

    function get_current_page() {
        if(($var=check_integer('page'))) {
            //return value of 'page', in support to above method
            return $var;
        } else {
            //return 1, if it wasnt set before, page=1
            return 1;
        }
    }//end of method get_current_page()

    function doPages($page_size, $thepage, $query_string, $total=0) {
        
        //per page count
        $index_limit = 10;

        //set the query string to blank, then later attach it with $query_string
        $query='';
        
        if(strlen($query_string)>0){
            $query = "&amp;".$query_string;
        }
        
        //get the current page number example: 3, 4 etc: see above method description
        $current = get_current_page();
        
        $total_pages=ceil($total/$page_size);
        $start=max($current-intval($index_limit/2), 1);
        $end=$start+$index_limit-1;

        echo '<div id="mainpagging" >';

        if($current==1) {
            echo '<span class="active" >&larr; Prev</span>&nbsp;';
        } else {
            $i = $current-1;
            echo '<a href="'.$thepage.'page='.$i.$query.'" rel="nofollow" title="go to page '.$i.'">&larr; Prev</a>&nbsp;';
           
        }

        if($start > 1) {
            $i = 1;
            echo '<a href="'.$thepage.'page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
        }

        for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
            if($i==$current) {
                echo '<span class="active">'.$i.'</span>&nbsp;';
            } else {
                echo '<a href="'.$thepage.'page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
            }
        }

        if($total_pages > $end){
            $i = $total_pages;
            echo '<a href="'.$thepage.'page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
        }

        if($current < $total_pages) {
            $i = $current+1;
           
            echo '<a href="'.$thepage.'page='.$i.$query.'"  rel="nofollow" title="go to page '.$i.'"> Next &nbsp;&rarr;</a>&nbsp;';
        } else {
            echo '<span class="active" >Next &rarr; </span>&nbsp;';
        }
        
    	echo '</div>';

    }//end of method doPages()

        
    ?>
