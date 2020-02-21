window.onload = function() {
    document.querySelector("#rep_bt").addEventListener("click", ()=> {
        let user = $("#dat_user").val();
        let password = $("#dat_pw").val();
        let content = $("#re_content").val();
        let id = document.querySelector("#rep_bt").className.split(" ")[1].split("_")[1];
        // console.log(title, subtitle, category, content);
        console.log(user,password,content);
        $.ajax ({
            url: "/reply",
            method: "post",
            data:{
                "name": user, 
                "paw": password,
                "con_content": content, 
                "id":id
            },
            success:(data) => {
                console.log(data);
            }
        })
    })

    // $(document).ready(()=> {
    //     getAllList();
    // }) 

    // let str = ""
    // function getAllList() {
    //     let 
    //     $.ajax ({

    //     })
    // }
}
