<?php


class Validadores
{
    public static function separaFechaArray($fecha)
    {
        if($fecha != null)
        {
            $fecha = explode(',',$fecha);

            return  $fecha;
        }
    }

    //                                     16/10/22     15/11/23
    public static function MayorMenorFecha($fechaArray1,$fechaArray2)
    {
     
        $fechaArray1 = Validadores::separaFechaArray($fechaArray1->getFecha());
        $fechaArray2 = Validadores::separaFechaArray($fechaArray2->getFecha());

        $añoUno = (int)$fechaArray1[2];
        $añoDos = (int)$fechaArray2[2];

        $mesUno = (int)$fechaArray1[1];
        $mesDos = (int)$fechaArray2[1];

        $diaUno = (int)$fechaArray1[0];
        $diaDos = (int)$fechaArray2[0];
        

        if($añoUno ==  $añoDos)
        {
                if($mesUno == $mesDos)
                {
                    if($diaUno == $diaDos)
                    {
                        return 0;
                    }
                    else if ($diaUno < $diaDos)
                    {
                        return -1;
                    }
                    else
                    {
                        return 1;
                    }
                }
                else if($mesUno < $mesDos)
                {
                    return -1;
                }
                else if($mesUno > $mesDos)
                {
                    return 1;
                }

                return 0;
        } 
        else if($añoUno < $añoDos)
        {
            return -1;
        }
        else
        {
            return 1;
        }
    }

    public static function ordenarPorAlfabeto($stringUno,$stringDos)
    {

        if($stringUno != null && $stringDos != null)
        {      
            return strcmp($stringUno->getPizzaSabor(),$auxDos = $stringDos->getPizzaSabor());
        }

        return 0;
    }
}   



?>