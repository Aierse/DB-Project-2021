<?php
    function get_connect($user_id, $user_pw) {
      $dbsid = "( DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP) (HOST = localhost) (PORT = 1521) ) ) 
                          (CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = orcl) ) ) ";
      
      $connect = oci_connect($user_id, $user_pw);
      
      return $connect;
    }

    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function search_member($connect, $name) {
        $sql = "SELECT * FROM Customer WHERE name = $name";
        
        /*미완성*/
    }
	
	$sql = "INSERT INTO CUSTOMER(customer_id,user_id,user_pw,birth,name,phone_number)
				VALUES(CUSTOMER_SEQ.NEXTVAL,:user_id,:user_pw,:birth,:name,:phone_number)";
	

		
	$stid = oci_parse($conn,$sql);

	$result = (oci_execute($stid) ) ? 'Succes' : 'Fail';
	echo $result;
	
	oci_commit($conn);
	oci_free_statement($stid);
	oci_close($conn);
?>
