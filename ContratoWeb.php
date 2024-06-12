<?php

class ContratoWeb extends Contrato {
    private $descuento;

    public function __construct($fechaInicio, $fechaVencimiento, $objPlan, $estado, $costo, $seRennueva, $objCliente) {
        parent::__construct($fechaInicio, $fechaVencimiento, $objPlan, $estado, $costo, $seRennueva, $objCliente);
        $this->descuento = 10;
    }

    public function getDescuento() {
        return $this->descuento;
    }

    public function setDescuento($descuento) {
        $this->descuento = $descuento;
    }


    public function __toString() {
        return parent::__toString() . ", Descuento: $this->descuento%";
    }


    public function calcularImporte (){
        $importeInicial = parent::calcularImporte();
        $plan = $this->getObjPlan();
        $sumaImporteCanales = 0;
        for ($i=0; $i < count($plan->getColCanales()); $i++) { 
            $sumaImporteCanales = $sumaImporteCanales + $plan->getColCanales()[$i]->getImporte();
        }
        $importeFinal = $importeInicial + $plan->getImporte() + $sumaImporteCanales;
        $descuento = ($importeFinal * $this->getDescuento()) / 100;
        $importeFinal = $importeFinal - $descuento;
        return $importeFinal;
    }
}