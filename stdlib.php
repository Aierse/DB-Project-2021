<?php
    function get_connect($user_id, $user_pw) {
      $dbsid = "( DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP) (HOST = localhost) (PORT = 1521) ) ) 
                          (CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = orcl) ) ) ";
      
      $connect = oci_connect($user_id, $user_pw, $);
      
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
?>
