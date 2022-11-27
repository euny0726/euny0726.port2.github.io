<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>무제 문서</title>
</head>

<body>
    <form method="GET" action="pye2.php">
        <input type="text" name="a">
        <input type="text" name="b">
        <input type="submit" value="테스트">
        
    </form>
    
    <a href="pye2.php?a=<?=123?>">a태그로 변수값 넘기기</a>
</body>
</html>
