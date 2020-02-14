
    // let textarea_e = document.querySelector(".p-element");
    // let bold = function() { exeCommand("bold", false, null); }
    // let italic = function() { textarea_e.exeCommand("Bold", false, null); }

    // let underline = function() { textarea_e.exeCommand("underline", false, null); }

    // let fontSize = function() {
    //     let size = prompt('Font-size (1 to 7', '');
    //     textarea_e.exeCommand("FontSize", false, size);
    // }

window.onload = function() {
    $(document).ready(()=> {
        $("#img").click(function () {
            $(".img-box").fadeIn();
        });
    });

    console.log()

    $(document).mouseup((e) => {
        let container = $(".img-box");
        if(container.has(e.target).length === 0) {
            container.fadeOut();
        }
    })

    $(document).ready(()=> {
        $("#link").click(function() {
            document.querySelector(".form-text").value = "";
            $(".link-box").fadeIn();
        });
    });

    $(document).mouseup((e) => {
        let container = $(".link-box");
        if(container.has(e.target).length === 0) {
            container.fadeOut();
        }
    });

    //글자 안에 아무것도 없을 경우
    $(document).ready(()=> {   
        $(".btn-btn").click(function() {
            if($(".p-element").text().length == 0) {
                alert("글자를 입력해주세요.");
            } 
        }) 
    })

    //본문
    $(document).ready(()=> {
        $(".menu-1").click(function() {
            $(".menu-form").fadeIn()
        });
    });

    $(document).mouseup((e) => {
        let container = $(".menu-form");
        if(container.has(e.target).length === 0) {
            container.fadeOut();
        }
    });

    //발행
    $(document).ready(()=> {
        $(".btn-btn").click(function() {
            $(".mit-box").fadeIn()
        });
    });

    $(document).mouseup((e) => {
        let container = $(".mit-box");
        if(container.has(e.target).length === 0) {
            container.fadeOut();
        }
    });



    // let fontColor = function () { let color = prompt('FontColor (')}
 
    document.querySelectorAll(".sec").forEach(tool=>{
        tool.addEventListener("click", (e)=>{
            toolEvent(e);
        })
    })

    function toolEvent(e) {
        document.execCommand(`${e.target.id}`);
    }

    function UploadFile() {
       $("#file").click();
    }

    function ChangeFile() {
        TranFile();
    }

    function TranFile() {
        let Form = $(".drop")[0];
        let FormData = new FormData(Form);
        FormData.append("message", "파일 확인 창 숨기기");
        FormData.append("file", $("#file")[0].files[0])
        
        $.ajax ({
            url :"/ajaxFormReceive.php",
            type: "POST",
            // method : "post",
            data: FormData,
            success:function(json) {
                // let obj = JSON.parse(json);
            }
        })
    }
   
    //라디오 
    // $(document).ready(function() {
    //     $("#btn-sub").click(function() {
    //         let radioVal = $('input[name="radioTxt"]:checked').val();
    //         alert(radioVal);
    //     })
    // })

    document.querySelector("#btn-sub").addEventListener("click", ()=> {
        let title = $("#title").val();
        let subtitle = $("#sub-title").val();
        let category = $("#category").val();
        let content = $("#content").html();
        // console.log(title, subtitle, category, content);
        $.ajax ({
            url: "/write",
            method: "post",
            data:{
                "title": title, 
                "sub_title": subtitle,
                "category": category, 
                "content": content,
            },
            success:(data) => {
                console.log(data)
            }
        })
    })
   
    //스크롤 위로 이동 
    // $(function(){ 
    //     $(".top-button").click(() =>{ 
    //        $("html, body").scrollTo(0, 0);
    //        console.log("!");
    //     });
    // });
    // $(function() {
    //     $(window).scroll(function(){
    //     if ($(this).scrollTop() < 100){
    //         $('.btn_gotop').show();
    //     } else{
    //         $('.btn_gotop').hide();
    //     }
    // });

    // $('.btn_gotop').click(function(){
    //     $('html, body').animate({scrollTop:0},400);
    //     return false;
    // })
    // })
 
}
// selection.collapse(this.writeContent.firstChild, this.nowFocus.content);