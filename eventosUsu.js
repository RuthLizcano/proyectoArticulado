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

    var numero=0;
    var posicionX=0;

    var sprite= new Image();
    sprite.src="ev1.jpg";


    function tiempo(){


        if (numero>=4536)
        {
            numero=0;
        }else{
            numero+=20;
        }

        for(var i=0; i<=numero; i+=378)
        {
            if(numero>=i)
            {
                posicionX=i;
            }
        }
        ctx.clearRect(0,20,400,400)
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

    var canvas=document.querySelector("#lienzo2");
    var ctx= canvas.getContext("2d");

    var numero=0;
    var posicionX=0;

    var sprite= new Image();
    sprite.src="ev2.jpg";


    function tiempo(){


        if (numero>=4536)
        {
            numero=0;
        }else{
            numero+=10;
        }

        for(var i=0; i<=numero; i+=378)
        {
            if(numero>=i)
            {
                posicionX=i;
            }
        }
        ctx.clearRect(0,20,400,400)
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

    var canvas=document.querySelector("#lienzo3");
    var ctx= canvas.getContext("2d");

    var numero=0;
    var posicionX=0;

    var sprite= new Image();
    sprite.src="ev3.jpg";


    function tiempo(){


        if (numero>=4536)
        {
            numero=0;
        }else{
            numero+=10;
        }

        for(var i=0; i<=numero; i+=378)
        {
            if(numero>=i)
            {
                posicionX=i;
            }
        }
        ctx.clearRect(0,20,400,400)
        ctx.drawImage(sprite,posicionX,0,378,378, 0, 0, 378, 378);
        frame(tiempo);

    }
    tiempo();
}

function draw4(){
    var frame= window.requestAnimationFrame ||
               window.mozRequestAnimationFrame ||
               window.webkitRequestAnimationFrame ||
               window.msRequestAnimationFrame; 

    var canvas=document.querySelector("#lienzo4");
    var ctx= canvas.getContext("2d");

    var numero=0;
    var posicionX=0;

    var sprite= new Image();
    sprite.src="ev4.jpg";


    function tiempo(){


        if (numero>=4536)
        {
            numero=0;
        }else{
            numero+=10;
        }

        for(var i=0; i<=numero; i+=378)
        {
            if(numero>=i)
            {
                posicionX=i;
            }
        }
        ctx.clearRect(0,20,400,400)
        ctx.drawImage(sprite,posicionX,0,378,378, 0, 0, 378, 378);
        frame(tiempo);

    }
    tiempo();
}

function draw5(){
    var frame= window.requestAnimationFrame ||
               window.mozRequestAnimationFrame ||
               window.webkitRequestAnimationFrame ||
               window.msRequestAnimationFrame; 

    var canvas=document.querySelector("#lienzo5");
    var ctx= canvas.getContext("2d");

    var numero=0;
    var posicionX=0;

    var sprite= new Image();
    sprite.src="ev5.jpg";


    function tiempo(){


        if (numero>=4536)
        {
            numero=0;
        }else{
            numero+=10;
        }

        for(var i=0; i<=numero; i+=378)
        {
            if(numero>=i)
            {
                posicionX=i;
            }
        }
        ctx.clearRect(0,20,400,400)
        ctx.drawImage(sprite,posicionX,0,378,378, 0, 0, 378, 378);
        frame(tiempo);

    }
    tiempo();
}

function draw6(){
    var frame= window.requestAnimationFrame ||
               window.mozRequestAnimationFrame ||
               window.webkitRequestAnimationFrame ||
               window.msRequestAnimationFrame; 

    var canvas=document.querySelector("#lienzo6");
    var ctx= canvas.getContext("2d");

    var numero=0;
    var posicionX=0;

    var sprite= new Image();
    sprite.src="ev6.jpg";


    function tiempo(){


        if (numero>=4536)
        {
            numero=0;
        }else{
            numero+=10;
        }

        for(var i=0; i<=numero; i+=378)
        {
            if(numero>=i)
            {
                posicionX=i;
            }
        }
        ctx.clearRect(0,20,400,400)
        ctx.drawImage(sprite,posicionX,0,378,378, 0, 0, 378, 378);
        frame(tiempo);

    }
    tiempo();
}

function draw7(){
    var frame= window.requestAnimationFrame ||
               window.mozRequestAnimationFrame ||
               window.webkitRequestAnimationFrame ||
               window.msRequestAnimationFrame; 

    var canvas=document.querySelector("#lienzo7");
    var ctx= canvas.getContext("2d");

    var numero=0;
    var posicionX=0;

    var sprite= new Image();
    sprite.src="ev7.jpg";


    function tiempo(){


        if (numero>=4536)
        {
            numero=0;
        }else{
            numero+=10;
        }

        for(var i=0; i<=numero; i+=378)
        {
            if(numero>=i)
            {
                posicionX=i;
            }
        }
        ctx.clearRect(0,20,400,400)
        ctx.drawImage(sprite,posicionX,0,378,378, 0, 0, 378, 378);
        frame(tiempo);

    }
    tiempo();
}

function draw8(){
    var frame= window.requestAnimationFrame ||
               window.mozRequestAnimationFrame ||
               window.webkitRequestAnimationFrame ||
               window.msRequestAnimationFrame; 

    var canvas=document.querySelector("#lienzo8");
    var ctx= canvas.getContext("2d");

    var numero=0;
    var posicionX=0;

    var sprite= new Image();
    sprite.src="ev8.jpg";


    function tiempo(){


        if (numero>=4536)
        {
            numero=0;
        }else{
            numero+=10;
        }

        for(var i=0; i<=numero; i+=378)
        {
            if(numero>=i)
            {
                posicionX=i;
            }
        }
        ctx.clearRect(0,20,400,400)
        ctx.drawImage(sprite,posicionX,0,378,378, 0, 0, 378, 378);
        frame(tiempo);

    }
    tiempo();
}

function draw9(){
    var frame= window.requestAnimationFrame ||
               window.mozRequestAnimationFrame ||
               window.webkitRequestAnimationFrame ||
               window.msRequestAnimationFrame; 

    var canvas=document.querySelector("#lienzo9");
    var ctx= canvas.getContext("2d");

    var numero=0;
    var posicionX=0;

    var sprite= new Image();
    sprite.src="ev9.jpg";


    function tiempo(){


        if (numero>=4536)
        {
            numero=0;
        }else{
            numero+=10;
        }

        for(var i=0; i<=numero; i+=378)
        {
            if(numero>=i)
            {
                posicionX=i;
            }
        }
        ctx.clearRect(0,20,400,400)
        ctx.drawImage(sprite,posicionX,0,378,378, 0, 0, 378, 378);
        frame(tiempo);

    }
    tiempo();
}