<?php
    function get_connect($user_id = "dbuser174414", $user_pw = "ce174414") {
      $dbsid = "( DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP) (HOST = localhost) (PORT = 1521) ) ) 
                          (CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = orcl) ) ) ";
      
      $connect = oci_connect($user_id, $user_pw, $dbsid);
      
      return $connect;
    }

    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    function search_member($connect, $user_id) {
        $sql = "SELECT user_id FROM Customer WHERE user_id = :user_id";
        $stid = oci_parse($connect,$sql);
        
        oci_bind_by_name($stid, ":user_id", $user_id);

       
        if (oci_execute($stid)) {
            $row = oci_fetch_array($stid, OCI_ASSOC);
            
            oci_free_statement($stid);
            oci_close($connect);
            
            if (count($row))
                return $row;
        }
        
        return NULL;
    }
?>
