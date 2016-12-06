<?php
class AuteursLivreDAO implements IAuteursLivreDAO {

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
        $sql = "SELECT * FROM auteurs_livres";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM auteurs_livres WHERE id_livre=?  AND id_auteur=?  AND id_role=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM auteurs_livres ";

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

    public function save(AuteursLivreDTO $auteursLivre){
        if($auteursLivre->getId() == null){
            return $this->insert($auteursLivre);
        } else {
            return $this->update($auteursLivre);
        }
    }

    private function insert(AuteursLivreDTO $auteursLivre){
        $sql = "INSERT INTO auteurs_livres (id_livre, id_auteur, id_role) VALUES ( ?, ?, ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $auteursLivre->getIdLivre(), $auteursLivre->getIdAuteur(), $auteursLivre->getIdRole()
        ]);
    }

    private function update(AuteursLivreDTO $auteursLivre){
        $sql = "UPDATE auteurs_livres SET id_livre=? , id_auteur=? , id_role=?  WHERE id_livre=?  AND id_auteur=?  AND id_role=? ";
        $data = array(
            $auteursLivre->getIdLivre(),
$auteursLivre->getIdAuteur(),
$auteursLivre->getIdRole(),
$auteursLivre->getIdLivre(),
$auteursLivre->getIdAuteur(),
$auteursLivre->getIdRole()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(AuteursLivreDTO $auteursLivre){
        if($auteursLivre->getId() != null){
            $sql = "DELETE FROM auteurs_livres WHERE id_livre=?  AND id_auteur=?  AND id_role=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$auteursLivre->getIdLivre(), 
$auteursLivre->getIdAuteur(), 
$auteursLivre->getIdRole()]);
        }
    }

}