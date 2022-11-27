<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<title>최용수 수업용</title>
	<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
	<link rel="shortcut icon" href="images/파비콘.png">
	<!--즐겨찾기 아이콘 이미지-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--문서 모드 인터넷 익스플로러에서 최신버전으로 유지-->
	<meta name="description" content="더조은아카데미! 모두가 취업하는 그날까지!">
	<meta name="keyword" content="더조은아카데미!,취업추천,직업교육,IT교육,웹디자이너,웹퍼블리셔,프론트앤드,백앤드">
	<!--검색 포털 사이트에서 띄워주는 설명과 검색 키워드-->
	
	<meta property="og:image" content="images/선풍기.jpg">
	<meta property="og:description" content="더조은아카데미! 모두가 취업하는 그날까지!">
	<!--sns에 홈페이지 주소를 올리면 추가로 띄워주는 설명과 이미지-->
	
	<link href="css/style.css" rel="stylesheet">

	<style>
		
	</style>
</head>

<body>
	<form id="form" method="post" action="insert.php">
		<input type="text" id="id" name="id" placeholder="아이디">
		<p class="id_text"></p>
		<input type="password" id="pw" name="pw" placeholder="비밀번호">
		<p class="pw_text"></p>
		<input type="password" id="pw2" placeholder="비밀번호 확인">
		<p class="pw_text2"></p>
		<input type="text" id="name" name="name" placeholder="이름">
		<p class="name_text"></p>
		<select name="year">
			<option>선택</option>
			<!--자바스크립트 for문 년도 작성-->
		</select><br>
		<input type="text" id="phone" name="phone" placeholder="-기호 제외하고 숫자만 입력">
		<p class="phone_text"></p>
		
		<input type="button" id="button" value="회원가입">
	</form>
</body>
	<script>
		// select태그 년도 101개 추가
		var select_t = '';
		for(var i = 2008; i >= 1908; i--){
			select_t += '<option>' + i + '</option>';
		}
		$('select').append(select_t);
		
		// 인풋 태그 커서 색상 변경
		$(':text, :password').focus(function(){
			$(this).css('background','#f7faf9');
		});
		$(':text, :password').blur(function(){
			$(this).css('background','#fff');
		});
		
		// 회원가입 정규표현식
		var idReg = /^[A-Za-z0-9]{4,13}$/;
		var nameReg = /^[A-Za-z가-힣]{2,10}$/;
		var phoneReg = /^\d{10,11}$/;
		
		var cys = [false, false, false, false, false, 0];

		// ajax 아이디 중복 확인 함수
		function idCheck(){
		$.ajax({
			url: "ajax.php",
			type: "GET",	// POST, GET 상관 없음
			data: {
				a: $('#id').val(), // 손님이 입력한 id값을 매개변수 a에 대입하여 ajax.php파일로 보냄
			},
			success: successFn, // 정상 작동될 경우 실행될 함수
			complete: function() {
				console.log("전송이 성공 되었습니다");
				}
			});
		}

		function successFn(result) { // <버튼없는 블러형> 아이디 입력 정규표현식과 중복방지식 합친형태. 
			if(result == 0){ //빈값이면 0
				$('.id_text').css('color','red').text('아이디를 입력 하세요.');
				cys[0] = false;
			} else if(!idReg.test($('#id').val())) {	// ※ 원래 정규표현식 충족안되면 false가 되서 바로 방탈출인데 앞에 !가 들어가서 정규표현식에 충족이 안 되면 true로 돌리고 실행문 적용 후 방탈출하고 정규표현식 충족이 되면 다음 else if를 실행한다. 
				$('.id_text').css('color','red').text('영문(대소문자 구분 없음), 숫자로 4~13자리만 입력 가능합니다.'); 
				cys[0] = false; //위와 연관없이 cys[0]은 false임.
		    } else if(result == 1) {
				$('.id_text').css('color','red').text('해당 아이디는 중복입니다.');
				cys[0] = false;
			} else {
				$('.id_text').css('color','#000').text('사용 가능한 아이디 입니다.');
				cys[0] = true;
			}
		}

		$('#id').focusout(function(){
			idCheck();
		});
		
		$('#pw').focusout(function(){
			if($('#pw').val().length >= 10 && $('#pw').val().length <= 20){
				$('.pw_text').css('color','#000').text('사용 가능한 비밀번호 입니다.');
				cys[1] = true;
				$('#pw2').val('');
				$('.pw_text2').text('');
			} else {
				$('.pw_text').css('color','red').text('10~20자리 이내로 입력하세요.');
				cys[1] = false;
			}
		});
		
		$('#pw2').focusout(function(){
			if($('#pw').val() == $('#pw2').val()){
				$('.pw_text2').css('color','#000').text('비밀번호가 일치 합니다.');
				cys[2] = true;
			} else {
				$('.pw_text2').css('color','red').text('비밀번호가 일치하지 않습니다.');
				cys[2] = false;
			}
		});
		
		$('#name').focusout(function(){
			if(nameReg.test($('#name').val())){	// 정규표현식이 충족되면 적용
				$('.name_text').css('color','#000').text('사용 가능한 이름 입니다.');
				cys[3] = true;
			} else if($('#name').val().length <= 0) {		// 글자수 0이하면 적용
				$('.name_text').css('color','red').text('이름을 입력 하세요.');
				cys[3] = false;
			} else {
				$('.name_text').css('color','red').text('한글, 영문으로 2~10자리만 입력 가능합니다.');
				cys[3] = false;
			}
		});
		
		$('#phone').focusout(function(){
			if(phoneReg.test($('#phone').val())){	// 정규표현식이 충족되면 적용
				$('.phone_text').css('color','#000').text('사용 가능한 번호 입니다.');
				cys[4] = true;
			} else if($('#phone').val().length <= 0) {		// 글자수 0이하면 적용
				$('.phone_text').css('color','red').text('번호를 입력 하세요.');
				cys[4] = false;
			} else {
				$('.phone_text').css('color','red').text('숫자 10~11자리만 입력 가능합니다.');
				cys[4] = false;
			}
		});

		$('#button').click(function(){
			cys[5] = 0;
			for(var i = 0; i <= 4; i++){	// 5사이클
				if(cys[i] == true){
					cys[5]++;
				}
			}
			if(cys[5] >= 5){
				$('#form').submit();
			}
		});
	</script>

</html>









