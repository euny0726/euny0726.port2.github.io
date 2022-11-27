<meta charset="utf-8">
<?php
    include 'dbpassword.php';	// 데이터베이스 접속

    $product = $_POST['product'];
    $explanation = $_POST['explanation'];

    $product = htmlspecialchars($_POST['product'], ENT_QUOTES);  // 특수문자를 화면에 출력하기 위해 입력
    $explanation = htmlspecialchars($explanation, ENT_QUOTES);

    $regist_day = time();  // 현재 시간을 일련번호로 저장 (time은 밀리초로 표현됨.중복방지위해 time써서 밀리초사용 cf.date()는년월일로 표시)

    // 이미지 파일 코드

    // 임시저장된 이미지 파일 (input 타입 file의 name명이 picture에서 선택된 이미지 정보 가져옴)
    $myTempFile = $_FILES['picture']['tmp_name'];

    // 파일 타입 및 확장자 구하기
    $fileTypeExtension = explode("/", $_FILES['picture']['type']);

    // 파일 종류 이름 (파일 정보를 불러오는 것으로 필요 없음)
    $fileType = $fileTypeExtension[0];
    // 파일 확장자
    $extension = $fileTypeExtension[1];

    // 이미지 확장자 검사
    $isExtGood = false;

    switch($extension){ //확장자를 구해서 아래 case의 확장자인지 검사함.
        case 'jpeg':
        case 'jpg';
        case 'bmp':
        case 'gif':
        case 'png':
        $isExtGood = true;
        break;
        default :
            echo "이미지 파일만 첨부할 수 있습니다 (jpg, bmp, gif, png 확장자만 가능)";
            exit; //출력후 방탈출
    }

        if($isExtGood){ //true인경우
            // 임시 파일 옮길 저장 및 파일명
            $picture = "{$product}{$regist_day}.{$extension}";
            $picture2 = "./data/{$product}{$regist_day}.{$extension}";
            // 임시 저장된 파일($myTempFile)을 우리가 저장할 장소 및 파일명($picture2)으로 옮김
            $imageUpload = move_uploaded_file($myTempFile, $picture2);
        }

    $sql = "INSERT into search(product, explanation, picture, regist_day) values ('$product', '$explanation', '$picture', '$regist_day')";
    $result = $dbConnect->query($sql);  // $sql 에 저장된 명령 실행

    echo "
	      <script>
              alert('게시글이 정상적으로 등록되었습니다.');
	          location.href = 'index.php'
	      </script>
	  ";
?>