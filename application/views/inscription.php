<legend style="text-align:center;"><b>Inscription</b></legend>
<?php
if($inscrit==='oui') {
    echo "<p style='color:green; text-align:center;'>Vous êtes désormais inscrit. <a href='";
    echo site_url('/welcome/afficher_page_connexion');
    echo "'>"."Cliquez ici"."</a> pour vous connecter.</p>";
}

if($ban==='oui') {
    echo "<p style='color:red; text-align:center;'>Vous ne pouvez pas utiliser ce pseudo</p>";
}
?>

<?php echo form_open('welcome/afficher_page_inscription')?>

<div class="form-group">
    <label for="id">Identifiant</label>
    <input type="text" class="form-control" name="id" value="<?php echo set_value('id'); ?>" placeholder="Saisissez un identifiant">
    <small id="aide_identifiant" class="form-text text-muted">
        <?php 
        if(strpos(form_error('id'),'unique')) { 
            echo "<span style='color:red;'>Un compte possédant cet identifiant existe déjà.</span>";
        } else{ 
            if(!empty(form_error('id'))) { 
                echo "<span style='color:red;'>".form_error('id')."</span>"; 
            } else { 
                echo "5 - 12 caractères."; 
            }
        }  ?>
    </small>
</div>
<div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" name="nom" value="<?php echo set_value('nom'); ?>" placeholder="Saisissez votre nom">

    <small id="aide_nom" class="form-text text-muted">
        <?php 
            if(!empty(form_error('nom'))) { 
                echo "<span style='color:red;'>".form_error('nom')."</span>"; 
            } else { 
                echo "50 caractères maximum."; 
            }
          ?>
    </small>
</div>
<div class="form-group">
    <label for="prenom">Prénom</label>
    <input type="text" class="form-control" name="prenom" value="<?php echo set_value('prenom'); ?>" placeholder="Saisissez votre prénom">
    <small id="aide_prenom" class="form-text text-muted">
        <?php 
            if(!empty(form_error('prenom'))) { 
                echo "<span style='color:red;'>".form_error('prenom')."</span>"; 
            } else { 
                echo "50 caractères maximum."; 
            }
          ?>
    </small>
</div>
<div class="form-group">
    <label for="mdp">Mot de passe</label>
    <input type="password" class="form-control" name="mdp" value="<?php echo set_value('mdp'); ?>" placeholder="Saisissez un mot de passe">
    <small id="aide_mdp" class="form-text text-muted">
        <?php 
        if(!empty(form_error('mdp'))) { 
            echo "<span style='color:red;'>".form_error('mdp')."</span>"; 
        } else { 
            echo "8 - 12 caractères."; 
        }
        ?>
    </small>
</div>
<div class="form-group">
    <label for="mdp_conf">Confirmer le mot de passe</label>
    <input type="password" class="form-control" name="mdp_conf" value="<?php echo set_value('mdp_conf'); ?>" placeholder="Saisissez à nouveau le mot de passe">
    <?php 
    if(!empty(form_error('mdp_conf'))) { 
        echo "<small id='aide_mdp_conf' class='form-text text-muted'><span style='color:red;'>".form_error('mdp_conf')."</span></small>"; 
    } ?>
</div>
<button style='display:block; margin:auto;' type="submit" name="submit" class="btn btn-primary">S'inscrire</button>
