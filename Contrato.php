<?php
/*
 
Adquirir un plan implica un contrato. Los contratos tienen la fecha de inicio, la fecha de vencimiento, el plan, un estado (al día, moroso, suspendido), un costo, si se renueva o no y una referencia al cliente que adquirió el contrato.
*/
class Contrato{
    
    //ATRIBUTOS
    private $fechaInicio;   
    private $fechaVencimiento;
    private $objPlan;
    private $estado;  //al día, moroso, suspendido
    private $costo;
    private $seRennueva;
    private $objCliente;

 //CONSTRUCTOR
    public function __construct($fechaInicio, $fechaVencimiento, $objPlan,$costo,$seRennueva,$objCliente){
    
       $this->fechaInicio = $fechaInicio;
       $this->fechaVencimiento = $fechaVencimiento;
       $this->objPlan = $objPlan;
       $this->estado = 'AL DIA';
       $this->costo = $costo;
       $this->seRennueva = $seRennueva;
       $this->objCliente = $objCliente;
           

    }


         public function getFechaInicio(){
        return $this->fechaInicio;
    }

    public function setFechaInicio($fechaInicio){
         $this->fechaInicio= $fechaInicio;
    }

        public function getFechaVencimiento(){
        return $this->fechaVencimiento;
    }

    public function setFechaVencimiento($fechaVencimiento){
         $this->fechaVencimiento= $fechaVencimiento;
    }


            public function getObjPlan(){
        return $this->objPlan;
    }

    public function setObjPlan($objPlan){
         $this->objPlan= $objPlan;
    }

   public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
         $this->estado= $estado;
    }

 public function getCosto(){
        return $this->costo;
    }

    public function setCosto($costo){
         $this->costo= $costo;
    }

public function getSeRennueva(){
        return $this->seRennueva;
    }

    public function setSeRennueva($seRennueva){
         $this->seRennueva= $seRennueva;
    }


public function getObjCliente(){
        return $this->objCliente;
    }

    public function setObjCliente($objCliente){
         $this->objCliente= $objCliente;
    }

public function __toString(){
        //string $cadena
        $cadena = "Fecha inicio: ".$this->getFechaInicio()."\n";
        $cadena = "Fecha Vencimiento: ".$this->getFechaVencimiento()."\n";
        $cadena = $cadena. "Plan: ".$this->getObjPlan()."\n";
        $cadena = $cadena. "Estado: ".$this->getEstado()."\n";
        $cadena = $cadena. "Costo: ".$this->getCosto()."\n";
        $cadena = $cadena. "Se renueva: ".$this->getSeRennueva()."\n";
        $cadena = $cadena. "Cliente: ".$this->getObjCliente()."\n";

 
        return $cadena;
         }


     
         public function diasContratoVencido() {

          $diasVencidos = 0;
          $fechaActual = new DateTime();
          if ($fechaActual->diff($this->getFechaVencimiento()) > 0) {
               $diasVencidos = $fechaActual->diff($this->getFechaVencimiento());
          }
          return $diasVencidos;
      }

      public function actualizarEstadoContrato (){

          if ($this->diasContratoVencido() > 10) {
               $this->setEstado('suspendido');
          } elseif ($this->diasContratoVencido() > 0) {
               $this->setEstado('moroso');
          } else {
               $this->setEstado('al dia');

          }
      }

      public function calcularImporte (){
          return $this->getCosto();
      }
     }    