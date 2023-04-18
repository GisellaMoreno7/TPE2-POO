<?php

class ResponsableV
{
    //Atributos
    private $nroEmpleado;
    private $nroLicencia;
    private $nombre;
    private $apellido;

    //Método constructor
    public function __construct($numEmpleado, $numLicencia, $elNombre, $elApellido)
    {
        $this->nroEmpleado = $numEmpleado;
        $this->nroLicencia = $numLicencia;
        $this->nombre = $elNombre;
        $this->apellido = $elApellido;
    }

    //setters
    public function getNroEmpleado()
    {
        return $this->nroEmpleado;
    }
    public function getNroLicencia()
    {
        return $this->nroLicencia;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }

    //Setters
    public function setNroEmpleado($dato)
    {
        $this->nroEmpleado = $dato;
    }
    public function setNroLicencia($dato)
    {
        $this->nroLicencia = $dato;
    }
    public function setNombre($dato)
    {
        $this->nombre = $dato;
    }
    public function setApellido($dato)
    {
        $this->apellido = $dato;
    }

    public function __toString()
    {
        return "Número de empleado: " . $this->getNroEmpleado() .
            "\nNúmero de licencia: " . $this->getNroLicencia() .
            "\nNombre y apellido: " . $this->getNombre() . " " . $this->getApellido();
    }
}
