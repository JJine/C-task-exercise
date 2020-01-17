    <!-- <div id="wrap"> -->
     
        <div class="center">
            <div id="gray"> 
                <h1>동영상을 선택해주세요.</h1>
                <video></video>
            </div>
            <div id="canvas"></div>
        </div>
       
        <!--right-->
        <div class="right">
            <p>색상</p>
            <select name="option" id="line_color">
                <option value="gray">gray</option>
                <option value="blue">blue</option>
                <option value="green">green</option>
                <option value="red">red</option>
                <option value="yellow">yellow</option>
            </select>
            <p>선 두께</p>
                <select name="option" id="line_width">
                    <option value="3">3px</option>
                    <option value="5">5px</option>
                    <option value="10">10px</option>
                </select>
            <p>글자 크기</p>
            <select name="option" id="font_size">
                <option value="16px">16px</option>
                <option value="18px">18px</option>
                <option value="24px">24px</option>
                <option value="32px">32px</option>
            </select>
        </div>
        
        <!--time-->
        <div></div>
        <div class="time">
            <div class="n_time">
                <p>00 : 00 : 00 : 00</p>
                <p>/</p>
            </div>
            <div class="n_time2">
                <p>00 : 00 : 00 : 00</p>
            </div>
            <p id="start_time">시작 시간</p>
            <div class="r_time">
                <p>00 : 00 : 00 : 00</p>
            </div>
            <p>유지 시간</p>
            <div class="r_time2">
                <p>00 : 00 : 00 : 00</p>
            </div>
        </div>
        <div id="track">
            <div id="t_view">
                <div class="time_track"></div>
            </div>
        </div>
          
        <!--img-->
        <div class="img">
            <img id="movie-img1" src="./imges/movie1-cover.jpg" alt="movie1" data-video="movie1.mp4">
            <img id="movie-img2" src="./imges/movie2-cover.jpg" alt="movie2" data-video="movie2.mp4">
            <img id="movie-img3" src="./imges/movie3-cover.jpg" alt="movie3" data-video="movie3.mp4">
            <img id="movie-img4" src="./imges/movie4-cover.jpg" alt="movie4" data-video="movie4.mp4">
            <img id="movie-img5" src="./imges/movie5-cover.jpg" alt="movie5" data-video="movie5.mp4">
        </div>
         <!--left-->
           <div class="left">
            <button class="tool active" id = "path-btn" data-tool="line" >자유곡선</button>
            <button class="tool" id="rect-btn" data-tool="rect">사각형</button>
            <button class="tool" id="text-btn" data-tool="text">텍스트</button>
            <button class="section-btn" id="select-btn" data-tool="select">선택</button>
            <button id="play-btn">재생</button>
            <button id="stop-btn">정지</button>
            <button id="allDel-btn">전부삭제</button>
            <button id="secDel-btn">선택삭제</button>
            <button id="down-btn">다운로드</button>
    </div>
    <!-- </div> -->

