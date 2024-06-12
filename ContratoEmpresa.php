<?php

class ContratoEmpresa extends Contrato {

    public function __construct($fechaInicio, $fechaVencimiento, $objPlan, $estado, $costo, $seRennueva, $objCliente) {
        parent::__construct($fechaInicio, $fechaVencimiento, $objPlan, $estado, $costo, $seRennueva, $objCliente);
    }

    public function __toString()
    {
        
    }
    
    public function calcularImporte (){
        $importeInicial = parent::calcularImporte();
        $plan = $this->getObjPlan();
        $sumaImporteCanales = 0;
        for ($i=0; $i < count($plan->getColCanales()); $i++) { 
            $sumaImporteCanales = $sumaImporteCanales + $plan->getColCanales()[$i]->getImporte();
        }
        $importeFinal = $importeInicial + $plan->getImporte() + $sumaImporteCanales;
        return $importeFinal;
    }

}