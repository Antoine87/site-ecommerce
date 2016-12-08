CREATE OR REPLACE VIEW vue_livres AS
  (
    SELECT
      livres.id_livre,
      rubrique,
      titre,
      livres.id_langue,
      resume,
      accroche,
      date_parution,
      livres.id_editeur,
      livres.id_format,
      poids,
      nb_pages,
      ISBN_11,
      ISBN_13,
      prix,
      stock,
      langues.nom_langue,
      editeurs.nom_editeur,
      formats.format,
      GROUP_CONCAT(
          CONCAT_WS(' ',auteurs.prenom_auteur,auteurs.nom_auteur) SEPARATOR ', ') as liste_auteurs,
      GROUP_CONCAT(
          CONCAT_WS(' ',traducteurs.prenom_auteur,traducteurs.nom_auteur) SEPARATOR ', ') as liste_traducteurs
    FROM
      livres
      INNER JOIN langues ON langues.id_langue = livres.id_langue
      INNER JOIN editeurs ON editeurs.id_editeur = livres.id_editeur
      INNER JOIN formats ON formats.id_format = livres.id_format
      INNER JOIN auteurs_livres ON auteurs_livres.id_livre = livres.id_livre
      INNER JOIN auteurs ON auteurs.id_auteur= auteurs_livres.id_auteur
                            AND auteurs_livres.id_role=1
      LEFT JOIN auteurs as traducteurs ON traducteurs.id_auteur= auteurs_livres.id_auteur
                                          AND auteurs_livres.id_role=2
    GROUP BY livres.id_livre)
;