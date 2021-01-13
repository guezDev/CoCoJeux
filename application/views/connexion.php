<legend style="text-align:center;"><b>Connexion</b></legend>

<?php echo form_open('welcome/afficher_page_connexion')?>

<div class="form-group">
    <label for="id">Identifiant</label>
    <input type="text" class="form-control" name="id" value="<?php echo set_value('id'); ?>" placeholder="Saisissez votre identifiant">
    <?php if(!empty(form_error('id'))) {
    echo "<small id='aide_id_co' class='form-text text-muted'><span style='color:red;'>".form_error('id')."</span></small>";
    } ?>
</div>
<div class="form-group">
    <label for="mdp">Mot de passe</label>
    <input type="password" class="form-control" name="mdp" value="<?php echo set_value('mdp'); ?>" placeholder="Saisissez votre mot de passe">
    <?php if(!empty(form_error('mdp'))) {
    echo "<small id='aide_mdp_co' class='form-text text-muted'><span style='color:red;'>".form_error('mdp')."</span></small>";
    } ?>
</div>
<button style='display:block; margin:auto;' type="submit" name="submit" class="btn btn-primary">Se connecter</button><br/>
<?php 
if($compte_existe==='non') { 
    echo "<p style='text-align:center; color:red;'>Nous n'avons pas trouvé ce compte. Réessayez ou créez-en un en <a href='";
    echo site_url('/welcome/afficher_page_inscription');
    echo "'>Cliquant ici</a>.<p>";}

if($ban==='oui') {
    echo "<p style='color:red; text-align:center;'>Vous ne pouvez pas utiliser ce pseudo.</p>";
}
?>
