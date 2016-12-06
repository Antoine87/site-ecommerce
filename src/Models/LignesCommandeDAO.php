<?php
class LignesCommandeDAO implements ILignesCommandeDAO {

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
        $sql = "SELECT * FROM lignes_commandes";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM lignes_commandes WHERE id_commande=?  AND id_livre=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM lignes_commandes ";

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

    public function save(LignesCommandeDTO $lignesCommande){
        if($lignesCommande->getId() == null){
            return $this->insert($lignesCommande);
        } else {
            return $this->update($lignesCommande);
        }
    }

    private function insert(LignesCommandeDTO $lignesCommande){
        $sql = "INSERT INTO lignes_commandes (id_commande, id_livre, qte) VALUES ( ?, ?, ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $lignesCommande->getIdCommande(), $lignesCommande->getIdLivre(), $lignesCommande->getQte()
        ]);
    }

    private function update(LignesCommandeDTO $lignesCommande){
        $sql = "UPDATE lignes_commandes SET id_commande=? , id_livre=? , qte=?  WHERE id_commande=?  AND id_livre=? ";
        $data = array(
            $lignesCommande->getIdCommande(),
$lignesCommande->getIdLivre(),
$lignesCommande->getQte(),
$lignesCommande->getIdCommande(),
$lignesCommande->getIdLivre()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(LignesCommandeDTO $lignesCommande){
        if($lignesCommande->getId() != null){
            $sql = "DELETE FROM lignes_commandes WHERE id_commande=?  AND id_livre=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$lignesCommande->getIdCommande(), 
$lignesCommande->getIdLivre()]);
        }
    }

}