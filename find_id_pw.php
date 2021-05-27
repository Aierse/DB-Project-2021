	<title>ID/PW 찾기 페이지</title>
	<style>
	<!--글꼴-->
		h,fieldset{
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
	</script>


	<h1>ID/PW 찾기</h1>
	<form name="find_id" method="post" action="find_id.php" onsubmit="return findid_checkvalue()">
		<fieldset>
			<legend>ID 찾기</legend>
			<table>
				<tr>
					<td>전화번호</td>
					<td><input type="text" name="phonenumber" maxlength="11" placeholder="전화번호( - 없이 작성)"></td>
				</tr>
			</table>
			<input type="submit" name= "find_id"value= "ID 찾기" >
		</fieldset>
	</form>
	<br>
	<form name="find_pw" method="post" action="" onsubmit="return findpw_checkvalue()">
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
			<input type="submit" name= "find_pw" value= "PW 찾기">
		</fieldset>
	</form>

