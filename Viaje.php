<?php
include 'Pasajero.php';
include 'ResponsableV.php';
class Viaje
{
    //Atributos
    private $codViaje;
    private $destino;
    private $maxPasajeros;
    private $datosPasajeros;
    private $responsable;

    //Método constructor
    public function __construct($codigo, $lugarDestino, $cantMaxPsj, $cantTotal, $elResponsable)
    {
        $this->codViaje = $codigo;
        $this->destino = $lugarDestino;
        $this->maxPasajeros = $cantMaxPsj;
        $this->datosPasajeros = $cantTotal;
        $this->responsable = $elResponsable;
    }

    //Getters
    public function getCodigoViaje()
    {
        return $this->codViaje;
    }
    public function getDestino()
    {
        return $this->destino;
    }
    public function getMaxPasajeros()
    {
        return $this->maxPasajeros;
    }
    public function getDatosPasajeros()
    {
        return $this->datosPasajeros;
    }
    public function getResponsable()
    {
        return $this->responsable;
    }

    //Setters
    public function setCodigoViaje($dato)
    {
        $this->codViaje = $dato;
    }
    public function setDestino($dato)
    {
        $this->destino = $dato;
    }
    public function setMaxPasajeros($cant)
    {
        $this->maxPasajeros = $cant;
    }
    public function setDatosPasajeros($pasajeros)
    {
        $this->datosPasajeros = $pasajeros;
    }
    public function setResponsable($dato)
    {
        $this->responsable = $dato;
    }

    /**
     * Modifica datos de un pasajero o los elimina
     */
    public function modificarDatosPasajero()
    {
        $listado = $this->getDatosPasajeros();
        $index = $this->buscarPasajero();
        if ($index >= 0) {
            echo "Dato a cambiar (nombre, apellido, dni, tel): ";
            $dato = trim(fgets(STDIN));
            switch ($dato) {
                case "nombre": {
                        echo "Nuevo nombre: ";
                        $listado[$index]->setNombre(trim(fgets(STDIN)));
                        break;
                    }
                case "apellido": {
                        echo "Nuevo apellido: ";
                        $listado[$index]->setApellido(trim(fgets(STDIN)));
                        break;
                    }
                case "dni": {
                        echo "Nuevo DNI: ";
                        $listado[$index]->setDni(trim(fgets(STDIN)));
                        break;
                    }
                case "telefono": {
                        echo "Nuevo teléfono: ";
                        $listado[$index]->setTelefono(trim(fgets(STDIN)));
                        $this->setDatosPasajeros($listado);
                        break;
                    }
            }
            echo "Cambio realizado con éxito.";
        }
        if ($index == -1) {
            echo "No se ha encontrado al pasajero. ";
        }
    }

    /**
     * Agrega un pasajero a la colección, verifica que no exista previamente
     */
    public function agregarPasajero()
    {
        $listado = $this->getDatosPasajeros();
        $i = 0;
        $n = count($listado);
        $existe = false;

        echo "Ingrese nombre: ";
        $nombre = trim(fgets(STDIN));
        echo "Apellido: ";
        $apellido = trim(fgets(STDIN));
        echo "Número de DNI: ";
        $dni = trim(fgets(STDIN));

        while ($i < $n && $existe == false) {
            if ($listado[$i]->getDni() == $dni) {
                $existe = true;
            }
            $i++;
        }
        if ($existe == false) {
            echo "Número de teléfono: ";
            $telefono = trim(fgets(STDIN));
            $pasajero = new Pasajero($nombre, $apellido, $dni, $telefono);
            array_push($listado, $pasajero);
            $this->setDatosPasajeros($listado);
            echo "Pasajero agregado con éxito.";
        } else {
            echo "Ya existe un pasajero con este DNI.";
        }
    }

    /**
     * Elimina a un pasajero de la colección de pasajeros
     */
    public function borrarPasajero()
    {
        $pasajero = $this->buscarPasajero();
        $listado = $this->getDatosPasajeros();
        if ($pasajero >= 0) {
            unset($listado[$pasajero]);
            $listado = array_values($listado); //Acomodo los índices para que no quede ninguno vacío
            $this->setDatosPasajeros($listado);
            echo "Pasajero eliminado.";
        } else {
            echo "No se ha encontrado al pasajero.";
        }
    }

    /**
     * Busca a un pasajero del viaje, muestra su información
     */
    public function buscarPasajero()
    {
        $listado = $this->getDatosPasajeros();
        $i = 0;
        $n = count($listado);
        $existe = false;

        echo "Ingrese DNI del pasajero: ";
        $dni = trim(fgets(STDIN));
        while ($i < $n && $existe == false) {
            if ($listado[$i]->getDni() == $dni) {
                $existe = true;
                $index = $i;
            }
            $i++;
        }
        if ($existe == false) {
            $index = -1;
        }
        return $index;
    }
    /**
     * Muestra la información de un pasajero
     */
    public function mostrarPasajero($index)
    {
        if ($index >= 0) {
            $listado = $this->getDatosPasajeros();
            echo $listado[$index]->__toString();
        } else {
            echo "No se ha encontrado ningún pasajero.";
        }
    }

    /**
     * Muestra la información de todos los pasajeros por pantalla
     * @return string
     */
    public function mostrarPasajeros()
    {
        $listado = $this->getDatosPasajeros();
        $n = count($listado);
        $i = 0;
        if ($n == 0) {
            $cadena = "\nNingún pasajero registrado.\n";
        } else {
            $cadena = "\n>> DATOS PASAJEROS";
            for ($i; $i < $n; $i++) {
                $cadena .= $listado[$i]->__toString();
            }
        }
        return $cadena;
    }

    /**
     * Modifica los datos del responsable del viaje
     */
    public function modificarDatosResponsable()
    {
        $responsable = $this->getResponsable();
        echo "Tipo de dato a modificar (nombre, apellido, numEmpleado, numLicencia): ";
        $dato = trim(fgets(STDIN));
        switch ($dato) {
            case "nombre": {
                    echo "Nuevo nombre: ";
                    $responsable->setNombre(trim(fgets(STDIN)));
                    break;
                }
            case "apellido": {
                    echo "Nuevo apellido: ";
                    $responsable->setNombre(trim(fgets(STDIN)));
                    break;
                }
            case "numEmpleado": {
                    echo "Nuevo número de empleado: ";
                    $responsable->setNroEmpleado(trim(fgets(STDIN)));
                    break;
                }
            case "numLicencia": {
                    echo "Nuevo número de licencia: ";
                    $responsable->setNroLicencia(trim(fgets(STDIN)));
                    break;
                }
        }
        echo "Cambio realizado con éxito.";
    }

    /**
     * Modifica los datos del viaje
     */
    public function modificarDatosViaje()
    {
        echo "Tipo de dato que desea cambiar (codigo, destino, cantMaxima): ";
        $dato = trim(fgets(STDIN));
        switch ($dato) {
            case "codigo": {
                    echo "Nuevo código de viaje: ";
                    $this->setCodigoViaje(trim(trim(fgets(STDIN))));
                    break;
                }
            case "destino": {
                    echo "Nuevo destino: ";
                    $this->setDestino(trim(fgets(STDIN)));
                    break;
                }
            case "cantMaxima": {
                    echo "Nueva cantidad máxima: ";
                    $this->setMaxPasajeros(trim(fgets(STDIN)));
                    break;
                }
        }
    }

    public function __toString()
    {
        $n = count($this->getDatosPasajeros());
        return "\n>> DATOS VIAJE\nCódigo del viaje: " . $this->getCodigoViaje() . "\nDestino: " .
            $this->getDestino() . "\nCantidad máxima de pasajeros: " . $this->getMaxPasajeros() . "\nPasajeros a bordo: " . $n .
            "\n" . $this->mostrarPasajeros() .
            "\n>> RESPONSABLE DEL VIAJE\n" . $this->getResponsable() . "\n";
    }
}
