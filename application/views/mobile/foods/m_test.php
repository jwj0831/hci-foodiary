<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
</head>
<body>
<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>나의 모바일 홈페이지</h1>
  </div>
  <div data-role="content">
    <p>첫 번째 페이지입니다!!</p>
    <a href="#pagetwo">두 번째 페이지</a>
  </div>
  <div data-role="footer">
    <h1>Copyright by makand123. All Rights Reserved.</h1>
  </div>
</div>
<div data-role="page" id="pagetwo">
  <div data-role="header">
    <h1>나의 모바일 홈페이지</h1>
  </div>
  <div data-role="content">
    <p>두 번째 페이지입니다!!</p>
    <a href="#pageone">첫 번째 페이지</a>
  </div>
  <div data-role="footer">
    <h1>Copyright by makand123. All Rights Reserved.</h1>
  </div>
</div>
</body>
</html>
// 위 구문을 보면 <body>...</body> 의 내용안에 <div data-role="page" id="pageone">과 <div data-role="page" id="pagetwo"> 이렇게 두개의 내용이 들어 있는것을 확인할 수 있습니다. 그리고 안의 내용은 header, content, footer 로 이루어져 있습니다. 페이지 이동은 보통 두 개의 파일로 이루어 지는데 그것과 다르게 하나의 파일에 두개의 페이지 내용을 틀리게 하여 적용하였습니다. 중요한 부분은 위 구문에서 붉은 글씨로 되어 있는 부분입니다. id에 pageone, pagetwo 라는 값을 넣어서 href 로 이동을 시키게 됩니다. 화면은 아래 이미지 처럼 나옵니다.
 
 

 
// 첫 번째 페이지에서 "두 번째 페이지" 버튼을 클릭하면 위와 같이 두 번째 페이지로 넘어오게 되며, 마찬가지로 두 번째 페이지에서 "첫번째 페이지" 버튼을 클릭하면 다시 첫 번째 페이지로 이동합니다.
 
 
두 번째 설명드릴 내용은 팝업창 입니다. 간단하게 모바일 화면에서 팝업창이 뜨는것을 볼 수 있습니다. 아래 소스를 보며 설명드리겠습니다.
 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
</head>
<body>
<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>나의 모바일 홈페이지</h1>
  </div>
  <div data-role="content">
    <p>환영합니다!!</p>
    <a href="#pagetwo" data-rel="dialog">팝업창</a>
  </div>
  <div data-role="footer">
    <h1>Copyright by makand123. All Rights Reserved.</h1>
  </div>
</div>
<div data-role="page" id="pagetwo">
  <div data-role="header">
    <h1>상단</h1>
  </div>
  <div data-role="content">
    <p>이곳에 내용을 적는 부분입니다.</p>
    <a href="#pageone">첫 페이지로</a>
  </div>
  <div data-role="footer">
    <h1>하단</h1>
  </div>
</div> 
</body>
</html>