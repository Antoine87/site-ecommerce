<?php
namespace m2i\ecommerce\DAO;

interface IAuteurDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(AuteurDTO $auteur);

    public function save (AuteurDTO $auteur);

}