function validarFormulario1(){
    var nombreobra = document.forms["form3"]["nombreObra"].value;
    var tipoobra = document.forms["form3"]["tipoObra"].value;
    var nombreorganizacion = document.forms["form3"]["nombreOrganizacion"].value;
    var nit = document.forms["form3"]["nit"].value;
    var estado = document.forms["form3"]["estado"].value;
    var cedularegistrante = document.forms["form3"]["cedulaRegistrante"].value;
   

    if (nombreobra == "" || tipoobra =="" || nombreorganizacion =="" || nit==""  || estado=="" || cedularegistrante=="" )  {
    alert("Por favor verifique que todos los campos estén llenos");
    return false;
    }
  
   
}

 function validar(evento){
          key = evento.keyCode || evento.which;
            teclado = String.fromCharCode(key).toLocaleLowerCase();
            letras = " abcdefghijklmnñopqrstuvwxyz";
            especiales = "8-37-38-46";

            teclado_especial = false;
            for (var i in especiales) {
                if (key == especiales[i]) {
                    teclado_especial = true; break;
                }
            }
            if (letras.indexOf(teclado) == -1 && !teclado_especial) {
                return false; 
            }
  }

  function validarNumeros(evento){
    key = evento.keyCode || evento.which;
      teclado = String.fromCharCode(key).toLocaleLowerCase();
      numeros = "1234567890";
      especiales = "8-37-38-46";

      teclado_especial = false;
      for (var i in especiales) {
          if (key == especiales[i]) {
              teclado_especial = true; break;
          }
      }
      if (numeros.indexOf(teclado) == -1 && !teclado_especial) {
          return false; 
      }
}