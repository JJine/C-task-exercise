window.onload = function() {
    let x = document.getElementById("login");
    let y = document.getElementById("sign");
    let z = document.getElementById("btn");

    document.getElementById("form-sign").addEventListener('click', ()=> {
        x.style.left = "-600px";
        y.style.left = "60px";
        z.style.left = "110px";
    });

    document.getElementById("form-log").addEventListener('click', ()=> {
        x.style.left = "50px";
        y.style.left = "750px";
        z.style.left = "0";
    });
}