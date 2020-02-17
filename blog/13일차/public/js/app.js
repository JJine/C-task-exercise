class App {
    constructor() {
        let form = new Form(this);
        let view = new View(this);
        // let edit = new Edit(this);
    }
}

window.onload = function() {
    let app = new App();
    //검색 버튼 왔다리갔다리
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

    

    // location.href = location.href;
}
