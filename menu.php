<style>
    .menu {
        list-style-type : none;
        margin-top : 10%;
        
        border-left : 1px solid #bebebe;
        border-right : 1px solid #bebebe;
    }

    .menu > li {
        height : 90px;
        line-height : 90px;

        width : 100%;

        text-align : center;
        font-weight: 700;
        font-size : 20px;
        letter-spacing : 16px;
        color : #e71a0f;
    }

    .menu > li:hover {
        transition-duration: 1s;
        background-color : #e71a0f;

        color : white;
    }
</style>

<ul class = "menu">
    <li onclick="상영영화()">상영 영화</a></li>
    <li onclick="좌석보기()">좌석 보기</a></li>
    <li onclick="음식보기()">음식 보기</a></li>
</ul>