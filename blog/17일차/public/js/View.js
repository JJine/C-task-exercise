class View {
    constructor() {
        if(document.querySelector("#moreBtn")) {
            this.moreBtn = document.querySelector("#moreBtn");
            this.moreBtn.addEventListener("click", ()=> {
                this.getDataFromServer(this.currentIdx);
            });
        } else {
            return;
        }

        document.addEventListener("click", (e)=> {
            if(e.target.classList.contains("mod")) {
                let id = e.target.dataset.id;
                this.modItem(id, e.target.parentNode.parentNode);
            }

            if(e.target.classList.contains("del")) {
                let id = e.target.dataset.id;
                this.deleteItem(id, e.target.parentNode.parentNode);
            }

            if((e.target.parentNode.parentNode && e.target.parentNode.parentNode.classList.contains("box-type")) || (e.target.parentNode && e.target.parentNode.classList.contains("box-type"))){
                let id = '';
                if((e.target.parentNode.parentNode && e.target.parentNode.parentNode.classList.contains("box-type"))) id = e.target.parentNode.parentNode.id.split("_")[2];
                else id = e.target.parentNode.id.split("_")[2];
                this.viewPage(id);
            }
        });


        this.currentIdx = 0;
        this.grid = null;
        this.getDataFromServer(this.currentIdx);

    }
    viewPage(id) {
//나(연지수)
        location = '/view/'+id;
// 예진이
        // $.ajax({
        //     url: `/ListPage`,
        //     method: 'get',
        //     data: {"id":27},
        //     success: (data) => {
        //         // view/29
        //         // view/{id}
        //         console.log(data);
        //     }
        // });
    }

    getDataFromServer(idx) {
        $.ajax({
            url: `/getList/${idx}`,
            method: 'post',
            success: (data) => {
                if(data) {
                    let list = JSON.parse(data);
                    this.makeTemplate(list);
                    this.currentIdx += list.length;
                } else {
                    this.moreBtn.getElementsByClassName.display = "none";
                }       
            } 
        })
    }

    makeTemplate(list) {
        const content = document.querySelector(".content-box");
        if(this.currentIdx == 0) {
            content.innerHTML = "";
            this.grid = document.createElement("div");
            this.grid.id = "gridContainer";
        }
        list.forEach((item) => {
            setTimeout(()=> {
                let dom = this.makeItem(item);
                this.grid.appendChild(dom);
                setTimeout(()=> {
                    dom.classList.add("active");
                    this.checkScroll();
                }, 10);
            }, Math.floor(item.id / 8) * 500);
        });
        content.appendChild(this.grid);
    }

    checkScroll() {
        if(window.innerHeight + window.scrollY <= document.body.clientHeight ) {
            window.scrollTo(0, document.body.clientHeight - window.innerHeight);
        };
    }

    makeItem(item) {
        let dom = document.createElement("li");
        dom.classList.add("todo-box");
        dom.innerHTML = `<li>
                            <div class="box-type" id="post_number_${item.id}">
                             
                                <div class="com-category">
                                    <p>${item.category}</p>
                                </div>
                                <div class="com-title">
                                    <p>${item.title}</p>
                                </div>
                                <div class="com-sub-title">
                                    <p>${item.sub_title}</p>
                                </div>
                                <div class="com-owner">
                                    <p>${item.userid}</p>
                                </div>
                                <div class="com-date">
                                    <p>${item.date}</p>
                                </div>
                                <div class="com-view">
                                    <p>${item.view}</p>
                                </div>
                                <div class="button-row">
                                    <button type="button" class="btn btn-primary btn-sm mod" data-id="${item.id}">수정</button>
                                    <button type="button" class="btn btn-danger btn-sm del" data-id="${item.id}">삭제</button>
                                </div>
                            </div>
                        </li>`
        return dom;
    }


    modItem(id) {
       $.ajax({
           url: `/ListPage`,
           method: 'post',
           data:{"id":id},
           success: (data) => {
               if(data) {
                    console.log(data)
               }               
           }
       })
    }

    deleteItem(id, target) {
        $.ajax({
            url: `/del`,
            method: 'get',
            data:{"id":id},
            success: (data) => {
                console.log(data);
                if(data.success) {
                    setTimeout(()=> {
                        target.remove();
                        this.toast("제거 되었습니다.");
                    }, 500);
                } else {
                    this.toast("제거가 되지 못했습니다.");
                }
            }
        })
    }


    //토스 메세지
    toast(){
        let removeToast;
        function toast(string) {
            const toast = document.getElementById("toast");

            toast.classList.contains("reveal") ?
                (clearTimeout(removeToast), removeToast = setTimeout(function () {
                    document.getElementById("toast").classList.remove("reveal")
                }, 1000)) :
                removeToast = setTimeout(function () {
                    document.getElementById("toast").classList.remove("reveal")
                }, 1000)
            toast.classList.add("reveal"),
                toast.innerText = string;
        }
    }
}