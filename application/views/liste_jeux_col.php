<div class="row" id="liste_jeux">
    <?php 
        if($fait==='oui') {
            echo 
                "<div style='margin:auto' class='alert alert-dismissable alert-success'>
                    <span>\"".$dernier_jeu_ajoute."\" a été ajouté à votre collection.<span>
                    <button type='button' data-dismiss='alert' aria-hidden='true' style='margin:auto;'>&times;</button>
                </div>";
        }
    ?>
    <table class="table table-bordered table-striped table-fixed" style="margin-top:1em;">
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
            <?php foreach($liste_jeux as $jeu):?>
            <?php //if($jeu['sortie']=='') { $jeu['sortie']="Non connue"; }?>
            <?php 
                        $lien='/welcome/ajouter_jeu/'.$jeu['id_jeu'];
                        $reponse="<td id='i'><a style='color:green;display:block;' title='Ajouter à ma collection' href='". site_url($lien)."'><i class='fas fa-plus-circle'></i><a></td>";
                        
                        foreach($jeux_col as $ligne) {
                            if($ligne['id_jeu']==$jeu['id_jeu']) {
                                $reponse='<td></td>';
                            }
                        }
                    
                        echo 
                        "<tr>".
                        "<td>".$jeu['id_jeu']."</td>".
                        "<td>".$jeu['titre']."</td>".
                        "<td>".$jeu['sortie']."</td>".
                        "<td>".$jeu['description']."</td>".
                        "<td>"."<img style='width:5em;' src='".$jeu['couverture']."' alt='Couverture du jeu ".$jeu['titre']."' title='".$jeu['titre']."'/></td>".
                        $reponse.
                        "</tr>" ?>
            <?php endforeach ?>
        </tbody>
    </table>
    <ul>

    </ul>
</div>
