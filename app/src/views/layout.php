<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="/dependencies/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/dependencies/bootstrap/dist/css/bootstrap-theme.css">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body class="container fluid">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Chapitre</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">catalogue</a></li>
                <li><a href="#">mon compte</a></li>

                <!-- liste des cruds -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-haspopup="true" aria-expanded="false">CRUD
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">auteurs</a></li>
                        <li><a href="#">roles</a></li>
                        <li><a href="#">éditeurs</a></li>
                        <li><a href="#">langues</a></li>
                        <li><a href="#">collections</a></li>
                        <li><a href="#">coupons</a></li>
                        <li><a href="#">modes de livraison</a></li>
                        <li><a href="#">statuts de commande</a></li>
                        <li><a href="#">mode de paiement</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">commentaires</a></li>
                        <li><a href="#">livres</a></li>
                        <li><a href="#">clients (avec adresse et tel)</a></li>
                        <li><a href="#">commandes</a></li>
                        <li><a href="#">paiements</a></li>
                    </ul>
                </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Voir le panier</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="row content">
    <?php if(isset($_SESSION["flash"])): ?>
        <div class="alert alert-info">
            <?= $_SESSION["flash"] ?>
        </div>
    <?php endif; ?>

    <?= $pageContent ?>
</div>

<script src="/dependencies/jquery/dist/jquery.js"></script>
<script src="/dependencies/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>