<?php
    $host = "localhost";
    $user = "pyeun";   // 닷홈 ftp 아이디 입력
    $pw = "duddms13!";     // 닷홈 ftp 비밀번호 입력
    $dbName = "pyeun";         // 닷홈 데이터베이스 아이디 입력
    $dbConnect = new mysqli($host, $user, $pw, $dbName);
    $dbConnect->set_charset("utf8");

    if(mysqli_connect_errno()){
        echo "데이터베이스 {$dbName}에 접속 실패";
    }
    ?>
