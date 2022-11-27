create table members (
	/* members 이름을 가진 테이블을 만들겠다 (sql 읽기 형식으로 한번 데이터베이스 사이트에 연동하면 필드 등 수정이 서버 사이트에서 가능해서 sql파일 더이상 필요없음. 소장용)  */
    num int not null auto_increment,
	/* num 필드 생성,int 정수형(숫자형), not null 빈값 허용X, auto_increment 레코드 생성 시 손님이 따로 입력안해도 자동 추가 */
    id char(13) not null,
	/* id 필드 생성, chat 문자형, 13글자 허용, 빈값 허용X */
    pw char(20) not null,
    name char(10) not null, /* not null 안넣어도됨 자바스크립트에서 써놔서.. */
    year1 char(5), /* 필드명 years1은 0000년이므로 5글자 허용임.*/
    phone int, /* int 숫자형 */
    regist_day char(20),
    primary key(num)
	/* num필드를 기본키 설정 */
);


