class Form {
    constructor(app) {
        this.app = app;

        this.addEvent();
    }

    addEvent() {
        //로그인 버튼을 누를 시 나오는 창
        $(document).ready(()=> {
            $(".login-btn").click(function() {
                $(".big").fadeIn();
            });
        });

        //로그인 영역을 벗어났을 때 사라지는 창
        $(document).mouseup((e)=>{
            let container = $(".big");
            if(container.has(e.target).length === 0) {
                container.fadeOut();
            }
        })

        $(document).ready(()=> {
            $(".logout-btn").click(function() {
                $(".list").fadeIn();
            })
            // $(".logout-btn").click(function() {
            //     $(".list").fadeOut();
            // })
        });

        $(document).mouseup((e)=>{
            let container = $(".list");
            if(container.has(e.target).length === 0) {
                container.fadeOut();
            }
        })
        // $(document).ready(()=> {
        //     $(".logout-btn").click(function() {
        //         $(".list").fadeOut();
        //     })
        // })
        // $(document).click((e)=> {
        //     if(e.target.className =="big") {
        //         return false;
        //     }
        //     $(".big").fadeOut(1500);
        // })
        
        document.querySelector("#join_btn").addEventListener("click", ()=> {
            let form = $("#sign").serialize();
            
            $.ajax({
                // url: `/${e.target.classList[1]}`,
                url: "/register",
                method: "post",
                data:form,
                success:(data)=>{
                    console.log(data);
                }
            });
            // location.href = location.href;
        });

        document.querySelector("#login_btn").addEventListener("click", ()=> {
            let form = $("#login").serialize();
            $.ajax({
                url: "/login",
                method: "post",
                data:form,
                success:(data)=>{
                    console.log(data);
                }
            });
        });

        document.querySelector("#logout_btn").addEventListener("click", ()=> {
            $.ajax({
                url: "/logout",
                method: "post",
                success:(data)=> {
                    console.log(data);
                }
            });
        });

        document.querySelector("#btn-edit").addEventListener("click", ()=> {
            $.ajax({
                url: "/write",
                method: "get",
                success:(data)=> {
                    console.log(data);
                }
            })
        })
    }
}