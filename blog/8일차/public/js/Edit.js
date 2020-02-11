window.onload = function() {
        $(document).ready(()=> {
            $("#img").click(function () {
                $(".img-box").fadeIn();
            });
        });

        $(document).mouseup((e) => {
            let container = $(".img-box");
            if(container.has(e.target).length === 0) {
                container.fadeOut();
            }
        })

        $(document).ready(()=> {
            $("#link").click(function() {
                $(".link-box").fadIn();
            });
        });

        $(document).mouseup((e) => {
            let container = $(".link-box");
            if(container.has(e.target).length === 0) {
                container.fadeOut();
            }
        });
}