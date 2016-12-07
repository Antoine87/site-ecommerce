<?php
namespace m2i\ecommerce\DAO;

interface IRolesAuteurDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(RolesAuteurDTO $rolesAuteur);

    public function save (RolesAuteurDTO $rolesAuteur);

}