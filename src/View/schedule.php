<style>
    #calender {
        width : 100%;
        border : 0;
        display : flex;
        flex-wrap : wrap;
        border-bottom : 0;
        
    }

    #calender > .c-head {
        width : calc(100%/7);
        height : 30px;
        line-height : 30px;
        text-align : center;
        border-bottom : 1px solid #000; 
    }


    #calender > .c-day {
        width : calc(100%/7);
        height : 150px;
        padding : 10px;
        border-right : 1px solid #000;
        border-bottom : 1px solid #000; 
    }

    #calender > .c-day:nth-child(7n) {
        border-right : 1px solid #000;
        border-left : 1px solid #000;
    }

    #calender > .c-day:nth-child(7n+1) {color : red!important;}
    #calender > .c-day:nth-child(7n) {color : blue!important;}

</style>

<div id="schedule" class="container py-5">
    <div class="px-5 d-flex justify-content-between">
        <button class="prev-btn">&lt;</button>
        <h5>2020년 1월</h5>
        <button class="next-btn">&gt;</button>
    </div>
    <div id="calender" class="mt-4">
        <div class="c-head">일</div>
        <div class="c-head">월</div>
        <div class="c-head">화</div>
        <div class="c-head">수</div>
        <div class="c-head">목</div>
        <div class="c-head">금</div>
        <div class="c-head">토</div>
        <!-- .c-day{$}*30 -->
    </div>
    <a href="/schedule-add" class="mt-3 text-white btn btn-primary text-white">상영일정등록</a>
</div>

<script>
    class Calender {
        //Ajax : 자바스크립트랑 dB가 바로 연동이 안되니 연결해주는 역할
        constructor() {
            this.loadData().then(()=>{
                console.log(this.data);
                this.calender = document.querySelector("#calender");
                this.currentTime = new Date();
                this.viewTime = document.querySelector("#schedule h5");
                // this.cM = this.currentTime.getMonth +1();
                // this.cY = this.currentTime.getFullYear();

                this.buttonEvents();
                this.render();
            });   
            console.log(this.data);
        }

        loadData() {
            return new Promise((resolve, reject) => {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "/schedule/get"); //METHOD, URL
                xhr.send();
                xhr.onload = () => {
                    this.data = JSON.parse(xhr.responseText); //JSON.parse하면 원래는 자료형에 텍스트였는데, 배열로 나옴
                    this.data.forEach(item => {
                        item.start_time = new Date(item.start_time);
                    });

                    resolve();
                } //promise는 기다리게 만드는 것 //reject : 오류 떴을 때 날려버림, 실패적 // resolve(res (r)) : 성공적 
                // xhr.onerror = () => reject(xhr);
            })
            // .then(data => {
            //     console.log("!");
            // })
        }

        buttonEvents() {
            document.querySelector(".next-btn").addEventListener("click", e => {
               this.currentTime.setMonth(this.currentTime.getMonth() +1);
               this.render();
            })

            document.querySelector(".prev-btn").addEventListener("click", e => {
               this.currentTime.setMonth(this.currentTime.getMonth() +1);
               this.render();
            })
        }
        render() {
            this.calender.querySelectorAll(".c-day").forEach(item => item.remove());
            let firstDay = new Date(this.currentTime.getFullYear(), this.currentTime.getMonth(), 1) //년, 달 가져오는 것
            let endDay = new Date(this.currentTime.getFullYear(), this.currentTime.getMonth() +1, 0);
            
            for(let i = 0; i < firstDay.getDay(); i++) 
                this.calender.append(this.dayTemplate())

            //캘린더 앞 빈칸
            for(let i = 1; i <= endDay.getDate(); i++)  {
                let find  = this.data.find(movie => new Date(this.currentTime.getFullYear(), this.currentTime.getMonth(), i) <= movie.start_time && movie.start_time < new Date(this.currentTime.getFullYear(), this.currentTime.getMonth(), i+1)); //movie = x  
                this.calender.append(this.dayTemplate(i, find));
            }
            //실제 날짜를 표시
            this.viewTime.innerText = `${this.currentTime.getFullYear()}년 ${this.currentTime.getMonth() +1}월`;

            // if(i%7 == 0) {
            //      //일요일 색상
            // }
        }

        dayTemplate(i = "", schedule = null) { //메소드
                let div =  document.createElement("div");
                div.classList.add("c-day");
                div.innerText = i;

                if(schedule !== null) {
                    let item = document.createElement("div");
                    item.innerText = schedule.title;
                    div.append(item);
                }
                return div;
        }
        
    }
    window.addEventListener("load", () =>{
        const app = new Calender();
    });
</script>