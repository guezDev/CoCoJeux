<div class="row" id="liste_jeux">
    <?php 
        if($fait==='oui') {
            echo 
                "<div style='margin:auto' class='alert alert-dismissable alert-success'>
                    <span>\"".$dernier_jeu_supprime."\" a été supprimé de votre collection.<span>
                    <button type='button' data-dismiss='alert' aria-hidden='true'>&times;</button>
                </div>";
        }
    ?>
    <p style="margin: 1em auto 1em auto; color:#00A6D6; font-weight: bold;">Pour ajouter des jeux à votre collection, allez dans "Voir les jeux".</p>
    <table class="table table-bordered table-striped table-fixed">
        <thead class="thead-dark">
            <tr>
                <th>Identifiant</th>
                <th>Titre</th>
                <th>Sortie</th>
                <th>Description</th>
                <th>Couverture</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($jeux_col as $jeu):?>
            <?php //if($jeu['sortie']=='') { $jeu['sortie']="Non connue"; }?>
            <?php 
                        $lien='/welcome/supprimer_jeu/'.$jeu['id_jeu'];
                        
                    
                        echo 
                        "<tr>".
                        "<td>".$jeu['id_jeu']."</td>".
                        "<td>".$jeu['titre']."</td>".
                        "<td>".$jeu['sortie']."</td>".
                        "<td>".$jeu['description']."</td>".
                        "<td>"."<img style='width:5em;' src='".$jeu['couverture']."' alt='Couverture du jeu ".$jeu['titre']."' title='".$jeu['titre']."'/></td>".
                        "<td id='i'><a style='color:red;display:block;' title='Supprimer' href='". site_url($lien)."'><i class='fas fa-minus-circle'></i><a></td>".
                        "</tr>" ?>
            <?php endforeach ?>
        </tbody>
    </table>
    <ul>

    </ul>
</div>
