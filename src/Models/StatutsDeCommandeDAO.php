<?php
class StatutsDeCommandeDAO implements IStatutsDeCommandeDAO {

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
        $sql = "SELECT * FROM statuts_de_commande";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM statuts_de_commande WHERE id_statut=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM statuts_de_commande ";

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

    public function save(StatutsDeCommandeDTO $statutsDeCommande){
        if($statutsDeCommande->getId() == null){
            return $this->insert($statutsDeCommande);
        } else {
            return $this->update($statutsDeCommande);
        }
    }

    private function insert(StatutsDeCommandeDTO $statutsDeCommande){
        $sql = "INSERT INTO statuts_de_commande (statut) VALUES ( ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $statutsDeCommande->getStatut()
        ]);
    }

    private function update(StatutsDeCommandeDTO $statutsDeCommande){
        $sql = "UPDATE statuts_de_commande SET statut=?  WHERE id_statut=? ";
        $data = array(
            $statutsDeCommande->getStatut(),
$statutsDeCommande->getIdStatut()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(StatutsDeCommandeDTO $statutsDeCommande){
        if($statutsDeCommande->getId() != null){
            $sql = "DELETE FROM statuts_de_commande WHERE id_statut=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$statutsDeCommande->getIdStatut()]);
        }
    }

}