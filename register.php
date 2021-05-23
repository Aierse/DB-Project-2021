<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8"/>
  <title>회원가입 페이지</title>

  <style>
 h, td, tr, input,button, textarea, select, FORM
 {
   font-family:고딕;
  font-size:1em;
  border-radius:5px;
  
 }
 
 table, FORM
 {
  border:1px solid rgba(36, 228, 172, 0.29);
  border-spacing:15px;
 }
  </style>
  <script>
    function checkNumber(event) {
      if(event.key === '.' 
         || event.key === '-'
         || event.key >= 0 && event.key <= 9) {
        return true;
      }

      return false;
    }
  </script>
</head>
<body style="background-color:#f0f5f3">
 <center>
 <h1>회원가입</h1>
 <table boder = "" bgcolor = "#cdfdee" cellspacing = "1" >
 <FORM>

  <tr>
   <td text-align="center">아이디 </td>
   <td>
   <input type = "text" maxlength = "10"/>
   <input type = "button" value = "중복확인"/>
   </td>
  </tr>

  <tr>
   <td> 비밀번호 </td>
   <td> <input type = "password" maxlength = "10"/> </td>
  </tr>

  <tr>
   <td> 비밀번호 확인 </td>
   <td> <input type = "password" maxlength = "10"/> </td>
  </tr>

  <tr>
   <td> 성명 </td>
   <td> <input type = "text" maxlength = "10"/> </td>
  </tr>
  
  <tr>
   <td> 생년월일 </td>
   <td>
    <select name="year">
        <?php
            $year =1980;
            echo "<option value=''>-- 년도 --</option>";
            while($year<=2015)
            {
              echo "<option value='$year'>$year</option>";
              $year++;
            }
        ?>
     </select>
    </tb>
    <tb>
     <select name="month">
        <?php
            $month =1;
            echo "<option value=''>-- 월 --</option>";
            while($month<=12)
            {
              echo "<option value='$month'>$month</option>";
              $month++;
            }
        ?>
      </select>
      <select name="day">
        <?php
            $day =1;
            echo "<option value=''>-- 일 --</option>";
            while($day<=31)
            {
              echo "<option value='$day'>$day</option>";
              $day++;
            }
        ?>
      </select>
  </tr>

  <tr>
   <td> 휴대폰 </td>
   <td>
    <input type = "radio" name = "phone"/> SKT
    <input type = "radio" name = "phone"/> KT
    <input type = "radio" name = "phone"/> LGU+
   <br>
    <select>
     <option> 010 </option>
     <option> 011 </option>
     <option> 016 </option>
     <option> 018 </option>
    </select>
    <input type = "text" size = "4" maxlength = "4" onkeypress='return checkNumber(event)'/> - <input type = "text" size = "4" maxlength = "4" onkeypress='return checkNumber(event)'/>
   </td>
  </tr>
 </FORM>
</table>

<br>

<input type = "submit" value = "가입하기"/>
<button onClick="window.location.reload()">다시 입력</button>

</center>
</body>
</html>