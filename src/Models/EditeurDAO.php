<?php
namespace m2i\ecommerce\DAO;

class EditeurDAO implements IEditeurDAO {

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
        $sql = "SELECT * FROM editeurs";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM editeurs WHERE id_editeur=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM editeurs ";

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

    public function save(EditeurDTO $editeur){
        if($editeur->getId() == null){
            return $this->insert($editeur);
        } else {
            return $this->update($editeur);
        }
    }

    private function insert(EditeurDTO $editeur){
        $sql = "INSERT INTO editeurs (nom_editeur) VALUES ( ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $editeur->getNomEditeur()
        ]);
    }

    private function update(EditeurDTO $editeur){
        $sql = "UPDATE editeurs SET nom_editeur=?  WHERE id_editeur=? ";
        $data = array(
            $editeur->getNomEditeur(),
$editeur->getIdEditeur()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(EditeurDTO $editeur){
        if($editeur->getId() != null){
            $sql = "DELETE FROM editeurs WHERE id_editeur=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$editeur->getIdEditeur()]);
        }
    }

}