<?php
namespace m2i\ecommerce\DAO;

interface IStatutsDeCommandeDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(StatutsDeCommandeDTO $statutsDeCommande);

    public function save (StatutsDeCommandeDTO $statutsDeCommande);

}