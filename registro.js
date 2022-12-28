function draw(){

    var c = document.getElementById("degradado");
    var ctx = c.getContext("2d");


    var texto1 = "URBANIZACIÓN ''LA CORUÑA'' ";
    var gradiente = ctx.createLinearGradient(0,0, 0,80);
    gradiente.addColorStop(.20, "#FFF700");
    gradiente.addColorStop(.40, "#FF2D00");
    gradiente.addColorStop(.60, "#FF2D00");
    gradiente.addColorStop(.80, "#FF2D00");
    gradiente.addColorStop(1, "#CE0000");
    
    ctx.lineWidth = 2.0;
    ctx.font = "50px Book Antiqua, Sans-serif";
    ctx.strokeStyle = "black";
    ctx.fillStyle = gradiente;
    
    ctx.strokeText(texto1, 15, 50);
    ctx.fillText(texto1, 15, 50);


}


function draw1(){

    var frame= window.requestAnimationFrame ||
    window.mozRequestAnimationFrame ||
    window.webkitRequestAnimationFrame ||
    window.msRequestAnimationFrame; 

var canvas=document.querySelector("#lienzo");
var ctx= canvas.getContext("2d");

var numero=378;
var posicionX=0;

var sprite= new Image();
sprite.src="union1.png";


function tiempo(){


if (numero>=9072)
{
 numero=0;
}else{
 numero+=5;
}

for(var i=0; i<=numero; i+=378)
{
 if(numero>=i)
 {
     posicionX=i;
 }
}
ctx.clearRect(0,0,378,378)
ctx.drawImage(sprite,posicionX,0,378,378, 0, 0, 378, 378);
frame(tiempo);

}
tiempo();
}

function draw2(){

    var frame= window.requestAnimationFrame ||
    window.mozRequestAnimationFrame ||
    window.webkitRequestAnimationFrame ||
    window.msRequestAnimationFrame; 

var canvas=document.querySelector("#lienzo");
var ctx= canvas.getContext("2d");

var numero=756;
var posicionX=0;

var sprite= new Image();
sprite.src="union2.png";


function tiempo(){


if (numero>=9072)
{
 numero=0;
}else{
 numero+=5;
}

for(var i=0; i<=numero; i+=378)
{
 if(numero>=i)
 {
     posicionX=i;
 }
}
ctx.clearRect(0,0,378,378)
ctx.drawImage(sprite,posicionX,0,378,378, 0, 0, 378, 378);
frame(tiempo);

}
tiempo();
}

function draw3(){

    var frame= window.requestAnimationFrame ||
    window.mozRequestAnimationFrame ||
    window.webkitRequestAnimationFrame ||
    window.msRequestAnimationFrame; 

var canvas=document.querySelector("#lienzo");
var ctx= canvas.getContext("2d");

var numero=0;
var posicionX=0;

var sprite= new Image();
sprite.src="union3.png";


function tiempo(){


if (numero>=9072)
{
 numero=1134;
}else{
 numero+=5;
}

for(var i=0; i<=numero; i+=378)
{
 if(numero>=i)
 {
     posicionX=i;
 }
}
ctx.clearRect(0,0,378,378)
ctx.drawImage(sprite,posicionX,0,378,378, 0,0, 378, 378);
frame(tiempo);

}
tiempo();
}



