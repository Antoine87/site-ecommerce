<?php
namespace m2i\ecommerce\DAO;

class ClientDAO implements IClientDAO
{

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

    public function findAll()
    {
        $sql = "SELECT * FROM clients";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk)
    {
        $sql = "SELECT * FROM clients WHERE id_client=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search)
    {
        $sql = "SELECT * FROM clients ";

        if (count($search) > 0) {
            $sql .= " WHERE ";
            $cols = array_map(
                function ($item) {
                    return "$item=:$item";
                }, array_keys($search)
            );

            $sql .= implode(" AND ", $cols);
        }

        $statement = $this->pdo->prepare($sql);
        $statement->execute($search);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save(ClientDTO $client)
    {
        if ($client->getId() == null) {
            return $this->insert($client);
        } else {
            return $this->update($client);
        }
    }

    private function insert(ClientDTO $client)
    {
        $sql = "INSERT INTO clients (nom, prenom, email, mot_de_passe, date_naissance) VALUES ( ?, ?, ?, ?, ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $client->getNom(),
            $client->getPrenom(),
            $client->getEmail(),
            $client->getMotDePasse(),
            $client->getDateNaissance()
        ]);
    }

    private function update(ClientDTO $client)
    {
        $sql = "UPDATE clients SET nom=? , prenom=? , email=? , date_naissance=?  WHERE id_client=? ";
        $data = array(
            $client->getNom(),
            $client->getPrenom(),
            $client->getEmail(),
            $client->getDateNaissance(),
            $client->getId()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(ClientDTO $client)
    {
        if ($client->getId() != null) {
            $sql = "DELETE FROM clients WHERE id_client=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$client->getId()]);
        }
    }

}