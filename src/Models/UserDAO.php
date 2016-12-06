<?php
class UserDAO implements IUserDAO {

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
        $sql = "SELECT * FROM users";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM users WHERE id=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM users ";

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

    public function save(UserDTO $user){
        if($user->getId() == null){
            return $this->insert($user);
        } else {
            return $this->update($user);
        }
    }

    private function insert(UserDTO $user){
        $sql = "INSERT INTO users (username, role, password) VALUES ( ?, ?, ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $user->getUsername(), $user->getRole(), $user->getPassword()
        ]);
    }

    private function update(UserDTO $user){
        $sql = "UPDATE users SET username=? , role=? , password=?  WHERE id=? ";
        $data = array(
            $user->getUsername(),
$user->getRole(),
$user->getPassword(),
$user->getId()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(UserDTO $user){
        if($user->getId() != null){
            $sql = "DELETE FROM users WHERE id=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$user->getId()]);
        }
    }

}