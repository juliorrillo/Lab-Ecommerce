
function muestraErrorCargaFoto() {
        document.getElementById('alertaFoto').style.display = 'block';     
  }
  setTimeout(OcultarErrorCargaFoto, 4000);

function OcultarErrorCargaFoto() {
    document.getElementById('alertaFoto').style.display = 'none';
}

function muestraExito() {
    document.getElementById('Exito').style.display = 'block';
}

function ocutaExito() {
document.getElementById('Exito').style.display = 'none';
}

setTimeout(ocutaExito, 5000);




var validoyEnvioEditarMiVenta = () =>{
    var frm = document.getElementsByClassName("formEditar");
    var i;
    for (i = 0; i < frm.length; i++) {
        if(frm[i].idProd.checked) {
            if(frm[i].prd_foto1.value !== ''){
                ocutaExito();
                OcultarErrorCargaFoto();
                frm[i].actualiza.value = 1;
                //document.getElementById('actualiza').value = '1';
                muestraExito();
                return true               
            }
            else{
                muestraErrorCargaFoto();
                return false;
            }
          }
    }   
 
}

var EditarPerfil = () =>{
    var frm = document.getElementsByClassName("formEditarPerfil");
    var i;
    for (i = 0; i < frm.length; i++) {
        if(frm[i].idUsu.checked) {
                document.getElementById('actualiza').value = '1';
                muestraExito();
                return true
        }               
            else{
                return false;
            }
          }
    }   

    var EliminarProducto = () =>{
        var frm = document.getElementsByClassName("formEditar");
        var i;
        for (i = 0; i < frm.length; i++) {
            if(frm[i].idProd.checked) {
                    frm[i].Elimina.value = 1;
                    return true
            }               
                else{
                    return false;
                }
              }
        }   
