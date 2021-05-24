<?php
    function get_connect($user_id = "dbuser174414", $user_pw = "ce1234") {
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

    function search_member($connect, $name) {
        $sql = "SELECT TOP 1 user_id FROM Customer WHERE name = $name";
        
        $stid = oci_parse($conn,$sql);
        if (oci_execute($stid)) {
            $row = oci_fetch_array($result, OCI_ASSOC);
            
            oci_free_statement($stid);
            oci_close($connect);
            
            if (count($row))
                return $row;
        }
        
        return NULL;
    }
?>
