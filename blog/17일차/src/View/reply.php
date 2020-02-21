

<script src="/js/com.js"></script>
<div class="reply_view">
        <div class="dap_ins">
        <input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디">
        <input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="비밀번호">
			<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button id="rep_bt" class="re_bt post_<?=$post->id?>">댓글</button>
			</div>
        </div>

        <h3>댓글 목록</h3>
        
        <?php if(isset($comment)):?>
            <?php foreach($comment as $com): ?>
        <from class="dap_lo">   
            <div class="form-reply">
                <div><b><?=$com->name?></b></div>
                <div class="dap_to comt_edit"><?=nl2br($com->con_content);?></div>
                <div class="rep_me dap_to"><?=$com->date;?></div>
                <div class="rep_me rep_menu">
                    <a href="#" class="dat_edit_bt">수정</a>
                    <a href="#" class="dat_del_bt">삭제</a>
                </div>
            </div>
        </from>
        <?php endforeach; ?>
        <?php endif; ?>
     
    </div>
    
    <!--댓글 입력 폼-->
    </div>
        
        </div>