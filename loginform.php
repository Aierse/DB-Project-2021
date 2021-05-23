<style>
/* 로그인 폼 */
    .login {
        margin : 5%;
        padding : 5%;
        border : 1px solid black;
        }
/*라디오 버튼 숨김*/
    .login > input:nth-of-type(1) { display : none; }
    .login > input:nth-of-type(2) { display : none; }

    .login > input:nth-of-type(1) ~ div:nth-of-type(1) { display : none; }
    .login > input:nth-of-type(2) ~ div:nth-of-type(2) { display : none; }

    .login > input:nth-of-type(1):checked ~ div:nth-of-type(1) { display : block; }
    .login > input:nth-of-type(2):checked ~ div:nth-of-type(2) { display : block; }
/*라벨 모양 지정*/
    .login > .buttons > label {
        display : block;
        float : left;

        width : 49%;
        height : 45px;
        line-height : 45px;
        text-align : center;
        margin-bottom : 5%;
    }
/* 회원 버튼 클릭시 */
    .login > input:nth-of-type(1):checked ~ .buttons > label:nth-of-type(1) {
        border : 1px solid black;
        border-bottom : 0;
    }

    .login > input:nth-of-type(1):checked ~ .buttons > label:nth-of-type(2) {
        border-top  : 1px solid #bebebe;
        border-right : 1px solid #bebebe;
        border-bottom : 1px solid black;
    }
/*비회원 버튼 클릭시 */
    .login > input:nth-of-type(2):checked ~ .buttons > label:nth-of-type(1) {
        border-top  : 1px solid #bebebe;
        border-left : 1px solid #bebebe;
        border-bottom : 1px solid black;

    }

    .login > input:nth-of-type(2):checked ~ .buttons > label:nth-of-type(2) {
        border : 1px solid black;
        border-bottom : 0;
    }
/*로그인 입력창*/
    .login > div > input {
        outline : none;

        border : 1px solid gray;
        padding-left : 4%;
        width : 94.5%;
        height : 40px;
        margin-bottom : 5%;
        text-align : left;
    }
/*로그인 버튼*/
    .logging {
        outline : none;

        width : 99%;
        height : 45px;
        border : 1px solid gray;

        background-color : #e71a0f;
        font-weight: 700;
        font-size : 16px;
        letter-spacing : 16px;
        color : white;
    }
/*회원가입 , ID 창 */
    .manage {
        margin-top : 5%;
    }

    .manage > ul {
        padding : 0;
        overflow : hidden;
        list-style-type : none;
    }
    
    .manage > ul > li {
        text-align : center;
        padding : 0 3%;
        float : left;
    }

    .manage > ul > li:nth-of-type(1) {
        width : 33%;
        border-right : 1px solid #bebebe;
    }
    
    .manage > ul > li:nth-of-type(2) {
        width : 53%;
    }

    .manage > ul > li > a {
        color: #5a5a5a;
    }
</style>

<form class = "login">
    <input id = "member" type = "radio" name = "tab" checked = "checked">
    <input id = "non-member" type = "radio" name = "tab">
    <section class = "buttons">
        <label class = "first" for = "member">회원</label>
        <label class = "second" for = "non-member">비회원</label>
    </section>
    <div>
        <input class = "account" type = "text" placeholder = "ID"  maxlength = "10">
        <input class = "account" type = "password" placeholder = "Password" maxlength = "10">

    </div>
    <div>
        <input class = "non-account" type = "text" placeholder = "비회원 번호" maxlength = "10">
        <input class = "non-account" type = "text" placeholder = "휴대폰 번호" maxlength = "10">
    </div>
    <input class = "logging" type = "submit" value = "로그인">
    <div class = "manage">
        <ul>
            <li><a href = "register.php">회원 가입</a>
            <li><a href = "ID/비밀번호 찾기">ID / 비밀번호 찾기</a>
        </ul>
    </div>
</form>