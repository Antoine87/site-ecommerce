<?php

interface IModesLivraisonDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(ModesLivraisonDTO $modesLivraison);

    public function save (ModesLivraisonDTO $modesLivraison);

}