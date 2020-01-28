<div class="container py-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="title">영화제목</label>
                    <input type="text" id=title" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="running_time">러닝타임</label>
                    <input type="text" id="running_time" name="running_time" class="form-control" placeholder="분 단위로 입력하세요 (ex: 1시간 30분 => 90)">
                </div>
                <div class="form-group">
                    <label for="created_at">제작년도</label>
                    <input type="text" id="created_at" name="created_at" class="form-control" placeholder="연 단위없이 숫자로만 적어주세요 (ex: 2019년 => 2019)">
                </div>
                <div class="form-group">
                    <label for="type">분류</label>
                    <select name="type" id="type" class="form-control">
                        <option value="극영화">극영화</option>
                        <option value="다큐멘터리">다큐멘터리</option>
                        <option value="애니메이션">애니메이션</option>
                        <option value="기타">기타</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">출품하기</button>
            </form>
        </div>
    </div>
</div>