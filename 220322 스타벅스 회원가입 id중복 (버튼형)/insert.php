<meta charset="utf-8"> <!-- 브라우저창에서 글자 깨지지않게 insert파일에 문자코드 꼭 넣어놓음. -->

<?php
    include 'password.php'; // 로그인정보 include이용하여 다른파일(password.php)로 따로 만들어서 저장함.
?>


<?php
    $id = $_POST['id']; // get방식(주소로 넘기는 방식) post방식(회원가입 로그인 처럼 암호화해서 넘기는 방식) 두가지인데 회원가입폼이므로 post방식을 이용한다.
    $pw = $_POST['pw'];
    $name = $_POST['name'];
    $year1 = $_POST['year'];
    $phone = $_POST['phone'];
    $regist_day = date("Y-m-d (H:i)"); // 현재의 '년-월-일 (시간:분)'



    $sql = "insert into members(id, pw, name, year1, phone, regist_day) values('$id', '$pw', '$name','$year1', $phone, '$regist_day')";
    // members 테이블에 새로운 레코드 추가 (숫자값만 입력한 phone은 ''빼고 쓴다)

    $result = $dbConnect->query($sql);
    // 데이터베이스 실행

    echo "
          <script>
              alert('회원가입이 완료되었습니다');
              location.href = 'index.php';
          </script>
        ";
?>
