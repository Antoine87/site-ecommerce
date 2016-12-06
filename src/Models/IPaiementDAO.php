<?php

interface IPaiementDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(PaiementDTO $paiement);

    public function save (PaiementDTO $paiement);

}