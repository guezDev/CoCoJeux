<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict/EN" "http ://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http ://www.w3.org/1999/xhtml" xml :lang="fr" lang="fr" class="full-height">

<head>
    <title><?php echo $titre; ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="Guez LOUZOLO" />
    <meta name="description" content="" />

    <!-- css -->

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/font/css/all.min.css" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />

    <!-- js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/uxl/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>

<body class="container-fluid">
    <nav class="row navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <strong class="nav-band">CoCoJeux</strong>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" id="contenu">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/welcome'); ?>">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= site_url('/welcome/afficher_liste_jeux/liste_jeux'); ?>">Voir les jeux</a>
                </li>
            </ul>

            <div class="dropdown d-flex mr-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Compte</button>
                <a class="ml-3" id="bonome" href="#" data-toggle="dropdown"><i class="fas fa-user"></i></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= site_url('/welcome/afficher_page_connexion');?>">Se connecter</a>
                    <a class="dropdown-item" href="<?= site_url('/welcome/afficher_page_inscription'); ?>">S'inscrire</a>
                </div>
            </div>
        </div>



    </nav>

    <div class="row" id="liste_jeux" style="margin-top:1em;">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Identifiant</th>
                    <th>Titre</th>
                    <th>Sortie</th>
                    <th>Description</th>
                    <th>Couverture</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($liste_jeux as $jeu):?>
                <?php if($jeu['sortie']=='01/01/0001') { $jeu['sortie']="Non connue"; }?>
                <?php echo 
                        "<tr>".
                        "<td>".$jeu['id_jeu']."</td>".
                        "<td>".$jeu['titre']."</td>".
                        "<td>".$jeu['sortie']."</td>".
                        "<td>".$jeu['description']."</td>".
                        "<td>"."<img style='width:5em;' src='".$jeu['couverture']."' alt='Couverture du jeu ".$jeu['titre']."' title='".$jeu['titre']."'/>"."</td>".
                        "</tr>" ?>
                <?php endforeach ?>
            </tbody>
        </table>
        <ul>

        </ul>
    </div>



</body>

</html>
