<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<title>박영은 MAIN PAGE 입니다</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> <!--제이쿼리 외부 연동식-->

	
	<link rel="shortcut icon" href="별.png">
	<!--즐겨찾기 아이콘 이미지-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--문서 모드 인터넷 익스플로러에서 최신버전으로 유지-->
	<meta name="description" content="더조은아카데미! 모두가 취업하는 그날까지!">
	<meta name="keyword" content="더조은아카데미!,취업추천,직업교육,IT교육,웹디자이너,웹퍼블리셔,프론트앤드,백앤드">
	<!--검색 포털 사이트에서 띄어주는 설명과 키워드-->
	
	<meta property="og:image" content="images/모네의겨울1.jpg">
	<meta property="og:description" content="더조은아카데미! 모두가 취업하는 그날까지!">
	<!--sns에 홈페이지 주소를 올리면 추가로 띄워주는 설명과 이미지-->
	<meta name="naver-site-verification" content="45129ea4fd3094efb638111cde8b92f967cb6195">
	<!--네이버 서치어드바이저 인증 코드-->
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 스마트폰은 자동으로 홈페이지를 축소해서 스마트폰 화면에 맞추는 기능이 있음 -->
    <!-- viewport : 모바일 브라우저에서 자동으로 축소되는 기능을 중단. -->
    <!-- width=device-width : 홈페이지를 디바이스 가로 크기에 맞춰서 표시 -->
    <!-- initial-scale=1 : 홈페이지를 로드할 때 홈페이지 실사이즈를 사용자 화면에 맞춰서 로드. -->
   

	<style>
    </style>
	
</head>
    

<body>
	<form id="form" method="post" action="insert.php">
        <input type="text" id="id" name="id" placeholder="아이디"> <!-- name="name" 써서 이름값 전달하도록. -->
        <p class="id_text"></p>
        <input type="button" id="id_check" value="중복확인">
        <input type="password" id="pw" name="pw" placeholder="비밀번호">
        <p class="pw_text"></p>
        <input type="password" id="pw2" placeholder="비밀번호 확인">
        <p class="pw_text2"></p>
        <input type="text" id="name" name="name" placeholder="이름"> 
        <p class="name_text"></p>
        <select name="year">
            <option>선택</option>
            <!-- 자바스크립트 for문 년도 작성 -->
        </select><br>
        <input type="text" id="phone" name="phone" placeholder="- 기호 제외하고 숫자만 입력"> 
        <p class="phone_text"></p>
      
        <input type="button" id="button" value="회원가입"> <!-- ※ 인풋타입 submit, image 을 쓰면 정규표현식 넣은 것 상관없이 제출가능해지는 문제 생겨서 그냥 제출 못하게 함수식에 각각 return false 넣어줘야함. 인풋타입 button은 변수값 전송하는 서브밋기능이 없음!-->
    </form>
	
</body>
    
    <script>
        // select태그 년도 101개 추가 (for문 이용)
        var select_t = '';
        for(var i = 1908; i <= 2008; i++){   //for문 안에 변수명은 보통 i로 쓴다. 역순으로 보이게 for(var i = 2008; i >= 1908; i--)로 쓸 수 있다.
            select_t += '<option>' + i + '년</option>';
        }
        $('select').append(select_t);
        
        // 인풋 태그 커서 색상 변경
        $(':text, :password').focus(function(){ // :text , :password 따로 넣음. 'input' 전체 선택자 넣으면 버튼까지 색깔되로로로
            $(this).css('background','#ddd')                 
        });
        $(':text, :password').blur(function(){ // .blur(focusout도 됨) 넣어서 바깥 누르면 다시 흰색 되도록 설정
            $(this).css('background','#fff')                 
        });
        
        
        // <버튼형> 아이디 중복확인 버튼누르면 중복확인 함수 실행되도록.
        $('#id_check').click(function(){
           idCheck(); 
        });
        
        // ajax 아이디 중복 확인 함수
        function idCheck() { //함수명 임의설정
        $.ajax({                    // $.ajax : AJAX 실행
            url: "ajax.php",    // 로드할 파일명 (ajax.php 열람)
            type: "GET",            // 페이지 화면 전환 없으므로 GET으로 해도 되고 POST로 해도 상관없음. 단 ajax.php에 쓴 type과 동일해야함.
            data : {  // 데이터 : 변수값 넘길때 사용
                a : $('#id').val(),  //매개변수명(a) 자유. $('#id').val() : 손님이 입력한 id값을 매개변수 a에 대입하여 ajax.php파일로 보냄
            },     
            success: successFn,     // 정상 작동될 경우 실행될 콜백함수
            complete: function() { // 정상 작동될 경우 콜백함수(successFn) 이후 실행될 함수.(위에 successFn함수 있으므로 안써도 상관없음.) 매개변수명 없어도 상관없음.
                console.log("전송이 성공 되었습니다");
                }
            });
        }
		
		function successFn(result) {
			if(result == 0){
              $('.id_text').css('color','red').text('아이디를 입력 하세요.');
            } else if(result == 1){
                $('.id_text').css('color','red').text('해당아이디는 중복입니다.');
            } else {
                $('.id_text').css('color','#000').text('사용 가능한 아이디입니다.');
            }
        }
        
        //회원가입 정규표현식
        var idReg = /^[A-Za-z0-9]{4,13}$/;  // 첫글자 대문자영어 소문자영어 숫자만허용, 4자리부터 13자리까지만 허용
        const nameReg = /^[A-Za-z가-힣]{2,10}$/;
		var phoneReg = /^\d{10,11}$/;
        
        var cys = [false, false, false, false, false, 0]; // [] : 배열변수의 갯수가 정해져있지 않을 때 빈칸으로 씀. 변수값 갯수(id, pw, pw2, name, phone) 다섯개이므로 false 다섯번 씀. 배열은 cys(0)이 첫번째false. //cys(5)(여섯번쨰)를 0으로 넣고 for문으로 조건만듦.
        
        
        
        
		$('#id').focusout(function(){ //체인지는 값 입력하고 커서 이동해야 생기고, 포커스아웃은 값 입력안해도 실행됨.
           // console.log(idreg.test($('#id').val().length));
			if(idReg.test($('#id').val())){	// 정규표현식이 충족되면 적용
				$('.id_text').css('color','#000').text('사용 가능한 아이디 입니다.');
                cys[0] = true;
			} else if($('#id').val().length <= 0) {		// 글자수 0이하면 적용
				$('.id_text').css('color','red').text('아이디를 입력 하세요.');
                cys[0] = false;
			} else {
				$('.id_text').css('color','red').text('영문(대소문자 구분 없음), 숫자로 4~13자리만 입력 가능합니다.');
                cys[0] = false;
			}
		});
		
		$('#pw').focusout(function(){
			if($('#pw').val().length >= 10 && $('#pw').val().length <= 20){
				$('.pw_text').css('color','#000').text('사용 가능한 비밀번호 입니다.');
                cys[1] = true;
				$('#pw2').val(''); // ''넣어서 비밀번호 확인 칸이 빈칸으로 입력되도록(위에 누르면 아래 다시쓰도록 유도목적)
				$('.pw_text2').text('');
			} else {
				$('.pw_text').css('color','red').text('10~20자리 이내로 입력하세요.');
                cys[1] = false;
			}
		});
		
		$('#pw2').focusout(function(){
			if($('#pw').val() == $('#pw2').val() && $('#pw').val().length >= 1 ){ // && $('#pw').val().length >= 1 : 비밀번호 안썼을경우에도 일치되는것 방지
				$('.pw_text2').css('color','#000').text('비밀번호가 일치 합니다.');
                cys[2] = true;
			} else {
				$('.pw_text2').css('color','red').text('비밀번호가 일치하지 않습니다.');
                cys[2] = false;
			}
		});
        
        $('#name').focusout(function(){ //체인지는 값 입력하고 커서 이동해야 생기고, 포커스아웃은 값 입력안해도 실행됨.
           // console.log(idreg.test($('#id').val().length));
			if(nameReg.test($('#name').val())){	// 정규표현식이 충족되면 적용
				$('.name_text').css('color','#000').text('사용 가능한 이름 입니다.');
                cys[3] = true;
			} else if($('#id').val().length <= 0) {		// 글자수 0이하면 적용
				$('.name_text').css('color','red').text('이름를 입력 하세요.');
                cys[3] = false;
			} else {
				$('.name_text').css('color','red').text('영문(대소문자 구분 없음), 숫자로 2~10자리만 입력 가능합니다.');
                cys[3] = false;
			}
		});
        
         $('#phone').focusout(function(){ //체인지는 값 입력하고 커서 이동해야 생기고, 포커스아웃은 값 입력안해도 실행됨.
           // console.log(idreg.test($('#id').val().length));
			if(phoneReg.test($('#phone').val())){	// 정규표현식이 충족되면 적용
				$('.phone_text').css('color','#000').text('사용 가능한 번호 입니다.');
                cys[4] = true;
			} else if($('#id').val().length <= 0) {		// 글자수 0이하면 적용
				$('.phone_text').css('color','red').text('번호를 입력 하세요.');
                cys[4] = false;
			} else {
				$('.phone_text').css('color','red').text('숫자 10~11자리만 입력 가능합니다.');
                cys[4] = false;
			}
		});
        
        $('#button').click(function(){ // 스위치 변수와 for문 이용해서 조건에 맞춰서 전송
            cys[5] = 0; // 0부터 시작하게 초기화
            for(var i = 0; i <= 4; i++){ //5사이클
                if(cys[i] == true){
                    cys[5]++; // 5개 조건 모두 충족(true)하면 cys[5]값이 5가 됨.
                }
            }
            if(cys[5] >= 5){ //5가 됐을때 (조건 충족시) 폼태그 서브밋(전송)가능하게끔 
                $('#form').submit();   
            }  
        });
    </script>
</html>




