<?php

include 'Viaje.php';

/**
 * Imprime menú de opciones, retorna opción elegida
 * @return int
 */
function menuOpciones()
{
    echo "\n---------------------------\n";
    echo "1) Mostrar datos completos del viaje\n2) Mostrar un pasajero\n3) Eliminar un pasajero";
    echo "\n4) Agregar pasajero\n5) Modificar datos de un pasajero\n6) Modificar datos del responsable";
    echo "\n7) Modificar datos del viaje\n8) Salir";
    echo "\n---------------------------\n";
    echo "Seleccione una opción: ";
    $rta = trim(fgets(STDIN));
    return $rta;
}
//PRECARGA DE DATOS
$responsable = new ResponsableV(07, 1346, "Pepe", "Manzano");
$pasajeros = [];
$pasajeros[0] = new Pasajero("Juan", "Pérez", 43545, 155235535);
$pasajeros[1] = new Pasajero("Marta", "Serralima", 73455, 155346634);
$datosViaje = new Viaje("SdLg-777", "Senillosa", 4, $pasajeros, $responsable);

//PROGRAMA PRINCIPAL
echo "\nPrograma iniciado\n";
$opcion = menuOpciones();
while ($opcion != 8) {
    switch ($opcion) {
        case 1: {
                echo $datosViaje;
                break;
            }
        case 2: {
                $id = $datosViaje->buscarPasajero();
                $datosViaje->mostrarPasajero($id);
                break;
            }
        case 3: {
                $datosViaje->borrarPasajero();
                break;
            }
        case 4: {
                $datosViaje->agregarPasajero();
                break;
            }
        case 5: {
                $datosViaje->modificarDatosPasajero();
                break;
            }
        case 6: {
                $datosViaje->modificarDatosResponsable();
                break;
            }
        case 7: {
                $datosViaje->modificarDatosViaje();
                break;
            }
    }
    $opcion = menuOpciones();
}
echo "Ha salido del menú de opciones.";
