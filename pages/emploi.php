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

<p>Nombre de femme : <?= $donnee1['NbF'] ?></p>
<p>Nombre d'homme : <?= $donnee2['NbM'] ?></p>

<table class="table">
    <tr>
        <th>Emploi</th>
        <th>Salaire Moyen</th>
    </tr>

    <?php while($donnee3 = mysqli_fetch_assoc($sbe)) { ?>
        <tr>
            <td><?= $donnee3['title'] ?></td>
            <td><?= $donnee3['salary'] ?></td>
        </tr>
    <?php } ?>
    
</table>

<?php
    $nav="ok";
    $contenu = ob_get_clean();
    include("html.php");
?>