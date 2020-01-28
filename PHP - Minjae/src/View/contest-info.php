<div class="container py-5">
    <div style="width: 100%; height:766px; position :relative; margin-top : 30px;"> 
        <?=$teaser->html?>
    </div>
    <div class="mt-5"style="height: 100px; padding:20px 40px; box-shadow: 0 0 10px 3px #00000020; background : #fff;">
        <h5 class="font-weight-bold"><?=movieName($teaser->movie_id)?></h5>
        <form method="post" class="pl-3 row align-items-center">
            <span class="text-muted">평점 : <?=number_format($teaser->score, 1)?>/10 </span>
            <span class="ml-3 text-muted">나의 평점</span>
            <input type="number" id="score" name="score" class="ml-2" min="1" max="10" style="width:70px">
            <button type="submit" class="ml-2 btn btn-primary">확인</button>
        </form>
        
    </div>
</div>