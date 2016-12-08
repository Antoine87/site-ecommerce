<?php
namespace m2i\ecommerce\DAO;

interface ILangueDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(LangueDTO $langue);

    public function save (LangueDTO $langue);

}