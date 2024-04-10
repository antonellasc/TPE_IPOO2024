<?php

class Viaje{
    private $codigoViaje;
    private $destino;
    private $cantidadMax;
    private $pasajeros;

    // Constructor
    public function __construct($codigo_viaje, $destinoViaje, $cantMaximaPasajeros, $coleccionPasajeros){
        $this->codigoViaje = $codigo_viaje;
        $this->destino = $destinoViaje;
        $this->cantidadMax = $cantMaximaPasajeros;
        $this->pasajeros = $coleccionPasajeros;
        
    }

    // Método de acceso : get
    public function getCodigoViaje(){
        return $this->codigoViaje;
    }

    public function getDestino(){
        return $this->destino;
    }

    public function getCantMaxPasajeros(){
        return $this->cantidadMax;
    }

    public function getPasajeros(){
        return $this->pasajeros;
    }

    // Método de acceso : set
    public function setCodigoViaje($codigo_viaje){
        $this->codigoViaje = $codigo_viaje;
    }

    public function setDestino($destinoViaje){
        $this->destino = $destinoViaje;
    }

    public function setCantMaxPasajeros($cantMaximaPasajeros){
        $this->cantidadMax = $cantMaximaPasajeros;
    }

    public function setPasajeros($pasajerosViaje){
        $this->pasajeros = $pasajerosViaje;
    }

    public function modificarNombrePasajero($nuevoNom){
        $this->setPasajeros($nuevoNom)["nombre"];
    }

    public function modificarApellidoPasajero($nuevoAp){
        $this->setPasajeros($nuevoAp)["apellido"];
    }

    public function modificarDocumento($nuevoDoc){
        $this->setPasajeros($nuevoDoc)["documento"];
    }

    //
    public function __toString(){
        // $coleccionPasajeros = ["nombre" => $this->getPasajeros()["nombre"], "apellido" => $this->getPasajeros()["apellido"], "documento" => $this->getPasajeros()["documento"]];
        return "Código del viaje: " . $this->getCodigoViaje() . "\n" . "Destino del viaje: " . $this->getDestino() . "\n" . "Cantidad máxima de pasajeros: " . $this->getCantMaxPasajeros() . 
        "\n" . "Pasajeros/as: \n" ;
        foreach($this->getPasajeros() as $pasajero){
            echo $pasajero["nombre"] . "\n";
            echo $pasajero["apellido"] . "\n";
            echo $pasajero["documento"] . "\n";
        };
        // "Nombre: " . $coleccionPasajeros["nombre"] . "\n" . "Apellido: " . $coleccionPasajeros["apellido"] . "\n" . "Número de documento: " . $coleccionPasajeros["documento"];
        
    }


}