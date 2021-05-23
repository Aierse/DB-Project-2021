<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>영화 예매 사이트</title>
    <style>
        .menu{
            width:545px;
            margin:auto;
            text-align:center;
        }
        li a{
            display: inline-block;
            color:black;
            text-align: center;
            padding: 20px 50px;
            text-decoration: none;
        }
        li a:hover:not(.active){
            background-color:#00D7FF;
        }
        ul{
            list-style-type: none;
            padding:0;
            margin:10px;
            overflow: hidden;
            background-color:white;
            border-style: solid;

        }
        li{
            float:left;
        }
        .seatlist{
            float : left;
        }
        .seat{
            text-align : center;
            width : 40px;
            height : 40px;
        }
        .table{
            width : 480px;
            margin : 0 auto;
        }
</style>
</head>
<body>
    <div class="menu">
    <ul>
    <li onclick="상영영화()"><a href="상영영화">상영 영화</a></li>
    <li onclick="좌석보기()"><a href="좌석보기">좌석 보기</a></li>
    <li onclick="음식보기()"><a href="음식보기">음식 보기</a></li>
    </ul>
    </div>
    <hr>
    <div class = 'table'>
    <?php
        for($i=0; $i<10; $i++)
        {
            echo "<div class='seatlist'>";
            for ($j = 0; $j < 10; $j++){
                echo "<input type='label' class = 'seat' value='$i-$j' disabled = 'disabled' onclick=''/><br/>";
                
            }
            echo "</div>";
        }
    ?>
    </div>
</body>
</html>