/****************************************************
* Structure de données de l'application ecommerce
 ****************************************************/

DROP DATABASE IF EXISTS ecommerce;

CREATE DATABASE ecommerce;

-- Export de la structure de la base pour e_commerce
CREATE DATABASE IF NOT EXISTS `e_commerce` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `e_commerce`;



-- Export de données de la table e_commerce.éditeurs : ~3 rows (environ)
DELETE FROM `éditeurs`;
/*!40000 ALTER TABLE `éditeurs` DISABLE KEYS */;
INSERT INTO `éditeurs` (`Nom`) VALUES
	( 'MICHEL LAFON'),
	( 'John Tiffany'),
	( 'Carole Neel ');