<?php
namespace m2i\ecommerce\DAO;

interface IAdresseDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(AdresseDTO $adresse);

    public function save (AdresseDTO $adresse);

}