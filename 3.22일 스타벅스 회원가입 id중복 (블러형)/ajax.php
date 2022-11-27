<?php
    include 'password.php';
?>

<?php
	$id = $_GET['a'];

	$sql = "select * from members where id='$id'";
	// members테이블의 id필드에서 $id변수값이랑 같은 데이터가 있는지 검사하여 있다면 해당되는 행의 모든 필드를 가져옴
	$result = $dbConnect->query($sql);
	// 데이터베이스 실행
	$num_record = mysqli_num_rows($result);
	// 조건에 충족되는 행이 몇개인지 파악

	if ($id == null){ // 변수값이 빈값이랑 같은지 검사
		echo 0;
	} else if($num_record) { // id 변수값이 중복이면 숫자 1을 인수값으로 보냄
		echo 1;
	} else {
		echo 2;
	}

?>
