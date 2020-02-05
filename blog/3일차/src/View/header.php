<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/3abda6768c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/app.js"></script>
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
                <li>HOME</li>
                <div class="search">    
                    <input type="search" placeholder="Search" id="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
                <li><div class="login-btn">
                    <img src="css/gg.png" alt="">
                </div>
                    </li>
            </ul>
        </div>

        <div class="big">
            <div class="form-box">
                <div class="box">
                <img src="css/g1.png" alt="">
            </div>   
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" id="form-log">Log in</button>
                    <button type="button" class="toggle-btn" id="form-sign">Sign up</button>
                </div>
                <!--login-->
                <form id="login" class="input-group" method = "post">
                    <span>아이디</span>
                    <input type="email" id="user_id" name="user_id" class="input-field" placeholder="아이디를 입력해주세요">
                    <span>비밀번호</span>
                    <input type="text" id="password" name="password" class="input-field" placeholder="비밀번호를 입력해주세요">
                    <input type="checkbox" class="check-box"><span>아이디를 저장하시겠습니까?</span>
                    <div class="button2_box">
                        <button type="submit" class="submit-btn">Log in</button>
                    </div>
                </form>

                <!--sign-->
                <form id="sign"class="input-group" method="post">
                    <span>아이디</span>
                    <input type="email" id="join_user_id" name="user_id" class="input-field" placeholder="아이디를 입력해주세요">
                    <span>닉네임</span>
                    <input type="text" id="join_user_name" name="user_name" class="input-field" placeholder="닉네임을 입력해주세요">
                    <span>비밀번호</span>
                    <input type="password" id="join_password" name="password" class="input-field" placeholder="비밀번호를 입력해주세요">
                    <span>비밀번호 확인</span>
                    <input type="password" id="passwordr" name="passwordr" class="input-field" placeholder="비밀번호 확인을 해주세요">
                    <input type="checkbox" class="check-box"><span>회원가입에 동의하시겠습니까?</span>
                    <div class="button2_box">
                        <button type="submit" class="submit-btn" id="join_btn">Sign up</button>
                    </div>
                </form> 
        </div>
    </div>