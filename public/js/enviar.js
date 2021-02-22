window.onload=function(){
    var formulario=document.getElementById("formulario");
    formulario.addEventListener("submit",function(e){
        e.preventDefault();

        if(validar_fecha()){
            var http = new XMLHttpRequest();
            var url = this.getAttribute("href");
            
            http.onreadystatechange=function(){
                if(this.readyState==4){
                    document.getElementById("table").innerHTML=this.responseText;
                }
            }
            http.open("POST",url,true);
            http.setRequestHeader('Contsent-type', 'application/x-www-form-urlencoded'); 
            var form= new FormData(formulario);
            http.send(form);
        }
    })
}
function validar_fecha(){
    var inicio =document.getElementById("inicio").value;
    var fin =document.getElementById("fin").value;
    var exp = /^[0-9][0-9][-][0-9][0-9][0-9][0-9]$/;
    if(!exp.test(inicio)){
        document.getElementById("modal").innerHTML="Por favor ingresa la fecha de inicio en el formato MM-YYYY";
        modal();
        return false;
    }else{
        if(!exp.test(fin)){
            document.getElementById("modal").innerHTML="Por favor ingresa la fecha de final en el formato MM-YYYY";
            modal();
            return false;
        }    
        else{
            inicio=inicio.split("-");
            fin=fin.split("-");

            if(!( parseInt(inicio[0],10) >=1 && parseInt(inicio[0],10) <=12 )){
                document.getElementById("modal").innerHTML="Solo puedes elegir meses de 01-12";
                modal();
                return false;
            }
            else{
                if(!( parseInt(fin[0],10) >=1 && parseInt(fin[0],10) <=12 )){
                    document.getElementById("modal").innerHTML="Solo puedes elegir meses de 01-12";
                    modal();
                    return false;
                }
            }

            var fecha_inicio = new Date(inicio[1]+"-"+inicio[0]+"-01");
            var fecha_final = new Date(fin[1]+"-"+fin[0]+"-01");
            if(Date.parse(fecha_inicio) >= Date.parse(fecha_final)){
                document.getElementById("modal").innerHTML="La fecha de inicio tiene que ser mayor a la fecha final";
                modal();
                return false;
            }            
        }    
    }
    return true;
    
}
function modal(){
    document.getElementById("contenido").classList.toggle('blur');;
    document.getElementById("md").classList.toggle('active');;
}
