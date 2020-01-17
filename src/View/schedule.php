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
</div>

<script>
    window.addEventListener("load", () =>{
        const calender = document.querySelector("#calender");
        const currentTime = new Date();

        let firstDay = new Date(currentTime.getFullYear(), currentTime.getMonth(), 1) //년, 달 가져오는 것
        let endDay = new Date(currentTime.getFullYear(), currentTime.getMonth(), +1, 0);
        for(let i = 0; i < firstDay.getDay(); i++) 
            calender.append(dayTemplate())
        
        for(let i = 1; i <= endDay.getDate(); i++) 
            calender.append(dayTemplate(i));

        function dayTemplate(i = "") {
            let div =  document.createElement("div");
            div.classList.add("c-day");
            div.innerText = i;

            return div;
        }
    });
</script>