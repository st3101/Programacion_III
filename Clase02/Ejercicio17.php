
<?php
include "auto.php";

//Santiago Leonardi
//Ejercicio 17

$auto1 = new auto("peugeot","Gris"); 
$auto2 = new auto("peugeot","Negro");

$auto3 = new auto("Audi","negro",1000);
$auto4 = new auto("Audi","negro",500);

$auto5 = new auto("Fiat","Blanco",50,Date("d/m/y"));

$auto3->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto5->AgregarImpuestos(1500);

echo auto::MostrarAuto($auto3)."<br/>";
echo auto::MostrarAuto($auto4)."<br/>";
echo auto::MostrarAuto($auto5)."<br/>";

echo auto::Add($auto1,$auto2)."<br/>";

if($auto1->Equals($auto1,$auto2))
{
    echo "Son iguales <br/>";
}

echo auto::MostrarAuto($auto1)."<br/>";
echo auto::MostrarAuto($auto3)."<br/>";
echo auto::MostrarAuto($auto5)."<br/>";


?>