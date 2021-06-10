<style>
	#id_pw_find{
		margin-top : 150px;
	}
	fieldset{
		font-family: 고딕;
		font-size:1em;
		border-radius: 5px;
		}
	table{
		border-spacing:15px;
		text-align:center;
		}
	fieldset{
		text-align:center;
		margin-left:auto; 
		margin-right:auto;
		width:300px;
	}
</style>
<script>
	function findid_checkvalue(){
		if(!document.find_id.phonenumber.value){
			alert("전화번호를 입력하세요.");
			return false;
		}
	}
	function findpw_checkvalue(){
		if(!document.find_pw.id.value){
			alert("아이디를 입력하세요.");
			return false;
		}
		if(!document.find_pw.phonenumber.value){
			alert("전화번호를 입력하세요.");
			return false;
		}
	}
	function show_result_id(){
		var gsWin = window.open('about:blank','ID 찾기 결과','width=400,height=300');
		var frm =document.find_id;
		frm.action = 'find_id.php';
		frm.target = "ID 찾기 결과";
		frm.method ="post";
		frm.submit();
	}
	function show_result_pw(){
		var gsWin = window.open('about:blank','PW 찾기 결과','width=300,height=200');
		var frm =document.find_pw;
		frm.action = 'find_pw.php';
		frm.target = "PW 찾기 결과";
		frm.method ="post";
		frm.submit();
	}
</script>

<div id = "id_pw_find">
	<form name="find_id" method="post" action="/" onsubmit="return findid_checkvalue()">
		<fieldset>
			<legend>ID 찾기</legend>
			<table>
				<tr>
					<td>전화번호</td>
					<td><input type="text" name="phonenumber" maxlength="11" placeholder="전화번호( - 없이 작성)"></td>
				</tr>
			</table>
			<input type="submit" onclick="show_result_id()" name= "find_id"value= "ID 찾기" >
		</fieldset>
	</form>
	<br>
	<form name="find_pw" method="post" action="/" onsubmit="return findpw_checkvalue()">
		<fieldset>
			<legend>PW 찾기</legend>
			<table>
				<tr>
					<td>ID</td>
					<td><input type="text" name="id" maxlength="10" placeholder="ID"></td>
				</tr>
				<tr>
					<td>전화번호</td>
					<td><input type="text" name="phonenumber" maxlength="11" placeholder="전화번호( - 없이 작성)"></td>
				</tr>
			</table>
			<input type="submit"  onclick="show_result_pw()" name= "find_pw" value= "PW 찾기">
		</fieldset>
	</form>
</div>