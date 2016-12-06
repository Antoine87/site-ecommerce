<?php
class ModesLivraisonDAO implements IModesLivraisonDAO {

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
        $sql = "SELECT * FROM modes_livraison";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM modes_livraison WHERE id_mode_livraison=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM modes_livraison ";

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

    public function save(ModesLivraisonDTO $modesLivraison){
        if($modesLivraison->getId() == null){
            return $this->insert($modesLivraison);
        } else {
            return $this->update($modesLivraison);
        }
    }

    private function insert(ModesLivraisonDTO $modesLivraison){
        $sql = "INSERT INTO modes_livraison (description_mode_livraison, tarif_livraison, delais_livraison) VALUES ( ?, ?, ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $modesLivraison->getDescriptionModeLivraison(), $modesLivraison->getTarifLivraison(), $modesLivraison->getDelaisLivraison()
        ]);
    }

    private function update(ModesLivraisonDTO $modesLivraison){
        $sql = "UPDATE modes_livraison SET description_mode_livraison=? , tarif_livraison=? , delais_livraison=?  WHERE id_mode_livraison=? ";
        $data = array(
            $modesLivraison->getDescriptionModeLivraison(),
$modesLivraison->getTarifLivraison(),
$modesLivraison->getDelaisLivraison(),
$modesLivraison->getIdModeLivraison()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(ModesLivraisonDTO $modesLivraison){
        if($modesLivraison->getId() != null){
            $sql = "DELETE FROM modes_livraison WHERE id_mode_livraison=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$modesLivraison->getIdModeLivraison()]);
        }
    }

}