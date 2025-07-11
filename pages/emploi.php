<?php
    ob_start();
    include("../INC/fonction.php");
    include("data.php");
    $femme = getNbF($data);
    $donnee1 = mysqli_fetch_assoc($femme);

    $homme = getNbM($data);
    $donnee2 = mysqli_fetch_assoc($homme);

    $sbe = getSalaireByEmploi($data);
?>

<h5>Nombre d'employe</h5>

<p>Nombre de femme : <?= getCorrectNb($donnee1['NbF']) ?></p>
<p>Nombre d'homme : <?= getCorrectNb($donnee2['NbM']) ?></p>

<h5>Salaire moyen pour chaque emploi</h5>

<table class="table">
    <tr>
        <th>Emploi</th>
        <th>Salaire Moyen</th>
    </tr>

    <?php while($donnee3 = mysqli_fetch_assoc($sbe)) { ?>
        <tr>
            <td><?= $donnee3['title'] ?></td>
            <td><?= getCorrectSalaire($donnee3['salary']) ?></td>
        </tr>
    <?php } ?>
    
</table>

<?php
    $nav="ok";
    $contenu = ob_get_clean();
    include("html.php");
?>