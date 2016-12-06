<?php
class UserDTO {

    private $id;
private $username;
private $role;
private $password;

    public function setId($id){
            $this->id = $id;
        }
public function getId(){
            return $this->id;
        }
public function setUsername($username){
            $this->username = $username;
        }
public function getUsername(){
            return $this->username;
        }
public function setRole($role){
            $this->role = $role;
        }
public function getRole(){
            return $this->role;
        }
public function setPassword($password){
            $this->password = $password;
        }
public function getPassword(){
            return $this->password;
        }

}