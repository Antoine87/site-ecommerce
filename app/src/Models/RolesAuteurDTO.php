<?php
namespace m2i\ecommerce\DTO;

class RolesAuteurDTO {

    private $idRole;
private $role;

    public function setIdRole($idRole){
            $this->idRole = $idRole;
        }
public function getIdRole(){
            return $this->idRole;
        }
public function setRole($role){
            $this->role = $role;
        }
public function getRole(){
            return $this->role;
        }

}