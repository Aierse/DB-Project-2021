<?php
	function get_connect($user_id = "dbuser174414", $user_pw = "ce174414") {
		$dbsid = "( DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP) (HOST = localhost) (PORT = 1521) ) ) (CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = orcl) ) ) ";
		$connect = oci_connect($user_id, $user_pw, $dbsid);

		return $connect;
	}
	// 쿼리 실행과 해제를 담당
	function query_with_disconnect($connect, $stid, $sql) {
		if (explode(' ',$sql)[0] == "SELECT") {
			if (oci_execute($stid)) {
		$row = oci_fetch_array($stid, OCI_ASSOC);

			oci_free_statement($stid);
			oci_close($connect);

			if (count($row)) // 결과가 있다면 결과를 반환
				return $row;
			}

			return null;
		}

		else if (explode(' ',$sql)[0] == "UPDATE") {
			if (oci_execute($stid)) {
				oci_free_statement($stid);
				oci_close($connect);

				return true;
			}

			return false;
		}

		else if (explode(' ',$sql)[0] == "INSERT") {
			if (oci_excute($stid)) {
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

		$sql = "SELECT user_id FROM Customer WHERE user_phone_number = :user_phone_number";
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
?>