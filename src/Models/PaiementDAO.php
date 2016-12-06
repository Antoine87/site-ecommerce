<?php
class PaiementDAO implements IPaiementDAO {

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
        $sql = "SELECT * FROM paiements";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM paiements WHERE id_commande=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM paiements ";

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

    public function save(PaiementDTO $paiement){
        if($paiement->getId() == null){
            return $this->insert($paiement);
        } else {
            return $this->update($paiement);
        }
    }

    private function insert(PaiementDTO $paiement){
        $sql = "INSERT INTO paiements (id_commande, montant, date_de_paiement, id_mode_de_paiement) VALUES ( ?, ?, ?, ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $paiement->getIdCommande(), $paiement->getMontant(), $paiement->getDateDePaiement(), $paiement->getIdModeDePaiement()
        ]);
    }

    private function update(PaiementDTO $paiement){
        $sql = "UPDATE paiements SET id_commande=? , montant=? , date_de_paiement=? , id_mode_de_paiement=?  WHERE id_commande=? ";
        $data = array(
            $paiement->getIdCommande(),
$paiement->getMontant(),
$paiement->getDateDePaiement(),
$paiement->getIdModeDePaiement(),
$paiement->getIdCommande()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(PaiementDTO $paiement){
        if($paiement->getId() != null){
            $sql = "DELETE FROM paiements WHERE id_commande=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$paiement->getIdCommande()]);
        }
    }

}