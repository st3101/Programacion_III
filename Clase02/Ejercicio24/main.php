<?php

namespace a;

include "Fabrica.php";
include "Operario.php";

$miNegocio = new Fabrica("Negocio"); 

$miNegocio->add(new Operario(123,"Leonardi","Santiago",100));
$miNegocio->add(new Operario(123,"Ruino","Marteeeen",200));


echo $miNegocio->mostrar()."\n\n";

$miNegocio->remove(new Operario(123,"Ruino","Marteeeen",200));

echo $miNegocio->mostrar();



