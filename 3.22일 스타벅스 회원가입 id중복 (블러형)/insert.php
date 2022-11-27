<meta charset="utf-8">
<?php
    include 'password.php';
?>

<?php
	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$name = $_POST['name'];
	$year1 = $_POST['year'];
	$phone = $_POST['phone'];
	$regist_day = date("Y-m-d");  // 현재의 '년-월-일'을 저장

	$sql = "insert into members(id, pw, name, year1, phone, regist_day) values('$id', '$pw', '$name', $year1, '$phone', '$regist_day')";
	// members 테이블에 새로운 레코드 추가

	$result = $dbConnect->query($sql);
	// 데이터베이스 실행

	echo "
		  <script>
			  alert('회원가입이 완료되었습니다');
			  location.href = 'index.php';
		  </script>
		";

?>

