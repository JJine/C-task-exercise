window.onload = function() {
    setTimeout(()=> {
        let fade = document.querySelector(".out");
        fade.classList.add("fade-out");
        this.setTimeout(()=> {fade.remove();}, 500);
    },3000);
// hide() {
//     document.getElementById("alert alert-success").style.display = "none";
// }
// self.setTimeout("hide()", 3000);
}

