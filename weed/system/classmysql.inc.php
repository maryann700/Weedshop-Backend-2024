<?php
  class dbclass {	
		var $CONN;
		function dbclass() { //constructor
			$conn = mysql_connect(SERVER_NAME,USER_NAME,PASSWORD);	
			if(!$conn) 
				{	$this->error("Connection attempt failed");		}
			if(!mysql_select_db(DB_NAME,$conn)) 
				{	$this->error("Database Selection failed");		}
			$this->CONN = $conn;
			return true;
		}
		//_____________close connection____________//
		function close(){
			$conn = $this->CONN ;
			$close = mysql_close($conn);
			if(!$close){
			  $this->error("Close Connection Failed");	}
			return true;
		}
	
		function error($text) {
			$no = mysql_errno();
			$msg = mysql_error();
			echo "<hr><font face=verdana size=2>";
			echo "<b>Custom Message :</b> $text<br><br>";
			echo "<b>Error Number :</b> $no<br><br>";
			echo "<b>Error Message	:</b> $msg<br><br>";
			echo "<hr></font>";
			exit;
		}
		//_____________select records___________________//
		function select ($sql=""){
			if(empty($sql)) { return false; }
			if(!explode("^select",$sql)){	
			  echo "Wrong Query<hr>$sql<p>";
					return false;		}
			if(empty($this->CONN)) { return false; }
			$conn = $this->CONN;
			$results = @mysql_query($sql,$conn);			
			if((!$results) or empty($results))	{	return false;		}
			$count = 0;
			$data  = array();
			while ( $row = mysql_fetch_assoc($results))	{	
				$data[$count] = $row;
				$count++;		}
			mysql_free_result($results);
			return $data;
		}
	 
	    //________insert record__________________//
		function insert ($sql=""){
			if(empty($sql)) { return false; }
			if(empty($this->CONN)){	return false;		}
			$conn = $this->CONN;			
			$results = @mysql_query($sql,$conn);			
			if(!$results){
				$this->error("Insert Operation Failed..<hr>$sql<hr>");
				return false;		}
			$id = mysql_insert_id();
			return $id;
		}
	    //___________edit and modify record___________________//
		function edit($sql="")	{
			if(empty($sql)) { 	return false; 		}
			if(empty($this->CONN)){	return false;		}
			$conn = $this->CONN;
			$results = @mysql_query($sql,$conn);
			$rows = 0;
			$rows = @mysql_affected_rows();
			return $rows;
		}
		//____________generalize for all queries___________//
		function sql_query($sql="")	{	
			
			if(empty($sql)) { return false; }
			if(empty($this->CONN)) { return false; }
			$conn = $this->CONN;
			$results = mysql_query($sql,$conn) or $this->error("Something wrong in query<hr>$sql<hr>");
			
			if(!$results){
			   $this->error("Query went bad ! <hr>$sql<hr>");
					return false;		}		
			if(!preg_match("/^select/",$sql)){return true; 		}
			else {
		  	    $count = 0;
				$data = array();
				while ( $row = mysql_fetch_array($results))
				{	$data[$count] = $row;
					$count++;				}
				mysql_free_result($results);
				return $data;
		 	}
		}	
		
	function extraqueries($sql="")	{	
			
			if(empty($sql)) { return false; }
			if(empty($this->CONN)) { return false; }
			$conn = $this->CONN;
			$results = mysql_query($sql,$conn) or $this->error("Something wrong in query<hr>$sql<hr>");
			
			if(!$results){
			   $this->error("Query went bad ! <hr>$sql<hr>");
					return false;		}		
			else {
		  	    $count = 0;
				$data = array();
				while ( $row = mysql_fetch_array($results))
				{	$data[$count] = $row;
					$count++;				}
				mysql_free_result($results);
				return $data;
		 	}
		}
                
            function clean( $data )
            {

                if( !is_array( $data ) )

                {

                   $data = stripslashes( $data );

                   $data = html_entity_decode( $data, ENT_QUOTES, 'UTF-8' );

                   //$data = nl2br( $data );

                   $data = urldecode( $data );

                }

                else

                {

                    //Self call function to sanitize array data

                    $data = array_map( array( $this, 'clean' ), $data );

                }

                return $data;

            }
	
	} 
	
?>