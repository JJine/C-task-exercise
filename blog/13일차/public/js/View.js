class View {
    constructor() {
        this.moreBtn = document.querySelector("#moreBtn");
        this.moreBtn.addEventListener("click", ()=> {
            this.getDataFromServer(this.currentIdx);
        });

        document.addEventListener("click", (e)=> {
            if(e.target.classList.contains("mod")) {
                let id = e.target.dataset.id;
                this.modItem(id, e.target.parentNode.parentNode);
            }
        })

        document.addEventListener("click", (e)=> {
            if(e.target.classList.contains("del")) {
                let id = e.target.dataset.id;
                this.deleteItem(id, e.target.parentNode.parentNode);
            }
        })

        this.currentIdx = 0;
        this.grid = null;
        this.getDataFromServer(this.currentIdx);

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
        console.log(item);
        dom.classList.add("todo-box");
        dom.innerHTML = `<li>
                            <div class="box-type">
                                <div class="com-img">
                                    <img src="" alt="">
                                </div>
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
                                <div class="button-row">
                                    <button type="button" class="btn btn-primary btn-sm mod" data-id="${item.id}">수정</button>
                                    <button type="button" class="btn btn-danger btn-sm del" data-id="${item.id}">삭제</button>
                                </div>
                            </div>
                        </li>`
        return dom;
    }

    modItem(item) {
        let dom = document.createElement("div");
        dom.classList.add("todo-box");
        dom.innerHTML = `<li>
                            <a href="" class="box-type">
                                <div class="com-img">
                                    <img src="" alt="">
                                </div>
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
                            </a>
                        </li>`
        return dom;
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
                    }, 500);
                } else {
                    this.toast();
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