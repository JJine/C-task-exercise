window.onload = function() {
    let x = document.getElementById("login");
    let y = document.getElementById("sign");
    let z = document.getElementById("btn");

    document.getElementById("form-sign").addEventListener('click', ()=> {
        x.style.left = "-600px";
        y.style.left = "50px";
        z.style.left = "110px";
    });

    document.getElementById("form-log").addEventListener('click', ()=> {
        x.style.left = "50px";
        y.style.left = "750px";
        z.style.left = "0";
    });

    // document.getElementsById("button2").addEventListener('click', ()=> {
    //     document.getElementsByClassName("form-box").style.display="block";
    // })
    // document.getElementsById("button2").onclick = function() {
    //     document.getElementsByClassName("big").style.display="block";
    // }
    $(document).ready(()=> {
        $(".login-btn").click(function() {
            $(".big").fadeIn();
        });
    });

    $(document).mouseup((e)=>{
        let container = $(".big");
        if(container.has(e.target).length === 0) {
            container.fadeOut();
        }
    })
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
        })
        
    })

    // location.href = location.href;
}
