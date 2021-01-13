<div class="row">
    <?php 
        if($fait==='oui') {
            echo 
                "<div style='margin:auto' class='alert alert-dismissable alert-success'>
                    <span>\"".$dernier_col_banni."\" est désormais banni.<span>
                    <button type='button' data-dismiss='alert' aria-hidden='true'>&times;</button>
                </div>";
        }
    ?>
    <table class="table table-bordered table-striped table-fixed" style="margin-top:1em;">
        <thead class="thead-dark">
            <tr>
                <th>Identifiant</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($liste_col as $col):?>
            <?php 
                        $lien='/welcome/bannir_col/'.$col['id_col'];
                        echo 
                        "<tr>".
                        "<td>".$col['id_col']."</td>".
                        "<td id='i'><a style='color:red;display:block;' title='Bannir' href='". site_url($lien)."'><i class='fas fa-minus-circle'></i><a></td>".
                        "</tr>" ?>
            <?php endforeach ?>
        </tbody>
    </table>
    <ul>

    </ul>
</div>
