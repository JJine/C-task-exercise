<div class="container py-5">
    <h1>영화티저 콘테스트</h1>
    <div class="row mt-5">
        <?php foreach($teasers as $item): ?>
        <div class="card" style="width: 18rem;">
            <img src="/imges/movie<?=$item->movie_id?>-cover.jpg" class="card-img-top" alt="Cover image">
            <div class="card-body">
                <h5 class="card-title"><?=movieName($item->movie_id)?></h5>
                <p class="card-text">
                    제작자 : <?=$item->user_name?>
                    <br>
                    평점: <?=number_format($item->score, 1)?> /10</p> <!--실수형까지 짜름-->
                <a href="/contest-info?id=<?=$item->id?>" class="btn btn-primary">상세보기</a>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
