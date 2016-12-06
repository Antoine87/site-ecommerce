<?php
class TelephoneDAO implements ITelephoneDAO {

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
        $sql = "SELECT * FROM telephones";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM telephones WHERE id_telephones=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM telephones ";

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

    public function save(TelephoneDTO $telephone){
        if($telephone->getId() == null){
            return $this->insert($telephone);
        } else {
            return $this->update($telephone);
        }
    }

    private function insert(TelephoneDTO $telephone){
        $sql = "INSERT INTO telephones (numero_telephone, id_client) VALUES ( ?, ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $telephone->getNumeroTelephone(), $telephone->getIdClient()
        ]);
    }

    private function update(TelephoneDTO $telephone){
        $sql = "UPDATE telephones SET numero_telephone=? , id_client=?  WHERE id_telephones=? ";
        $data = array(
            $telephone->getNumeroTelephone(),
$telephone->getIdClient(),
$telephone->getIdTelephones()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(TelephoneDTO $telephone){
        if($telephone->getId() != null){
            $sql = "DELETE FROM telephones WHERE id_telephones=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$telephone->getIdTelephones()]);
        }
    }

}