Number.prototype.parseTime = function(){
    let int = parseInt(this);
    let msec = (this - int).toFixed(2).substr(2);

    let hour = parseInt(int / 3600);
    let min = parseInt((int % 3600) / 60);
    let sec = int % 60;

    if(hour < 10) hour = "0" + hour;
    if(min < 10) min = "0" + min;
    if(sec < 10) sec = "0" + sec;

    return `${hour}:${min}:${sec}:${msec}`;
}


const borderWidth = 8;
const borderColor = '#50BCDF';
const topTrack = document.querySelector('#track'); //상위
const topCanvas = document.querySelector("#canvas");
class App {
    static PATH = 0;
    static RECT = 1;
    static TEXT = 2;
    static SELECT = 3;

    constructor() {
        this.tool = new Tool(this);
        this.viewport = new Viewport;

        this.toolList = [];

        this.track = null;
        this.selectTool = null;
    }

    // set active(tool) {
    //     this.activeTool = tool;
    //     if(document.querySelector(".tool.active")) document.querySelector(".tool.active").classList.remove("active");
    //     document.querySelector(`.tool[data-name='${tool}']`).classList.add("active");
    // }

    addEvent() {
        //document.querySelector("#path-btn").addEventListener("click", e => this.viewport.playTrack !== null ? alert("비디오를 선택해 주세요!") : this.changeStatus(e.target, App.PATH));
        //지수 0.< 
        document.querySelector("#path-btn").addEventListener("click", (e)=> {
            if(document.querySelector("video").getAttribute("src") == null) {alert("비디오를 선택해주세요!"); return false;} this.changeStatus(e.target,App.PATH);
        });
        
        document.querySelector("#rect-btn").addEventListener("click", (e)=> {
            if(document.querySelector("video").getAttribute("src") == null) {alert("비디오를 선택해주세요!"); return false;} this.changeStatus(e.target, App.RECT);
        });

        document.querySelector("#text-btn").addEventListener("click", (e)=> {
            if(document.querySelector("video").getAttribute("src") == null) {alert("비디오를 선택해주세요!"); return false;} this.changeStatus(e.target, App.TEXT);
        });

        document.querySelector("#select-btn").addEventListener("click", (e)=> {
            if(document.querySelector("video").getAttribute("src") == null) {alert("비디오를 선택해주세요!"); return false;} this.changeStatus(e.target, App.SELECT);
        });

        document.querySelector("#play-btn").addEventListener("click", ()=> {
            if(document.querySelector("video").getAttribute("src") == null) {alert("비디오를 선택해주세요!"); return false;} this.viewport.playVideo()
        });

        document.querySelector("#stop-btn").addEventListener("click", ()=> {
            if(document.querySelector("video").getAttribute("src") == null) {alert("비디오를 선택해주세요!"); return false;} this.viewport.pauseVideo()
        });

        document.querySelector("#down-btn").addEventListener("click", ()=> {
            if(document.querySelector("video").getAttribute("src") == null) {alert("비디오를 선택해주세요!"); return false;}  this.download();
        });


        // document.querySelectorAll(".tool").forEach(x => {
        //     x.addEventListener("click", e => {
        //         this.active = e.target.dataset.name;
        //         console.log(e);
        //     });
        // }); 
    }

    changeStatus(target, status){
        this.status = status;

        const exist = document.querySelector(".left .tool .active");
        if(exist) exist.classList.remove("active");

        target.classList.add("active");
    }

    // unset() {
    //     this.temp_clip = null;
    // }

    download() {
        let html = this.parseHTML();
        //HTML 문자열을 만든다.
        //만든 문자열로 Blob 객체를 생성한다. (json) 랑 비슷하지만 이미지나 다른 것을 구현
        let blob = new Blob([html], {type:"text/html"});

        //a 태그를 만들어서 blob 객체와 연결된 URL을 href 에 넣는다.
        let a = document.createElement("a");
        a.href = URL.createObjectURL(blob); //blob 객체를 이용해서 url 생성 => a.href에 연결

        // a태그에 download 속성을 설정해서 클릭하면 href의 데이터를 다운 받게 한다. 이름 - > download함
        a.download = "movie.html"; //과제에서는 날짜 입력

        // a 태그를 추가하고 강제로 클릭하게 한다. 
        document.body.append(a);
        a.click();

        // a 태그 삭제    
        a.remove();
        console.log(1);
    }    

    parseHTML() {
        let html = `<div>
                        <div id="viewport" style="position:absolute; left : 0; top : 0, width: 100%, height: 100%; overflow: hidden; background: #ddd;">
                            <video src="${this.viewport.video.src}"></video>
                            <div id="12323"></div>
                        </div>
                    </div>`;

        return html;
    }
}
// window.addEventListener("load", ()=>{  
//     let app = new App();
// });

/**
 * C과제에서 app을 이용해 html 문자열을 받아야하기 때문에
 * window property로 할당하여 어떤 스크립트 코드에서 사용해야한다.
 */

window.onload = () => {
    window.app = new App();
    window.app.addEvent();
}

