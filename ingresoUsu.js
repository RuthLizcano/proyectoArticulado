function draw(){

    var c = document.getElementById("degradado");
    var ctx = c.getContext("2d");


    var texto1 = "Bienvenido A La Junta De Accion Comunal";
    var gradiente = ctx.createLinearGradient(0,0, 0,80);
    gradiente.addColorStop(.20, "#FFF700");
    gradiente.addColorStop(.40, "#FF2D00");
    gradiente.addColorStop(.60, "#FF2D00");
    gradiente.addColorStop(.80, "#FF2D00");
    gradiente.addColorStop(1, "#CE0000");
    
    ctx.lineWidth = 2.0;
    ctx.font = "43px Book Antiqua, Sans-serif";
    ctx.strokeStyle = "black";
    ctx.fillStyle = gradiente;
    
    ctx.strokeText(texto1, 15, 40);
    ctx.fillText(texto1, 15, 40);


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
    sprite.src="img.jpg";


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

function validarFormulario1(){
    var correo = document.forms["form1"]["correo"].value;
    var contraseña = document.forms["form1"]["contraseña"].value;


    if (correo == "" || contraseña =="" ) {
    alert("Debe ingresar todos los campos");
    return false;
    }
}


