import styles from "./Login.module.css";

function checkvalueogin() {
  if (document.querySelector('input[name="tab"]:checked').value === "member") {
    if (!document.login.member_id.value) {
      alert("아이디를 입력하세요.");
      return false;
    }

    if (!document.login.member_pw.value) {
      alert("비밀번호를 입력하세요.");
      return false;
    }
  } else {
    if (!document.login.non_member_id.value) {
      alert("비회원 번호를 입력하세요.");
      return false;
    }

    if (!document.login.non_member_phone_number.value) {
      alert("핸드폰 번호를 입력하세요.");
      return false;
    }
  }
}

function Login() {
  return (
    // onSubmit 수정 필요
    //member input 수정 필요

    <form className={styles.login} name="login" method="POST" action="loging.php" onSubmit={checkvalueogin}>
      <input id="member" value="member" type="radio" name="tab" />
      <input id="non-member" value="non-member" type="radio" name="tab" />
      <section className="buttons">
        <label className="first" htmlFor="member">
          회원
        </label>
        <label className="second" htmlFor="non-member">
          비회원
        </label>
      </section>
      <div>
        <input className="account" name="member_id" type="text" placeholder="ID" maxLength="10" />
        <input className="account" name="member_pw" type="password" placeholder="Password" maxLength="10" />
      </div>
      <div>
        <input className="non-account" name="non_member_id" type="text" placeholder="예약 번호" maxLength="10" />
        <input className="non-account" name="non_member_phone_number" type="text" placeholder="휴대폰 번호" maxLength="11" />
      </div>
      <input className="logging" type="submit" value="로그인" />
      <div className="manage">
        <ul>
          <li>
            <a href="register_page.php">회원 가입</a>
          </li>
          <li>
            <a href="find_id_pw_menu.php">ID / 비밀번호 찾기</a>
          </li>
        </ul>
      </div>
    </form>
  );
}

export default Login;
