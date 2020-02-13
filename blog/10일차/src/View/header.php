<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <meta http-equiv="refresh" content="60; URL=http:url"> -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/3abda6768c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/Form.js"></script>
    <!-- <script src="js/Form.js"></script> -->
    <title>JJineBlog</title>
</head>
<body>
    <div id="container">
        <div class="nav">
            <div class="hamburger">
                <input type="checkbox" id="menuicon">
                <label for="menuicon">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>
            <ul>
                <li class="logo">logo</li>
                <li><a href="/">HOME</a></li>
                <div class="search">    
                    <input type="search" placeholder="Search" id="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
                <?php if(user()->checkLogin()): ?> 
                    <span><?=user()->get()->user_name?>님</span>
                    <li>
                        <div class="logout-btn">
                        <img src="css/gg2.png" alt="">
                        </div>
                    </li>
                <?php else: ?>
                    <li>
                        <div class="login-btn">
                        <img src="css/gg.png" alt="">
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="big">
            <div class="form-box">
                <div class="box">
                <img src="css/cat.png" alt="">
                </div>   
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" id="form-log">Log in</button>
                    <button type="button" class="toggle-btn" id="form-sign">Sign up</button>
                </div>
                 <!--login-->
                <form id="login" class="input-group">
                    <span>아이디</span>
                    <input type="email" id="user_id" name="user_id" class="input-field" placeholder="아이디를 입력해주세요">
                    <span>비밀번호</span>
                    <input type="password" id="password" name="password"" class="input-field" placeholder="비밀번호를 입력해주세요">
                    <input type="checkbox" class="check-box" id="SaveId"><span>아이디를 저장하시겠습니까?</span>
                        <a class="submit-btn login form-btn" id="login_btn" href="/">Log in</a>
                </form>

                <!--sign-->
                <form id="sign"class="input-group">
                    <span>아이디</span>
                        <input type="email" id="join_user_id is-invalid" name="user_id" class="input-field" placeholder="아이디를 입력해주세요">
                    <span>닉네임</span>
                        <input type="text" id="join_user_name" name="user_name" class="input-field" placeholder="닉네임을 입력해주세요">
                        <div class="invalid"></div>
                    <span>비밀번호</span>
                        <input type="password" id="join_password" name="password" class="input-field" placeholder="비밀번호를 입력해주세요">
                        <div class="invalid"></div>
                    <span>비밀번호 확인</span>
                    <input type="password" id="passwordr" name="passwordr" class="input-field" placeholder="비밀번호 확인을 해주세요">
                    <input type="checkbox" class="check-box"><span>회원가입에 동의하시겠습니까?</span>
                       <a class="submit-btn login form-btn" id="join_btn" href="/">Sign up</a>
                </form> 
            </div>
         </div>
        <div class="list">
             <nav id="user-menu" role="navigation">
                <a class="dropdown-item" href="">홈</a>
                <a class="dropdown-item" href="">구독</a>
                <a class="dropdown-item" href="">블로그</a>
                <a class="dropdown-item" href="/write">글쓰기</a>
                <a class="dropdown-item" href="">알림</a>
                <a class="dropdown-item" href="">설정</a>
                <form id="logout">
                    <a class="dropdown-item" href="/" id="logout_btn">로그아웃</a>
                </form>
             </nav>
        </div>
   