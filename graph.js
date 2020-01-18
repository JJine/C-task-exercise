window.onload = () => {
    const data = [
        { name : "1학년 1반 ", students: 27 },
        { name : "1학년 2반 ", students: 23 },
        { name : "1학년 3반 ", students: 25 },
        { name : "1학년 4반 ", students: 30 }
    ]
    
    const total = data.reduce((p,c) => p + c.students, 0); //reduce : 배열을 순환하면서 누산기에 저장 //총합 찍힘 (p, c)=> p + c // Math.max(p,c ) =최댓값
    //const total = 
    const canvas = document.querySelector("#graph");
    const ctx = canvas.getContext("2d");
    
    let circleX = canvas.width / 3;
    let circleY = canvas.height / 2;
    let padding = 50;
    let radius = (canvas.height - padding *2 ) /2;
    let startAngle = 0;
    // let endAngle = data * x * Math.PI * 2;
    // let endAngle = x : data=angle :Math.PI *2;

    ctx.beginPath();
    ctx.arc(circleX, circleY, radius, 0, 2 * Math.PI);
    ctx.stroke();

    let acc =0; //누산기

    //학급 수  : 전체 학년 수  = 360도에서 이 학급이 가지는 각도 : 360
    data.forEach((x, i) => {
        let angle = Math.PI * 2 * x.students / total;
        // ctx.beginPath();
        // ctx.fillStyle = randomColor();
        // ctx.arc(circleX, circleY, radius, startAngle, Math.PI * 2);
        // ctx.lineTo(circleX, circleY);
        // ctx.fill();
        
        ctx.beginPath();
        ctx.fillStyle = randomColor();
        ctx.arc(circleX, circleY, radius, acc, acc+ angle);
        ctx.lineTo(circleX, circleY);
        ctx.fill();
        acc +=angle;
        return;
    });

    function randomColor() {
        return `rgb(${parseInt(Math.random()*255)}, ${parseInt(Math.random()*255)}, ${parseInt(Math.random()*255)})`;
    }
}