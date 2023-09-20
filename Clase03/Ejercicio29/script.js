
var btn = document.getElementById("btn");
btn.addEventListener("click",accion,true);

function accion()
{
    var indice = document.getElementById("selecColor").selectedIndex;
    var selec = document.getElementById("selecColor");

    var body = document.getElementsByTagName("body")[0];
    var body = document.getElementsByTagName("body")[0];
    body.style.backgroundColor = selec[indice].value;

}
