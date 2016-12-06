<?php
class PanierDAO implements IPanierDAO {

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
        $sql = "SELECT * FROM paniers";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM paniers WHERE id_livre=?  AND id_client=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM paniers ";

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

    public function save(PanierDTO $panier){
        if($panier->getId() == null){
            return $this->insert($panier);
        } else {
            return $this->update($panier);
        }
    }

    private function insert(PanierDTO $panier){
        $sql = "INSERT INTO paniers (quantite, id_livre, id_client) VALUES ( ?, ?, ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $panier->getQuantite(), $panier->getIdLivre(), $panier->getIdClient()
        ]);
    }

    private function update(PanierDTO $panier){
        $sql = "UPDATE paniers SET quantite=? , id_livre=? , id_client=?  WHERE id_livre=?  AND id_client=? ";
        $data = array(
            $panier->getQuantite(),
$panier->getIdLivre(),
$panier->getIdClient(),
$panier->getIdLivre(),
$panier->getIdClient()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(PanierDTO $panier){
        if($panier->getId() != null){
            $sql = "DELETE FROM paniers WHERE id_livre=?  AND id_client=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$panier->getIdLivre(), 
$panier->getIdClient()]);
        }
    }

}