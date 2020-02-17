
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/editor.css">
    <script src="js/Edit.js"></script>
    <script src="https://kit.fontawesome.com/3abda6768c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <title>JJineBlog</title>
</head>
<body>
    <div class="wrapper">
            <div class="header">
                <div class="navbar">
                    <div class="navbar-container  justify-center">
                        <div class="btn-left icon-mar">
                            <i class="far fa-image" id="img"></i>
                            <i class="far fa-folder"></i>
                            <i class="fas fa-video"></i>
                            <i class="fas fa-link" id="link"></i>
                            <i class="fas fa-table"></i>
                            <i class="far fa-calendar-alt"></i>
                            <i class="fas fa-code"></i>
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <div class="btn-right">
                            <button type="button" class="btn-sub">임시저장</button>
                            <button type="button" class="btn-btn">발행</button>
                        </div>
                    </div>
                    <div class="btn-submit"></div>
                </div>
                <div class="sub-navbar">
                    <div class="sub-container justify-center">  
                        <div class="sub-text">
                            <div class="menu-1">
                                <span>본문 </span>
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </div>
                        <div class="sub-font">
                            <div class="menu-2">
                                <span>폰트 </span>
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </div>
                        <div class="sub-center icon-center">
                            <i id="bold" class="fas fa-bold sec" ></i>
                            <input type="button" value="B" onclick="document.execCommand('bold')">
                            <i id="Italic" class="fas fa-italic sec"></i>
                            <i id="Underline" class="fas fa-underline sec"></i>    
                            <i id="StrikeThrough" class="fas fa-strikethrough sec"></i>
                        </div>
                        <div class="sub-left icon-center">
                            <i class="fas fa-align-left sec"></i>
                            <input type="button" value="B" onclick="document.execCommand('justifyleft')">
                            <i class="fas fa-align-center sec"></i>
                            <input type="button" value="B" onclick="document.execCommand('justifycenter')">
                            <i class="fas fa-align-right sec"></i>
                            <i class="fas fa-align-justify sec"></i>
                        </div>
                        <!-- <div class="sub-text">
                            
                            </div>
                            <div class="sub-align">
                                
                                </div> -->
                                <div class="sub-index icon-center">
                                    <i id="" class="fas fa-list-ul"></i>
                                    <i id="" class="fas fa-list"></i>
                                    <i id="" class="fas fa-list-ol"></i>
                                </div>
                                <div class="sub-init icon-center">
                                    <i id="" class="fas fa-asterisk"></i>
                                    <i id="" class="fas fa-text-height"></i>
                                    <i id="" class="fas fa-text-width"></i>
                                </div>                
                            </div>
                        </div>
                    </div>
                    
                    <div class="post">
                        <div class="container">
                            <div class="title-wrapper" >
                                <textarea class="post-title" id="title" placeholder="제목을 입력하세요." style="height: 40px;"></textarea>
                                <textarea class="post-sub-title" id="sub-title" placeholder="부제목을 입력하세요." style="height: 25px;"></textarea>
                            </div>
                            
                            <div class="p-element" id="content" contenteditable="true" role="text" style="border-width:1px; width: 800px;">
                            </div>
                            <!-- <div class="pen">
                                
                                </div> -->
                            </div>   
                        </div>
                        <div class="tag">
                            <h2>태그</h2>
        <div class="div-element" contenteditable="true" role="text" style="border-width:1px; width: 800px; position: fixed;"></div>
    </div>
    <!-- <a href="#doz_header" class="btn_gotop" id="click">
        <span class="glyphicon glyphicon-chevron-up">
            </span>
        </a>
        <div class="top-button">TOP</div> -->
        <div class="aside">
            
            </div>              
            
            
            <!--img box-->
            <div class="img-box"> 
                <div class="img-form">
                    <!-- <div class="pop-header"><h4>이미지 업로드</h4></div> -->
                    <form id="drop" method="post">
                        <i class="far fa-images"></i>
                        <input type="file" id="file" onclick="ChangeFile()" style="display: none;">
                        <button class="upload-btn" href="#" onclick="UploadFile()">업로드</button>
                    </form>
                </div>
            </div>
            
            <!--link box-->
            <div class="link-box"> 
                <div class="pop-header"><h4>링크</h4></div>
                <div class="link-form">
                    
                    <form id="form-link">
                        <div class="form-url">
                            <input ref="url" type="text" class="form-text" placeholder="URL">
                        </div>
                        <button type="submit" class="submit-btn" href="">확인</button>
                    </form>
                </div>
            </div>
            
            <!--menu form-->
            <div class="menu-box">
                
                </div>
                
                <!--mit form-->
                <div class="mit-box">
                    <div class="mit-form">
                        <div class="mit-header"><h2>발행</h2></div>
                        <div class="form-group">
                            <div class="row">
                                <span>카테고리</span>
                                <select class="category" id="category" name="category">
                                    <option value selected>없음</option>
                                    <option value="1">M : 메르세데스</option>
                                    <option value="2">A : 아란</option>
                                    <option value="3">P : 팬텀</option>
                                    <option value="4">L : 루미너스</option>
                                    <option value="5">E : 에반 </option>
                                    <option value="6"> : ??</option>
                                    <option value="7">S : 슈가</option>
                                    <option value="8">T : 테스</option>
                                    <option value="9">O : 올리비아</option>
                                    <option value="10">R : 론도</option>
                                    <option value="11">Y : 대적자</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <span>설정</span>
                                <div class="radio">
                                    <div class="radio-controller">
                                        <div class="custom-radio">
                                            <input type="radio" name="radioTxt" value="공개"checked>
                                            <span>공개</span>
                                        </div>
                                        <div class="custom-radio">
                                            <input type="radio" value="비공개" name="radioTxt">
                                            <span>비공개</span>
                                        </div>
                                        <div class="custom-radio" value="비밀글" name="radioTxt"> 
                                            <input type="radio">
                                            <span>비밀글</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <span>검색</span>
                                <div class="radio">
                                    <div class="radio-controller">
                                        <div class="custom-radio">
                                            <input type="radio" name="radioSearch" value="공개" checked>
                                            <span>공개</span>
                                        </div>
                                        <div class="custom-radio">
                                            <input type="radio" name="radioSearch" value="비공개">
                                            <span>비공개</span>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                    <span>댓글</span>
                    <div class="radio">
                        <div class="radio-controller">
                            <div class="custom-radio">
                                <input type="radio" name="radioChat" value="허용" checked>
                                <span>허용</span>
                            </div>
                            <div class="custom-radio">
                                <input type="radio" name="radioChat" value="비허용">
                                <span>비허용</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <span>공감</span>
                    <div class="radio">
                        <div class="radio-controller">
                            <div class="custom-radio">
                                <input type="radio" name="radioHeart" value="허용" checked>
                                <span>허용</span>
                            </div>
                            <div class="custom-radio">
                                <input type="radio" name="radioHeart" value="비허용">
                                <span>비허용</span>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="form-footer">
                <div class="footer-row">
                    <div class="row-group">
                        <input type="checkbox"><span>이 설정을 기본값으로 유지</span>
                    </div>
                    <div class="row-group">
                        <input type="checkbox"><span>공지사항으로 등록</span>
                    </div>
                </div>
                <div class="footer-next">
                    <button type="submit" id="btn-sub" class="btn-sub btn-submit"><i class="fas fa-check"></i><span>발행</span></button>
                    <button id="btn-cookie" class="btn-sub btn-submit"><i class="fas fa-check"></i><span>저장</span></button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
                        