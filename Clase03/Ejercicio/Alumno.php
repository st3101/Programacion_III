<?php

class Alumno
{
    private string $_nombre;
    private $_apellido;
    private $_legajo;

    function __construct($nombre,$apellido,$legajo)
    {
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setLegajo($legajo);
    }
    function mostrarUno()
    {
        if($this != null)
        {
            return $this->getLegajo()."-".$this->getApellido()."-".$this->getNombre();
        }
    }

    #region Getter y Setters
    function setNombre($nombre)
    {
        if($nombre != null)
        {
            $this->_nombre = $nombre;
        }
    }

    function getNombre()
    {
        return $this->_nombre;
    }
    function setApellido($apellido)
    {
        if($apellido != null)
        {
            $this->_apellido = $apellido;
        }
    }
    function getApellido()
    {
        return $this->_apellido;
    }

    function setLegajo($legajo)
    {
        if($legajo != null)
        {
            $this->_legajo = $legajo;
        }
    }
    function getLegajo()
    {
        return $this->_legajo;
    }
    

    #endregion
    #region Arrays
   static function mostrarTodos($arrayAlumnos)
    {
        $retorno = "";
        if($arrayAlumnos != null)
        {
            for ($i=0; $i < count($arrayAlumnos); $i++) 
            { 
                $retorno .= $arrayAlumnos[$i]->mostrarUno()."\n";
            }
        }
        return $retorno;
    }
    static function guardarAlumnos($arrayAlumno,$path)
    {
        $retorno = false;
        if($arrayAlumno != null && $path != null)
        {
            $textoAlumnos = Alumno::mostrarTodos($arrayAlumno);
            if($textoAlumnos != null)
            {
                if(Archivo::guardar($textoAlumnos,$path))
                {
                    $retorno = true;
                }
            }
        }
        return $retorno;
    }
    static function cargarAlumnos($path)
    {
        $arrayAlumnos = array();

        if($path != null)
        {
            $textoPlano = Archivo::cargar($path);

            if($textoPlano != null)
            {
                $arrayAlumnosString = explode("\n",$textoPlano);

                $a = 1;

                for ($i=0; $i < count($arrayAlumnosString)-1; $i++) 
                { 
                        $arrayDatos = explode("-",$arrayAlumnosString[$i]);
                        array_push($arrayAlumnos,new Alumno($arrayDatos[2],$arrayDatos[1],$arrayDatos[0]));
                }
            }
        }
        return $arrayAlumnos;
    }
    static function agregarAlumno($arrayAlumnos,$nombre,$apellido,$legajo)
    {
        $retorno = null;

        if($arrayAlumnos == null)
        {
            $arrayAlumnos = array();
        }
        if($arrayAlumnos != null && $nombre != null && $apellido != null && $legajo != null)
        {
            $alumno = new Alumno($nombre,$apellido,$legajo);

            if($alumno != null)
            {
                if(array_push($arrayAlumnos,$alumno))
                {
                    $retorno = $arrayAlumnos;
                }
            }
        }
        return $retorno;
    }

    static function buscarAlumno($arrayAlumnos,$legajo)
    {
        $retorno = false;
        if($arrayAlumnos != null && $legajo != null)
        {
            
            for ($i=0; $i < count($arrayAlumnos); $i++) 
            { 
                if($legajo == $arrayAlumnos[$i]->getLegajo())
                {
                    $retorno = true;
                    break;
                }                
            }
        }
        return $retorno;
    }

#endregion
}

?>