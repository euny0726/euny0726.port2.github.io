<?php
    include 'dbpassword.php';	// 데이터베이스 접속
?>
<?php
    $id = $_GET['a'];

    $pattern_id = '/^[a-zA-Z0-9]+$/';

   if(!$id) // 값이 있으면 true 없으면 false 지만 !가 잇어서 반대
   {
      echo("아이디를 입력해 주세요! <br> 가나다");
   } 
    else if(!preg_match($pattern_id, $id))
    {
        echo "아이디는 영문과 숫자만 입력이 가능합니다.";
    }
   else
   {
      $sql = "select * from members where id='$id'";
      $result = $dbConnect->query($sql);

      $num_record = mysqli_num_rows($result);

      if ($num_record)
      {
         echo $id." 아이디는 중복됩니다.";
      }
      else
      {
         echo $id." 아이디는 사용 가능합니다.";
      }
   }
?>
