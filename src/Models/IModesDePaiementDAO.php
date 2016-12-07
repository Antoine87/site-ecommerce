<?php
namespace m2i\ecommerce\DAO;

interface IModesDePaiementDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(ModesDePaiementDTO $modesDePaiement);

    public function save (ModesDePaiementDTO $modesDePaiement);

}