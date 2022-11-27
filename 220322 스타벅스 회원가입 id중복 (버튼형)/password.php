<?php //보통 이렇게 따로 파일 만들어서 관리함
	$host = "localhost";
    $user = "aaa";	// 데이터베이스 아이디 입력
    $pw = "aaa";		// 데이터베이스 비밀번호 입력
    $dbName = "aaa";		// 데이터베이스 이름 입력, 보통 데이터베이스 아이디랑 같음
    $dbConnect = new mysqli($host, $user, $pw, $dbName);
    $dbConnect->set_charset("utf8");
?>