 
<ul class="navbar-nav mr-auto" id="contenu">
    <li class="nav-item">
        <a class="nav-link <?php if($content2!='liste_jeux_col' && $content2!='collection') {echo 'active';} ?>" href="<?= site_url('/welcome/connecte_col/message_accueil_co'); ?>">Accueil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if($content2=='liste_jeux_col') {echo 'active';} ?>" href="<?= site_url('/welcome/afficher_jeux_disponibles'); ?>">Voir les jeux</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if($content2=='collection') {echo 'active';} ?>" href="<?= site_url('/welcome/afficher_collection'); ?>">Ma collection</a>
    </li>
</ul>
