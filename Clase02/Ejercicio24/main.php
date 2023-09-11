<?php

namespace a;

include "Fabrica.php";
include "Operario.php";

$miNegocio = new Fabrica("Negocio"); 

if($miNegocio->add(new Operario(123,"Leonardi","Santiago",100)))
{
    echo "Se agrego.\n";
}
else
{
    echo "no se agrego";
}

echo $miNegocio->mostrar();
