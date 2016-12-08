<?php
namespace m2i\ecommerce\DAO;

interface IFormatDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(FormatDTO $format);

    public function save (FormatDTO $format);

}