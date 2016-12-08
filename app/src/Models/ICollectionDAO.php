<?php
namespace m2i\ecommerce\DAO;

interface ICollectionDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(CollectionDTO $collection);

    public function save (CollectionDTO $collection);

}