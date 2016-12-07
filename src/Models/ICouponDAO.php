<?php
namespace m2i\ecommerce\DAO;

interface ICouponDAO {

    public function findAll();

    public function findOneById(array $pk);

    public function find(array $search);

    public function delete(CouponDTO $coupon);

    public function save (CouponDTO $coupon);

}