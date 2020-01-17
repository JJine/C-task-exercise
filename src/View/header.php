<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./A Module/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./A Module/fontawesome/css/all.css">
    <link rel="stylesheet" href="./A Module/css/style.css">
    <link rel="stylesheet" href="./B Module/style.css">
    <title>부산국제영화제</title>
</head>
<body>
    <!--header-->
    <header>
        <div class="etc">
            <div class="container">
                <?php if(isset($_SESSION['user'])): ?>
                    <a href="/logout">로그아웃</a>
                <?php else: ?>
                <a href="/join">회원가입</a>
                
                <a href="/login">로그인</a>
            
                <?php endif; ?>
            </div>
        </div>
        <div class="header">
            <div class="container">
                <div class="logo">
                    <a href="#">
                        <img src="./로고.png" alt="">
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <label for="mobileNavToggle" class="mobile-nav-button">
							&times;
                        </label>	
                    </li>
                    <li>
                        <a href="/">부산국제영화제</a>
                        <ul class="dropdown">
                            <li><a href="./sub1.html">개최개요</a></li>
                            <li><a href="./sub2.html">행사안내</a></li>
                        </ul>
                    </li>
                    <li><a href="/entry">출품신청</a></li>
                    <li><a href="/schedule">상영일정</a></li>
                    <li><a href="/search">상영작검색</a></li>
                    <li>
                        <a href="#">이벤트</a>
                        <ul class="dropdown">
                            <li><a href="#">영화티저 콘테스트</a></li>
                            <li><a href="./parti.html">콘테스트 참여하기</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!--//header-->
    
    <!--visual-->
    <section id="visual">
        <div class="slide">
            <div class="item">
                <img src="./images/image_37.jpg" alt="">
            </div>
            <div class="item">
                <img src="./images/image_60.jpg" alt="">
            </div>
            <div class="item">
                <img src="./images/image_10.jpg" alt="">
            </div>
        </div>
        <div class="container">
            <div class="text">
                <div>
                    <div class="subtitle"><div class="ap1">24</div>TH <p class="ap2">BUSAN</p> INTERNATION<br> FILM FESTIVAL</div>
                    <div class="title">3-12 OCTOBER 2019</div>
                    <div class="link">&nbsp더 자세히 알아보기&nbsp</div>
                </div>
            </div>
        </div>
    </section>
    <!--//visual-->