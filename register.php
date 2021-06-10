<style>
	#title{
		margin-top : 150px;
	}
	#title{
		text-align: center;
	}
	table{
		border-spacing : 15px;
		text-align : center;
		color : black;
		margin-left : auto; 
		margin-right : auto;
		width : 500px;
		border: 1px solid #444444;
		bgcolor = "#FDFCF0";
		cellspacing = "1";
		border-radius: 5px;
	}
	table > input{
		font-size : 20px;
	}
</style>
<script>
	function checkNumber(event){
		if(event.key === '.' || event.key === '-' || event.key >= 0 && event.key <= 9){
			return true;
			}
		return false;
	}
	function checkId() {
		window.open("checkId.php?id=" + document.register.id.value,"IDcheck","left=50, top=50, width=100, height=20, scrollbars=no, resizeable=no");
	}

	function checkValue(){
		if(!document.register.id.value){
			alert("아이디를 입력하세요.");
			return false;
		}

		if(!document.register.pw.value){
			alert("비밀번호를 입력하세요.");
			return false;
		}

		// 비밀번호와 비밀번호 확인에 입력된 값이 동일한지 확인
		if(document.register.pw.value != document.register.pwCheck.value){
			alert("비밀번호를 동일하게 입력하세요.");
			return false;
		}

		if(!document.register.name.value){
			alert("이름을 입력하세요.");
			return false;
		}

		if(!document.register.FirstNum.value || !document.register.middleNum.value || !document.register.lastNum.value){
			alert("휴대폰번호를 입력하세요.");
			return false;
		}
	}
</script>
<div class = "ubody">
	<div id = "title">
		<h1>회원가입</h1>
	</div>
	<table>
		<FORM name="register" method="post" action="./insertMember.php" onsubmit="return checkValue()">
			<tr>
				<td text-align="center">아이디 </td>
				<td><input type = "text" name="id" maxlength = "10" placeholder="최대10글자."/></td>
				<td><input type = "button" value = "중복확인" onClick = "checkId()"/></td>
			</tr>
			<tr>
				<td> 비밀번호 </td>
				<td><input type = "password" name="pw" maxlength = "10" placeholder="최대10글자."/></td>
			</tr>
			<tr>
				<td> 비밀번호 확인 </td>
				<td> <input type = "password" name="pwCheck" maxlength = "10" placeholder="비밀번호 확인해주세요."/> </td>
			</tr>
			<tr>
				<td> 성명 </td>
				<td> <input type = "text" name="name" maxlength = "10" placeholder="이름을 적어주세요."/> </td>
			</tr>
			<tr>
				<td> 생년월일 </td>
				<td>
					<select name="year">
						<?php
							$year =1960;
							echo "<option value=''> 년도 </option>";
							while($year<=2015){
								echo "<option value='$year'>$year</option>";
								$year++;
							}
						?>
					</select>
					<select name="month">
						<?php
							$month =1;
							echo "<option value=''> 월 </option>";
							while($month<=12){
								echo "<option value='$month'>$month</option>";
								$month++;
							}
						?>
					</select>
					<select name="day">
						<?php
							$day =1;
							echo "<option value=''> 일 </option>";
							while($day<=31){
								echo "<option value='$day'>$day</option>";
								$day++;
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td> 휴대폰 </td>
				<td>
					<select name="firstNum">
						<option> 010 </option>
						<option> 011 </option>
						<option> 016 </option>
						<option> 018 </option>
					</select> - 
					<input type = "text" name="middleNum" size = "4" maxlength = "4" onkeypress='return checkNumber(event)'/> - <input type = "text" name="lastNum"size = "4" maxlength = "4" onkeypress='return checkNumber(event)'/>
				</td>
			</tr>
			<tr>
				<td>
					<input type = "submit" value = "가입하기"/>
				</td>
				<td>
				</td>
				<td>
					<input type = "button" onClick="window.location.reload()" value = "다시 입력"/>
				</td
			</tr>
		</FORM>
	</table>
</div>