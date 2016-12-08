<?php
namespace m2i\ecommerce\DAO;

interface IClientDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(ClientDTO $client);

    public function save (ClientDTO $client);

}