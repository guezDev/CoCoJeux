<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict/EN" "http ://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http ://www.w3.org/1999/xhtml" xml :lang="fr" lang="fr" class="full-height">

<head>
    <title><?php if($content2=='liste_jeux_col') { echo 'Liste des jeux';} else if($content2=='collection') { echo 'Ma collection';} else if($content2=='bannir') { echo 'Bannir'; } else { echo 'Accueil';} ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="Guez LOUZOLO, Mael BELBEOCH" />
    <meta name="description" content="CoCoJeux, site de collection de jeux vidéo" />

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
            
            <?php $this->load->view($content1);?>
            <div class="dropdown d-flex mr-5">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('id'); ?></button>
                <a class="ml-3" id="bonome" href="#" data-toggle="dropdown"><i class="fas fa-user"></i></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= site_url('/welcome/deconnexion'); ?>">Se Déconnecter</a>
                </div>
            </div>
        </div>

        

    </nav>

    <?php $this->load->view($content2);?>



</body>

</html>
