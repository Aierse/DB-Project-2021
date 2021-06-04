<?php
	function get_connect($user_id = "dbuser174414", $user_pw = "ce174414") {
		$dbsid = "( DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP) (HOST = localhost) (PORT = 1521) ) ) (CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = orcl) ) ) ";
		$connect = @oci_connect($user_id, $user_pw, $dbsid, 'AL32UTF8');

		return $connect;
	}
	// 쿼리 실행과 해제를 담당
	// 결과가 단 하나인 경우에만 사용 가능
	function query_with_disconnect($connect, $stid, $sql) {
		$type = explode(' ',$sql)[0];

		if ($type == "SELECT") {
			if (oci_execute($stid)) {
				$row = oci_fetch_array($stid, OCI_NUM);

				oci_free_statement($stid);
				oci_close($connect);

				if (count($row)) // 결과가 있다면 결과를 반환
					return $row;
			}

			return null;
		}

		else if ($type == "UPDATE" || $type == "INSERT") {
			if (oci_execute($stid)) {
				oci_free_statement($stid);
				oci_close($connect);

				return true;
			}

			return false;
		}
	}

	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	// 아이디로 Customer 테이블 아이디 검색
	function search_member($user_id, $connect = null) {
		if (!isset($connect))
			$connect = get_connect();

		$sql = "SELECT user_id FROM Customer WHERE user_id = :user_id";
		$stid = oci_parse($connect, $sql);

		oci_bind_by_name($stid, ":user_id", $user_id);

		return query_with_disconnect($connect, $stid, $sql);
	}
	// 휴대폰 번호로 Customer 테이블 아이디 찾기
	function search_member_id($user_phone_number, $connect = null) {
		if (!isset($connect))
			$connect = get_connect();

		$sql = "SELECT user_id FROM Customer WHERE phone_number = :user_phone_number";
		$stid = oci_parse($connect, $sql);

		oci_bind_by_name($stid, ":user_phone_number", $user_phone_number);

		return query_with_disconnect($connect, $stid, $sql);
	}
	// ID와 휴대폰 번호로 비밀번호 수정
	function update_member_pw($user_id, $user_phone_number, $connect = null) {
		if (!isset($connect))
			$connect = get_connect();

		$sql = "UPDATE Customer SET user_pw WHERE user_id = :user_id AND user_phone_number = :user_phone_number";
		$stid = oci_parse($connect, $sql);

		oci_bind_by_name($stid, ":user_id", $user_id);
		oci_bind_by_name($stid, ":user_phone_number", $user_phone_number);

		return query_with_disconnect($connect, $stid, $sql);
	}
	// ID와 비밀번호로 Customer 아이디 로그인
	function login($user_id, $user_pw, $connect = null) {
		if (!isset($connect))
			$connect = get_connect();

		$sql = "SELECT user_id, name FROM Customer WHERE user_id = :user_id AND user_pw = :user_pw";
		$stid = oci_parse($connect, $sql);

		oci_bind_by_name($stid, ":user_id", $user_id);
		oci_bind_by_name($stid, ":user_pw", $user_pw);

		return query_with_disconnect($connect, $stid, $sql);
	}

	function login_non_member($reserve_id, $user_phone_number, $connect = null) {
		if (!isset($connect))
			$connect = get_connect();

		$sql = "SELECT reserve_id, phone_number FROM Reserve WHERE reserve_id = :reserve_id AND phone_number = :user_phone_number";
		$stid = oci_parse($connect, $sql);

		oci_bind_by_name($stid, ":reserve_id", $reserve_id);
		oci_bind_by_name($stid, ":user_phone_number", $user_phone_number);

		return query_with_disconnect($connect, $stid, $sql);
	}
?>