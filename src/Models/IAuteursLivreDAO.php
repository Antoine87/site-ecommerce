<?php

interface IAuteursLivreDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(AuteursLivreDTO $auteursLivre);

    public function save (AuteursLivreDTO $auteursLivre);

}