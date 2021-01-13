<ul class="navbar-nav mr-auto" id="contenu">
    <li class="nav-item">
        <a class="nav-link <?php if($content2!='bannir') {echo 'active';} ?>" href="<?= site_url('/welcome/connecte_admin/message_accueil_co'); ?>">Accueil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if($content2=='bannir') {echo 'active';} ?>" href="<?= site_url('/welcome/afficher_collectionneurs'); ?>">Bannir</a>
    </li>
</ul>
