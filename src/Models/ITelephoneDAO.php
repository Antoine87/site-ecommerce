<?php

interface ITelephoneDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(TelephoneDTO $telephone);

    public function save (TelephoneDTO $telephone);

}