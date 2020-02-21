
<link rel="stylesheet" href="/css/read.css">
<!-- <form method="POST" action=""> -->
<!-- <form method = "get" action = "ListController.php"> -->
<div class="read-wrapper">
    <div class="post-container">
        <div class="post-header">
        <?php if(isset($post)):?>
            <div class="post-category">
                <?=$post->category?>
            </div>
            <div class="title">
                 <?=$post->title?>
            </div>
            <div class="post-text">
                <div class="body">
                    <div class="item-post text-tru">
                        <div class="nickname text-tru"><?=$post->user_name?></div>
                        <div class="date"> <?=$post->date?></div>
                        <div class="view"> 조회 <?=$post->view?></div>
                        <div class="com"><i class="far fa-comments"></i>11</div>
                    </div>  
                </div>
            </div>
       
            
        </div>
        <div class="text-content">
            <?=$post->content?>
        </div>
        <?php endif; ?>
   

    <!--댓글 불러오기 -->
 
    <!-- <table class="table table-bordered" style="width:50%">
        <tr>
            <td style="width:10%">글 제목</td>
            <td style="width:15%">title</td>
        </tr>
        <tr>
            <td style="width:5%">글 번호</td>
            <td style="width:3%">
                no
            </td>
            <td  style="width:5%">작성 일자</td>
            <td  style="width:3%">
                date
            </td>
            
        </tr>
        <tr>
            <td colspan="6"> 
            </td>
        </tr>
    </table> -->

