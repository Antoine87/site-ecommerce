<?php
class AuteurDAO implements IAuteurDAO {

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
        $sql = "SELECT * FROM auteurs";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM auteurs WHERE id_auteur=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM auteurs ";

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

    public function save(AuteurDTO $auteur){
        if($auteur->getId() == null){
            return $this->insert($auteur);
        } else {
            return $this->update($auteur);
        }
    }

    private function insert(AuteurDTO $auteur){
        $sql = "INSERT INTO auteurs (nom_auteur, prenom_auteur, biographie) VALUES ( ?, ?, ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $auteur->getNomAuteur(), $auteur->getPrenomAuteur(), $auteur->getBiographie()
        ]);
    }

    private function update(AuteurDTO $auteur){
        $sql = "UPDATE auteurs SET nom_auteur=? , prenom_auteur=? , biographie=?  WHERE id_auteur=? ";
        $data = array(
            $auteur->getNomAuteur(),
$auteur->getPrenomAuteur(),
$auteur->getBiographie(),
$auteur->getIdAuteur()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(AuteurDTO $auteur){
        if($auteur->getId() != null){
            $sql = "DELETE FROM auteurs WHERE id_auteur=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$auteur->getIdAuteur()]);
        }
    }

}