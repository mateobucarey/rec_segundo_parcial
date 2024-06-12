<?php

class EmpresaCable{
    private $colPlanes;
    private $colCanales;
    private $colContratos;
    private $colClientes;

    public function __construct($colPlanes, $colCanales, $colContratos, $colClientes){
        $this->colPlanes = $colPlanes;
        $this->colCanales = $colCanales;
        $this->colContratos = $colContratos;
        $this->colClientes = $colClientes;
    }

    public function getColPlanes()
    {
        return $this->colPlanes;
    }

    public function setColPlanes($colPlanes)
    {
        $this->colPlanes = $colPlanes;
    }

    public function getColCanales()
    {
        return $this->colCanales;
    }

    public function setColCanales($colCanales)
    {
        $this->colCanales = $colCanales;
    }

    public function getColContratos()
    {
        return $this->colContratos;
    }

    public function setColContratos($colContratos)
    {
        $this->colContratos = $colContratos;
    }

    public function getColClientes()
    {
        return $this->colClientes;
    }

    public function setColClientes($colClientes)
    {
        $this->colClientes = $colClientes;
    }

    public function __toString()
    {
        
    }

    public function incorporarPlan($objPlan){

        $planes = $this->getColPlanes();
        $incorporar = false;
        for ($i=0; $i < count($planes); $i++) { 
            if (count($objPlan) != count($planes[$i])) {
                if (array_diff($objPlan, $planes[$i]) != null) {
                    $incorporar = true;
                } else {
                    $incorporar = false;
                }
            }
        }
        if ($incorporar) {
            array_push($planes, $objPlan);
            $this->setColPlanes($planes);
        }
    }

    public function  incorporarContrato ($objPlan,$objCliente,$fechaDesde,$fechaVenc,$esViaWeb){

        if ($esViaWeb) {
            $contratoWeb = new ContratoWeb($fechaDesde, $fechaVenc, $objPlan,true, 0, true, $objCliente);
        $colContrato = $this->getColContratos();
        array_push($colContrato, $contratoWeb);
        $this->setColContratos($colContrato);
        } else {
            $contratoEmpresa = new ContratoEmpresa($fechaDesde, $fechaVenc, $objPlan, true, 0, true, $objCliente);
        $colContrato = $this->getColContratos();
        array_push($colContrato, $contratoEmpresa);
        $this->setColContratos($colContrato);
        }
    }

    public function  retornarImporteContratos ($codigoPlan){
        $contratos = $this->getColContratos();
        $sumaContratos = 0;
        for ($i=0; $i < count($contratos); $i++) { 
            if ($contratos[$i]->getObjPlan()->getCodigo == $codigoPlan) {
                $sumaContratos = $sumaContratos + $contratos[$i]->calcularImporte();
            }
        }
        return $sumaContratos;
    }

    public function pagarContrato ($objContrato){
        $objContrato->actualizarEstadoContrato();
        return $objContrato->calcularImporte();
    }
    
}

?>