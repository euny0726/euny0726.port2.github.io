create table members (
	/* members 이름을 가진 테이블을 만들겠다 */
    num int not null auto_increment,
	/* num 필드 생성, 정수형, 빈값 허용X, 레코드 생성 시 자동 추가 */
    id char(13) not null,
	/* id 필드 생성, 문자형, 13글자 허용, 빈값 허용X */
    pw char(20) not null,
    name char(10) not null,
	year1 int(4),
	phone char(11),
    regist_day char(10),
    primary key(num)
	/* num필드를 기본키 설정 */
);


