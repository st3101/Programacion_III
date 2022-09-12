<?php
include "Garage.php";

$auto1 = new auto("peugeot","Gris",100,Date("d/m/y")); 
$auto2 = new auto("elauto","Negro",50,Date("d/m/y")); 
$auto3 = new auto("tutu","azul",1,Date("d/m/y"));
$auto4 = new auto("elauto","Negro",50,Date("d/m/y"));

$migaraje = new garaje("Nose",999,array($auto1));

echo $migaraje->MostrarGarage();

if($migaraje->Add($auto3))
{
    echo "<br/> Lo agrego";
}


echo "<br/>";
echo "<br/>";
echo $migaraje->MostrarGarage();


$migaraje->Remove($auto1);

echo "<br/>";
echo "<br/>";
echo $migaraje->MostrarGarage();

?>  