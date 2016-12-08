<?php
namespace m2i\ecommerce\DAO;

class CollectionDAO implements ICollectionDAO {

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
        $sql = "SELECT * FROM collections";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM collections WHERE id_collection=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM collections ";

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

    public function save(CollectionDTO $collection){
        if($collection->getId() == null){
            return $this->insert($collection);
        } else {
            return $this->update($collection);
        }
    }

    private function insert(CollectionDTO $collection){
        $sql = "INSERT INTO collections (collection, id_editeur) VALUES ( ?, ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $collection->getCollection(), $collection->getIdEditeur()
        ]);
    }

    private function update(CollectionDTO $collection){
        $sql = "UPDATE collections SET collection=? , id_editeur=?  WHERE id_collection=? ";
        $data = array(
            $collection->getCollection(),
$collection->getIdEditeur(),
$collection->getIdCollection()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(CollectionDTO $collection){
        if($collection->getId() != null){
            $sql = "DELETE FROM collections WHERE id_collection=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$collection->getIdCollection()]);
        }
    }

}