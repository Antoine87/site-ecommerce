<?php

class LivreDAO implements ILivreDAO
{

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

    public function findAll()
    {
        $sql = "SELECT * FROM livres";
        $rs = $this->pdo->query($sql)->fetchAll();
        return $rs;
    }

    public function findOneById(array $pk)
    {
        $sql = "SELECT * FROM livres WHERE id_livre=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($pk);
        $rs = $statement->fetch();
        return $rs;
    }

    public function find(array $search)
    {
        $sql = "SELECT * FROM livres ";

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

    public function save(LivreDTO $livre)
    {
        if ($livre->getId() == null) {
            return $this->insert($livre);
        } else {
            return $this->update($livre);
        }
    }

    private function insert(LivreDTO $livre)
    {
        $sql = "INSERT INTO livres (rubrique, titre, id_langue, resume, table_des_matieres, accroche, date_parution, id_editeur, id_collection, id_format, dimension_h, dimension_l, dimension_p, poids, nb_pages, ISBN_11, ISBN_13, couverture, prix, stock, edition) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $livre->getRubrique(), $livre->getTitre(), $livre->getIdLangue(), $livre->getResume(), $livre->getTableDesMatieres(), $livre->getAccroche(), $livre->getDateParution(), $livre->getIdEditeur(), $livre->getIdCollection(), $livre->getIdFormat(), $livre->getDimensionH(), $livre->getDimensionL(), $livre->getDimensionP(), $livre->getPoids(), $livre->getNbPages(), $livre->getISBN_11(), $livre->getISBN_13(), $livre->getCouverture(), $livre->getPrix(), $livre->getStock(), $livre->getEdition()
        ]);
    }

    private function update(LivreDTO $livre)
    {
        $sql = "UPDATE livres SET rubrique=? , titre=? , id_langue=? , resume=? , table_des_matieres=? , accroche=? , date_parution=? , id_editeur=? , id_collection=? , id_format=? , dimension_h=? , dimension_l=? , dimension_p=? , poids=? , nb_pages=? , ISBN_11=? , ISBN_13=? , couverture=? , prix=? , stock=? , edition=?  WHERE id_livre=? ";
        $data = array(
            $livre->getRubrique(),
            $livre->getTitre(),
            $livre->getIdLangue(),
            $livre->getResume(),
            $livre->getTableDesMatieres(),
            $livre->getAccroche(),
            $livre->getDateParution(),
            $livre->getIdEditeur(),
            $livre->getIdCollection(),
            $livre->getIdFormat(),
            $livre->getDimensionH(),
            $livre->getDimensionL(),
            $livre->getDimensionP(),
            $livre->getPoids(),
            $livre->getNbPages(),
            $livre->getISBN_11(),
            $livre->getISBN_13(),
            $livre->getCouverture(),
            $livre->getPrix(),
            $livre->getStock(),
            $livre->getEdition(),
            $livre->getIdLivre()
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data);
    }

    public function delete(LivreDTO $livre)
    {
        if ($livre->getId() != null) {
            $sql = "DELETE FROM livres WHERE id_livre=? ";
            $statement = $this->pdo->prepare($sql);
            return $statement->execute([$livre->getIdLivre()]);
        }
    }

}