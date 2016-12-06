<?php
class CouponDAO implements ICouponDAO {

    /**
    * @var \PDO
    */
    private $pdo;


    /**
    * DAOClient constructor.
    * @param PDO $pdo
    */
    public function __construct(PDO $pdo)
    {
    $this->pdo = $pdo;
    }

    public function findAll(){
        $sql = "SELECT * FROM coupons";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM coupons WHERE id_coupon=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM coupons ";

        if(count($search)>0){
            $sql .= " WHERE ";
            $cols = array_map(
                function($item){
                    return "$item=:$item";
                }, array_keys($search)
            );

            $sql .= implode(" AND ", $cols);
        }

        $statement = $this->pdo->prepare($sql);
        $statement->execute($search);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save(CouponDTO $coupon){
        if($coupon->getId() == null){
            return $this->insert($coupon);
        } else {
            return $this->update($coupon);
        }
    }

    private function insert(CouponDTO $coupon){
        $sql = "INSERT INTO coupons (Date_debut, Date_fin, Remise, code_coupon) VALUES ( ?, ?, ?, ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $coupon->getDateDebut(), $coupon->getDateFin(), $coupon->getRemise(), $coupon->getCodeCoupon()
        ]);
    }

    private function update(CouponDTO $coupon){
        $sql = "UPDATE coupons SET Date_debut=? , Date_fin=? , Remise=? , code_coupon=?  WHERE id_coupon=? ";
        $data = array(
            $coupon->getDateDebut(),
$coupon->getDateFin(),
$coupon->getRemise(),
$coupon->getCodeCoupon(),
$coupon->getIdCoupon()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(CouponDTO $coupon){
        if($coupon->getId() != null){
            $sql = "DELETE FROM coupons WHERE id_coupon=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$coupon->getIdCoupon()]);
        }
    }

}