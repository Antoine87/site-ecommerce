<?php
class AdresseDAO implements IAdresseDAO {

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
        $sql = "SELECT * FROM adresses";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM adresses WHERE id_adresse=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM adresses ";

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

    public function save(AdresseDTO $adresse){
        if($adresse->getId() == null){
            return $this->insert($adresse);
        } else {
            return $this->update($adresse);
        }
    }

    private function insert(AdresseDTO $adresse){
        $sql = "INSERT INTO adresses (adresse, code_postal, ville, est_adresse_facturation, id_client) VALUES ( ?, ?, ?, ?, ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $adresse->getAdresse(), $adresse->getCodePostal(), $adresse->getVille(), $adresse->getEstAdresseFacturation(), $adresse->getIdClient()
        ]);
    }

    private function update(AdresseDTO $adresse){
        $sql = "UPDATE adresses SET adresse=? , code_postal=? , ville=? , est_adresse_facturation=? , id_client=?  WHERE id_adresse=? ";
        $data = array(
            $adresse->getAdresse(),
$adresse->getCodePostal(),
$adresse->getVille(),
$adresse->getEstAdresseFacturation(),
$adresse->getIdClient(),
$adresse->getIdAdresse()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(AdresseDTO $adresse){
        if($adresse->getId() != null){
            $sql = "DELETE FROM adresses WHERE id_adresse=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$adresse->getIdAdresse()]);
        }
    }

}