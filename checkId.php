<?php
    include "stdlib.php";

    $id=check_input($_GET['id']);

    $row=search_member(get_connect(),$id);

    if($row==NULL){
        echo "성공";
    }
    else 
    echo "실패";
    
?>
<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>중복확인</title>
</head>
</html>