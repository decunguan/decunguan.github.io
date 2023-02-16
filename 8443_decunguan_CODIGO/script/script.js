
var lado_1 = document.getElementById("lado_1");
var lado_2 = document.getElementById("lado_2");
var lado_3 = document.getElementById("lado_3");


function ingresoDatos(){
selector = document.getElementById("select").value;
if( selector == "cuadrado"){
    lado_1.disabled = false;
    lado_2.disabled = true;
    lado_3.disabled = true;

}else if(selector == "rectangulo"){
    lado_1.disabled = false;
    lado_2.disabled = false;
    lado_3.disabled = true;

}else if(selector == "triangulo"){
    lado_1.disabled = false;
    lado_2.disabled = false;
    lado_3.disabled = false;
}
}
    