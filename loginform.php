<style>
/* 로그인 폼 */
	.login {
		margin : 19.016px;
		padding : 19.016px;
		border : 1px solid black;
	}
/*라디오 버튼 숨김*/
	.login > input:nth-of-type(1) { display : none; }
	.login > input:nth-of-type(2) { display : none; }

	.login > input:nth-of-type(1) ~ div:nth-of-type(1) { display : none; }
	.login > input:nth-of-type(2) ~ div:nth-of-type(2) { display : none; }

	.login > input:nth-of-type(1):checked ~ div:nth-of-type(1) { display : block; }
	.login > input:nth-of-type(2):checked ~ div:nth-of-type(2) { display : block; }

	.login > .buttons {
		width : 100%;
	}
/*라벨 모양 지정*/
	.login > .buttons > label {
		display : block;
		float : left;

		width : 149.7655px;
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
		padding-left : 12.094px;
		width : 288.437px;
		height : 40px;
		margin-bottom : 5%;
		text-align : left;
	}
/*로그인 버튼*/
	.logging {
		outline : none;
		width : 302.531px;
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
<script>
	function checkvalue_login(){
		if (document.querySelector('input[name="tab"]:checked').value == "member") {
			if(!document.login.member_id.value) {
				alert("아이디를 입력하세요.");
				return false;
			}

			if(!document.login.member_pw.value) {
				alert("비밀번호를 입력하세요.");
				return false;
			}
		}

		else {
			if(!document.login.non_member_id.value) {
				alert("비회원 번호를 입력하세요.");
				return false;
			}

			if(!document.login.non_member_phone_number.value) {
				alert("핸드폰 번호를 입력하세요.");
				return false;
			}
		}
	}
</script>
<form class = "login" name = "login" method = "POST" action = "loging.php" onsubmit="return checkvalue_login()">
	<input id = "member" value = "member" type = "radio" name = "tab" checked = "checked">
	<input id = "non-member" value = "non-member" type = "radio" name = "tab">
	<section class = "buttons">
		<label class = "first" for = "member">회원</label>
		<label class = "second" for = "non-member">비회원</label>
	</section>
	<div>
		<input class = "account" name = "member_id" type = "text" placeholder = "ID"  maxlength = "10">
		<input class = "account" name = "member_pw" type = "password" placeholder = "Password" maxlength = "10">
	</div>
	<div>
		<input class = "non-account" name = "non_member_id" type = "text" placeholder = "비회원 번호" maxlength = "10">
		<input class = "non-account" name = "non_member_phone_number" type = "text" placeholder = "휴대폰 번호" maxlength = "10">
	</div>
	<input class = "logging" type = "submit" value = "로그인">
	<div class = "manage">
		<ul>
			<li><a href = "register.php">회원 가입</a>
			<li><a href = "find_id_pw_menu.php">ID / 비밀번호 찾기</a>
		</ul>
	</div>
</form>