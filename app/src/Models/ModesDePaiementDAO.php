<?php
namespace m2i\ecommerce\DAO;

class ModesDePaiementDAO implements IModesDePaiementDAO {

    /**
    * @var \PDO
    */
    private $pdo;


    /**
    * DAOClient constructor.
    * @param \PDO $pdo
    */
    public function __construct(\PDO $pdo)
    {
    $this->pdo = $pdo;
    }

    public function findAll(){
        $sql = "SELECT * FROM modes_de_paiement";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM modes_de_paiement WHERE id_mode_de_paiement=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM modes_de_paiement ";

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

    public function save(ModesDePaiementDTO $modesDePaiement){
        if($modesDePaiement->getId() == null){
            return $this->insert($modesDePaiement);
        } else {
            return $this->update($modesDePaiement);
        }
    }

    private function insert(ModesDePaiementDTO $modesDePaiement){
        $sql = "INSERT INTO modes_de_paiement (mode_de_paiement) VALUES ( ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $modesDePaiement->getModeDePaiement()
        ]);
    }

    private function update(ModesDePaiementDTO $modesDePaiement){
        $sql = "UPDATE modes_de_paiement SET mode_de_paiement=?  WHERE id_mode_de_paiement=? ";
        $data = array(
            $modesDePaiement->getModeDePaiement(),
$modesDePaiement->getIdModeDePaiement()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(ModesDePaiementDTO $modesDePaiement){
        if($modesDePaiement->getId() != null){
            $sql = "DELETE FROM modes_de_paiement WHERE id_mode_de_paiement=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$modesDePaiement->getIdModeDePaiement()]);
        }
    }

}