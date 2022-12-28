function validarFormulario4(){
    var nombreResponsable = document.forms["form4"]["nombreResponsable"].value;
    var apellidoResponsable= document.forms["form4"]["apellidoResponsable"].value;
    var cedulaResponsable= document.forms["form4"]["cedulaResponsable"].value;
    var direccion = document.forms["form4"]["direccion"].value;
    var telefonoCelular = document.forms["form4"]["telefonoCelular"].value;
   
     var horaAlquiler = document.forms["form4"]["horaAlquiler"].value;
    var abono= document.forms["form4"]["abono"].value;
    var costo= document.forms["form4"]["costo"].value;
    var deposito= document.forms["form4"]["deposito"].value;
  
  
     var cedulaRegistrante = document.forms["form4"]["cedulaRegistrante"].value;
    
   
   

    if (nombreResponsable == "" || apellidoResponsable =="" || cedulaResponsable=="" ||  direccion=="" ||  telefonoCelular=="" || 
        horaAlquiler == "" || abono =="" || costo=="" ||  deposito=="" || cedulaRegistrante==""  )  {
    alert("Por favor verifique que todos los campos estén llenos");
    return false;
    }
  
   
}