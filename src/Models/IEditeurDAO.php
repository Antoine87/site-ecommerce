<?php

interface IEditeurDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(EditeurDTO $editeur);

    public function save (EditeurDTO $editeur);

}