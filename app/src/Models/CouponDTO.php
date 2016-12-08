<?php
namespace m2i\ecommerce\DTO;

class CouponDTO {

    private $idCoupon;
private $DateDebut;
private $DateFin;
private $Remise;
private $codeCoupon;

    public function setIdCoupon($idCoupon){
            $this->idCoupon = $idCoupon;
        }
public function getIdCoupon(){
            return $this->idCoupon;
        }
public function setDateDebut($DateDebut){
            $this->DateDebut = $DateDebut;
        }
public function getDateDebut(){
            return $this->DateDebut;
        }
public function setDateFin($DateFin){
            $this->DateFin = $DateFin;
        }
public function getDateFin(){
            return $this->DateFin;
        }
public function setRemise($Remise){
            $this->Remise = $Remise;
        }
public function getRemise(){
            return $this->Remise;
        }
public function setCodeCoupon($codeCoupon){
            $this->codeCoupon = $codeCoupon;
        }
public function getCodeCoupon(){
            return $this->codeCoupon;
        }

}