<?php
namespace m2i\ecommerce\DAO;

class RolesAuteurDAO implements IRolesAuteurDAO {

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
        $sql = "SELECT * FROM roles_auteurs";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM roles_auteurs WHERE id_role=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM roles_auteurs ";

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

    public function save(RolesAuteurDTO $rolesAuteur){
        if($rolesAuteur->getId() == null){
            return $this->insert($rolesAuteur);
        } else {
            return $this->update($rolesAuteur);
        }
    }

    private function insert(RolesAuteurDTO $rolesAuteur){
        $sql = "INSERT INTO roles_auteurs (role) VALUES ( ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $rolesAuteur->getRole()
        ]);
    }

    private function update(RolesAuteurDTO $rolesAuteur){
        $sql = "UPDATE roles_auteurs SET role=?  WHERE id_role=? ";
        $data = array(
            $rolesAuteur->getRole(),
$rolesAuteur->getIdRole()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(RolesAuteurDTO $rolesAuteur){
        if($rolesAuteur->getId() != null){
            $sql = "DELETE FROM roles_auteurs WHERE id_role=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$rolesAuteur->getIdRole()]);
        }
    }

}