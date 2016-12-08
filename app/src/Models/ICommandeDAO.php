<?php
namespace m2i\ecommerce\DAO;

interface ICommandeDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(CommandeDTO $commande);

    public function save (CommandeDTO $commande);

}