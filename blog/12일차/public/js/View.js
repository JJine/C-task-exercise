class View {
    constructor(app) {
        this.app = app;

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
            method: 'get',
            success: (data) => {
                if(data.success) {
                    this.makeTemplate(data.list);
                this.currentIdx += data.list.length;
                } else {
                    this.moreBtn.getElementsByClassName.display = "none";
                }       
            } 
        })
    }

    makeTemplate(list) {
        const content = document.querySelector("#content");
        if(this.currentIdx == 0) {
            content.innerHTML = "";
            this.grid = document.createElement("div");
            this.grid.id = "gridContainer";
        }

        list.foreach((item, idx) => {
            setTimeout(()=> {
                let dom = this.makeItem(item);
                this.grid.appendChild(dom);
                setTimeout(()=> {
                    dom.classList.add("active");
                    this.checkScroll();
                }, 10);
            }, Math.floor(idx / 8) * 500);
        });
        content.appendChild(this.grid);
    }

    checkScroll() {
        if(window.innerHeight + window.scrollY <= document.body.clientHeight ) {
            window.scrollTo(0, document.body.clientHeight - window.innerHeight);
        };
    }

    makeItem() {
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
                                    <p>${item.sub-title}</p>
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
                                    <p>${item.sub-title}</p>
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
            url: `/del/${id}`,
            method: 'get',
            success: (data) => {
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