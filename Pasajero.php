<?php

class Pasajero
{
    //Atributos
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;

    //Método constructor
    public function __construct($elNombre, $elApellido, $elDni, $tel)
    {
        $this->nombre = $elNombre;
        $this->apellido = $elApellido;
        $this->dni = $elDni;
        $this->telefono = $tel;
    }

    //Getters
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getDni()
    {
        return $this->dni;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }

    //Setters
    public function setNombre($dato)
    {
        $this->nombre = $dato;
    }
    public function setApellido($dato)
    {
        $this->apellido = $dato;
    }
    public function setDni($dato)
    {
        $this->dni = $dato;
    }
    public function setTelefono($dato)
    {
        $this->telefono = $dato;
    }

    public function __toString()
    {
        return "\nNombre del pasajero: " . $this->getNombre() . " " . $this->getApellido() .
            "\nNúmero de documento: " . $this->getDni() . "\nTeléfono: " . $this->getTelefono() . "\n";
    }
}
