<?php

interface IStatutsDeCommandeDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(StatutsDeCommandeDTO $statutsDeCommande);

    public function save (StatutsDeCommandeDTO $statutsDeCommande);

}