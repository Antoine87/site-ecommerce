<?php
namespace m2i\ecommerce\DAO;

class CommandeDAO implements ICommandeDAO {

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
        $sql = "SELECT * FROM commandes";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk){
        $sql = "SELECT * FROM commandes WHERE num_commande=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search){
        $sql = "SELECT * FROM commandes ";

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

    public function save(CommandeDTO $commande){
        if($commande->getId() == null){
            return $this->insert($commande);
        } else {
            return $this->update($commande);
        }
    }

    private function insert(CommandeDTO $commande){
        $sql = "INSERT INTO commandes (date_commande, date_expedition, date_livraison, id_client, id_mode_livraison, id_coupon, id_adresse, id_statut) VALUES ( ?, ?, ?, ?, ?, ?, ?, ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $commande->getDateCommande(), $commande->getDateExpedition(), $commande->getDateLivraison(), $commande->getIdClient(), $commande->getIdModeLivraison(), $commande->getIdCoupon(), $commande->getIdAdresse(), $commande->getIdStatut()
        ]);
    }

    private function update(CommandeDTO $commande){
        $sql = "UPDATE commandes SET date_commande=? , date_expedition=? , date_livraison=? , id_client=? , id_mode_livraison=? , id_coupon=? , id_adresse=? , id_statut=?  WHERE num_commande=? ";
        $data = array(
            $commande->getDateCommande(),
$commande->getDateExpedition(),
$commande->getDateLivraison(),
$commande->getIdClient(),
$commande->getIdModeLivraison(),
$commande->getIdCoupon(),
$commande->getIdAdresse(),
$commande->getIdStatut(),
$commande->getNumCommande()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(CommandeDTO $commande){
        if($commande->getId() != null){
            $sql = "DELETE FROM commandes WHERE num_commande=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$commande->getNumCommande()]);
        }
    }

}