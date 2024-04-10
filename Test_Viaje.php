<?php
include_once "Viaje.php";

// $coleccionPasajeros = ["nombre" => "momo", "apellido" => "satori", "documento" => 123565];
$objViaje = new Viaje(112233, "Chile", 9, ["nombre" => "momo", "apellido" => "satori", "documento" => 123565]);

echo $objViaje . "\n \n \n";

//// Funciones adicionales
function verificaExistencia($coleccionPasajeros, $nom_pasajero, $apellido_pasajero, $doc){
    $existe = false;
    $contador = count($coleccionPasajeros);
    if($contador > 0){
        foreach($coleccionPasajeros as $pasajero){
        if($nom_pasajero == $coleccionPasajeros["nombre"] && $apellido_pasajero == $coleccionPasajeros["apellido"] && $doc == $coleccionPasajeros["documento"]){
            $existe = true;
        } else{
            $existe = false;
        }
    }
    }
    
    return $existe;
}

function quedaEspacio($objViaje, $coleccionPasajeros){
    $cantActual = count($coleccionPasajeros);
    $cantMaxima = $objViaje->getCantMaxPasajeros();
    $hayLugar = false;
    if($cantActual < $cantMaxima){
        $hayLugar = true;
    } else{
        $hayLugar = false;
    }
    return $hayLugar;
}

// 


do{
    echo "Menú de opciones : \n";
    echo "Opción 1: Cargar información del viaje. \n";
    echo "Opción 2: Modificar el código del viaje. \n";
    echo "Opción 3: Modificar el destino del viaje. \n";
    echo "Opción 4: Modificar la cantidad máxima de pasajeros/as. \n";
    echo "Opción 5: Modificar los datos de un pasajero. \n";
    echo "Opción 6: Ver la información del viaje. \n";
    echo "Opción 7: Salir. \n";
    echo "Ingrese el número de la opción que desea realizar: \n";
    $opcion = trim(fgets(STDIN));

    switch($opcion){
        case "1":
            echo "Ingrese los datos del nuevo viaje: \n";
            echo "Código de viaje: \n";
            $codigo = trim(fgets(STDIN));
            $objViaje->setCodigoViaje($codigo);
            echo "Destino del viaje: \n";
            $destinoViaje = trim(fgets(STDIN));
            $objViaje->setDestino($destinoViaje);
            echo "Cant. máxima de pasajeros: \n";
            $cantidadMaxima = trim(fgets(STDIN));
            $objViaje->setCantMaxPasajeros($cantidadMaxima);
            echo "A continuación, ingrese los datos de los pasajeros: \n";
            $coleccionPasajeros = $objViaje->getPasajeros();
            $rta = "";
            while($rta != "no"){
                // $i = 0;
                echo "Ingrese el nombre del pasajero: \n";
                $nom_pasajero = trim(fgets(STDIN));
                echo "Ingrese el apellido del pasajero: \n";
                $apellido_pasajero = trim(fgets(STDIN));
                echo "Ingrese el número de documento del pasajero: \n";
                $doc = trim(fgets(STDIN));
                $verifica = verificaExistencia($coleccionPasajeros, $nom_pasajero, $apellido_pasajero, $doc);
                $quedaLugar = quedaEspacio($objViaje, $coleccionPasajeros);
                if($verifica == false && $quedaLugar == true){
                    $pasajero = ["nombre" => $nom_pasajero, "apellido" => $apellido_pasajero, "documento" => $doc];
                    array_push($coleccionPasajeros, $pasajero);
                    echo "Los datos del pasajero han sido cargados correctamente! \n";
                } else{
                    echo "Este pasajero ya está cargado en la base de datos. \n";
                }
                echo "¿Desea ingresar otro pasajero? si/no \n";
                $rta = strtolower(trim(fgets(STDIN)));
            }

            break;
        case "2":
            echo "Ingrese el código del viaje: \n";
            $codigo = trim(fgets(STDIN));
            $objViaje->setCodigoViaje($codigo);
            echo "El dato ha sido modificado correctamente! \n";
            echo "Código del viaje: " . $objViaje->getCodigoViaje() . "\n";
            break;

        case "3":
            echo "Ingrese el destino del viaje: \n";
            $destinoViaj = trim(fgets(STDIN));
            $objViaje->setDestino($destinoViaj);
            echo "El dato ha sido modificado correctamente! \n";
            echo "Destino del viaje: " . $objViaje->getDestino() . "\n";
            break;

        case "4":
            echo "Ingrese la cantidad máxima de pasajeros/as: \n";
            $cantidad = trim(fgets(STDIN));
            $objViaje->setCantMaxPasajeros($cantidad);
            echo "El dato ha sido modificado correctamente! \n";
            echo "Cant. máxima de pasajeros: " . $objViaje->getCantMaxPasajeros() . "\n";
            break;

        case "5":
            echo "Ingrese los datos del pasajero que desea modificar: \n";
            echo "Nombre: \n";
            $nom_pasajero = trim(fgets((STDIN)));
            echo "Apellido: \n";
            $apellido_pasajero = trim(fgets(STDIN));
            echo "Número de documento: \n";
            $doc = trim(fgets(STDIN));
            $verifica = verificaExistencia($coleccionPasajeros, $nom_pasajero, $apellido_pasajero, $doc);
            if($verifica == true){
                echo "Ingrese los nuevos datos del pasajero: \n";
                echo "Nombre: \n";
                $nuevoNom_pasajero = trim(fgets(STDIN));
                echo "Apellido: \n";
                $nuevoAp_pasajero = trim(fgets(STDIN));
                echo "Número de documento: \n";
                $nuevoDoc_pasajero = trim(fgets(STDIN));
                $objViaje->modificarNombrePasajero($nuevoNom_pasajero);
                $objViaje->modificarApellidoPasajero($nuevoAp_pasajero);
                $objViaje->modificarDocumento($nuevoDoc_pasajero);
                echo "Los datos han sido modificados con éxito! \n";
            } else{
                echo "Lo siento, los datos ingresados no coinciden con ningún registro. Intente nuevamente \n";
            }
            break;

        case "6":
            echo "\n" . $objViaje;


    }

}while ($opcion != 7);