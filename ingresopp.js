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
    var correo = document.forms["form1"]["usuario"].value;
    var contraseña = document.forms["form1"]["contrasena"].value;


    if (correo == "" || contraseña =="" ) {
    alert("Debe ingresar todos los campos");
    return false;
    }
}


function validarFormulario2(){
    var nombre = document.forms["form1"]["nombre"].value;
    var apellido = document.forms["form1"]["apellido"].value;
    var cedula = document.forms["form1"]["cedula"].value;
    var telefono = document.forms["form1"]["telefono"].value;
    var direccion = document.forms["form1"]["direccion"].value;
    var correo = document.forms["form1"]["correo"].value;
   


    var i,j;
    var numeros="0123456789";
    var letras="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMÑOPQRSTUVWXYZ"
    var cont=0;

    for(i=0; i<numeros.length; i++)
    {
        for(j=0; j<30; j++)
        {
            if(numeros[i]==nombre[j])
            {
                cont=1;
            }
             if(numeros[i]==apellido[j]){
                cont=2;
            }
        }
    }

    for(i=0; i<letras.length; i++)
    {
        for(j=0; j<10; j++)
        {
             if(letras[i]==telefono[j]){
                cont=3;
            }
            if(letras[i] == cedula[j])
            {
                cont=4;
            }
        }
    }



    if (nombre == "" || apellido =="" || cedula=="" || telefono==""  || direccion=="" || correo=="" )  {
    alert("Debe ingresar todos los campos");
    return false;
    }
    else if(nombre.length >30 || apellido.length>30){
        alert("El nombre o apellido es muy largo");
        return false;
    }
    
    else if(telefono.length !=10 || cont==3){
        alert("Telefono incorrecto");
        return false;
    }
    else if(cont==1){
        alert("Numeros en el nombre");
        return false;
    }
    else if(cont==2){
        alert("Numeros en el apellido")
        return false;

    }else if(cedula>10 && cedula < 6 || cont==4  )
    {
        alert("El numero de cedula es incorrecto")
        return false;

    }
    
}

function validarFormulario3(){
    var nombre = document.forms["form1"]["nombre"].value;
    var correo = document.forms["form1"]["correo"].value;
    var mensaje = document.forms["form1"]["mensaje"].value;
    
   


    var i,j;
    var numeros="0123456789";
    var letras="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMÑOPQRSTUVWXYZ"
    var cont=0;

    for(i=0; i<numeros.length; i++)
    {
        for(j=0; j<30; j++)
        {
            if(numeros[i]==nombre[j])
            {
                cont=1;
            }
             
        }
    }





    if (nombre == "" || correo =="" || mensaje=="" )  {
    alert("Debe ingresar todos los campos");
    return false;
    }
    else if(nombre.length >30 ){
        alert("El nombre es muy largo");
        return false;
    }
    
    else if(cont==1){
        alert("Numeros en el nombre");
        return false;
    }
}


