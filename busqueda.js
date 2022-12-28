function validarBusquedaAdm(){
    var nit = document.forms["formulario"]["nit"].value;
    var codigoObra = document.forms["formulario"]["codigoObra"].value;
    var añoInicio = document.forms["formulario"]["añoInicio"].value;
    var añoFinal = document.forms["formulario"]["añoFinal"].value;
   

    if (nit == "" && codigoObra =='' && añoInicio =="" && añoFinal=="" )  {
    alert("Por favor diligencie, aunque sea un campo.");
    return false;
    }
  
   
}
function validarBusquedaAdm1(){
    var codigoAfiliado = document.forms["formulario1"]["codigoAfiliado"].value;
    var apellidoAfiliado = document.forms["formulario1"]["apellidoAfiliado"].value;
    var cedula = document.forms["formulario1"]["cedula"].value;
    var UsuarioAfiliado = document.forms["formulario1"]["UsuarioAfiliado"].value;
    var contrasenaAfiliado = document.forms["formulario1"]["contrasenaAfiliado"].value;

    if (codigoAfiliado == "" && apellidoAfiliado =='' && cedula =="" && UsuarioAfiliado=="" && contrasenaAfiliado=="" )  {
    alert("Por favor diligencie, aunque sea un campo.");
    return false;
    }
  
   
}
function validarBusquedaAdm2(){
    var codigoAministrativo = document.forms["formulario2"]["codigoAministrativo"].value;
    var cedula = document.forms["formulario2"]["cedula"].value;
    var UsuarioAdministrativo = document.forms["formulario2"]["UsuarioAdministrativo"].value;
    var contrasenaAdministrativo = document.forms["formulario2"]["contrasenaAdministrativo"].value;
    var rolAdministrativo = document.forms["formulario2"]["rolAdministrativo"].value;

    if (codigoAministrativo == "" && cedula =='' && UsuarioAdministrativo =="" && contrasenaAdministrativo=="" && rolAdministrativo=="" )  {
    alert("Por favor diligencie, aunque sea un campo.");
    return false;
    }
  
   
}
function validoBusquedaAdm3(){
    var fechaRegistro = document.forms["formulario3"]["fechaRegistro"].value;
    var tipoEvento = document.forms["formulario3"]["tipoEvento"].value;
    var codigoEvento = document.forms["formulario3"]["codigoEvento"].value;
    var codigoAdministrativo = document.forms["formulario3"]["codigoAdministrativo"].value;
    

    if (fechaRegistro == "" && tipoEvento =='' && codigoEvento =="" && codigoAdministrativo=="" && rolAdministrativo=="" )  {
    alert("Por favor diligencie, aunque sea un campo.");
    return false;
    }
  
   
}