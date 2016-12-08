<?php
namespace m2i\ecommerce\DAO;

class FormatDAO implements IFormatDAO {

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
        $sql = "SELECT * FROM formats";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM formats WHERE id_format=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM formats ";

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

    public function save(FormatDTO $format){
        if($format->getId() == null){
            return $this->insert($format);
        } else {
            return $this->update($format);
        }
    }

    private function insert(FormatDTO $format){
        $sql = "INSERT INTO formats (format) VALUES ( ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $format->getFormat()
        ]);
    }

    private function update(FormatDTO $format){
        $sql = "UPDATE formats SET format=?  WHERE id_format=? ";
        $data = array(
            $format->getFormat(),
$format->getIdFormat()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(FormatDTO $format){
        if($format->getId() != null){
            $sql = "DELETE FROM formats WHERE id_format=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$format->getIdFormat()]);
        }
    }

}