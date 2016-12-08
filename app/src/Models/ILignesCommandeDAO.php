<?php
namespace m2i\ecommerce\DAO;

interface ILignesCommandeDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(LignesCommandeDTO $lignesCommande);

    public function save (LignesCommandeDTO $lignesCommande);

}