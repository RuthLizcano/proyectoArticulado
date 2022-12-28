function validarFormulario8(){
    var codigoAdministrador= document.forms["form8"]["codigoAdministrador"].value;
    var apellidoResponsable= document.forms["form8"]["apellidoResponsable"].value;
    var nombreCampeonato= document.forms["form8"]["nombreCampeonato"].value;
    var cedulaResponsable= document.forms["form8"]["cedulaResponsable"].value;
    var direccion= document.forms["form8"]["direccion"].value;
    var telefonoCelular= document.forms["form8"]["telefonoCelular"].value;
     var costoPersona = document.forms["form8"]["costoPersona"].value;
    var gastoJAC= document.forms["form8"]["gastoJAC"].value;
    
    var dineroRecaudadoJAC= document.forms["form8"]["dineroRecaudadoJAC"].value;
    var fechaInicio = document.forms["form8"]["fechaInicio"].value;
    var fechaFinal= document.forms["form8"]["fechaFinal"].value;
    var diaCampeonato = document.forms["form8"]["diaCampeonato"].value;
     var horaCampeonato = document.forms["form8"]["horaCampeonato"].value;
      var cedulaRegistrante = document.forms["form8"]["cedulaRegistrante"].value;
     
  
   

    if (codigoAdministrador == "" || apellidoResponsable =="" || nombreCampeonato=="" ||  cedulaResponsable=="" ||  cedulaResponsable=="" || direccion==""||
        telefonoCelular== "" || costoPersona=="" || gastoJAC=="" || dineroRecaudadoJAC=="" || fechaInicio=="" || fechaFinal=="" || diaCampeonato =="" || horaCampeonato=="" || cedulaRegistrante=="")  {
    alert("Por favor verifique que todos los campos estén llenos");
    return false;
    }
  
   
}   