class MainApp {
    constructor() {
        this.moreBtn = document.querySelector("#moreBtn");
        this.moreBtn.addEventListener("click", ()=> {
            this.getDataFromServer(this.currentIdx);
        });

        // $(document).on("click", ".del", ()=> {
        //     alert("클릭");
        // })

        document.addEventListener("click", (e)=> {
            if(e.target.classList.contains("del")) {
                let id = e.target.dataset.id;
                console.log(id);
                this.deleteItem(id, e.target.parentNode.parentNode);
            }
        })
        this.currentIdx = 0;
        this.grid = null;
        this.getDataFromServer(this.currentIdx);
    }

   
    deleteItem(id, target) {
        $.ajax({ 
            url: `todo/del/${id}`,
            method : 'get',
            success: (data) => {
                if(data.success) {
                    setTimeout(()=> {
                        target.remove();
                    }, 500);
                } else {
                    alert(data.msg);
                }
            }
        });

        
    }

    getDataFromServer(idx) {
        $.ajax({
            url: `/todo/getList/${idx}`,
            method: 'get',
            success: (data) => {
                console.log(data);
                if(data.success){
                    this.makeTemplate(data.list);
                    this.currentIdx += data.list.length;
                } else {
                    this.moreBtn.style.display = "none";
                }
            }

            
        });
    }

    makeTemplate(list){
        const content = document.querySelector("#content");
        if(this.currentIdx == 0) {
            content.innerHTML = "";
            this.grid = document.createElement("div");
            this.grid.id = "gridContainer";
        }
     

        list.forEach((item, idx) => {
            setTimeout(() => {
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

    makeItem(item){
        let dom = document.createElement("div");
        dom.classList.add("todobox");
        dom.innerHTML = `<div class="header-box">
                            <div class="trans-box head"></div>
                            <p>${ item.title }</p>
                            <div class="trans-box tail"></div>
                        </div>
                        <div class="info-box">
                            <div class="time">
                                <div class="icon-box"><i class="far fa-clock"></i></div>
                                <div class="text-box">${item.date}</div>
                            </div>
                        </div>
                        <div class="button-row">
                            <button class="btn btn-primary btn-sm mod" data-id="${item.id}">수정</button>
                            <button class="btn btn-danger btn-sm del" data-id="${item.id}">삭제</button>
                        </div>`;
        return dom;
    }
}

window.addEventListener("load", () => {
    let mainApp = new MainApp();
});