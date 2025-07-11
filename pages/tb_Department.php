<?php
    ob_start();
    include("data.php");
    include("../INC/fonction.php");
    $result = getDepartment($data);
?>
<h3>Liste des departements</h3><a class="btn btn-primary" href="../INC/traitement/traitement_modifdept.php">ajouter</a>
    <table class="table mt-3">
        <tr>
            <th>Departements</th>
            <th>Managers</th>
            <th>Nombre d'employe</th>
        </tr>
        
            <?php while($donnee = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><a class="a-no-effect" href="../INC/traitement/traitement_dept.php?id_dept=<?= $donnee['dept_no'] ?>&&name_dept=<?= $donnee['dept_name'] ?>"><?= $donnee['dept_name'] ?></a> <a href="../INC/traitement/traitement_modifdept.php?id_dept=<?= $donnee['dept_no'] ?>&&name_dept=<?= $donnee['dept_name'] ?>&&first_name=<?= $donnee['first_name'] ?>&&last_name=<?= $donnee['last_name'] ?>">modifier</a></td>
                    <td><?= $donnee['first_name'] ?></td>
                    <td><?= getCorrectNb($donnee['nb_empBydept']) ?></td>
                </tr>
            <?php } ?>
        
    </table>

<?php
    $nav="ok";
    $contenu = ob_get_clean();
    include("html.php");
?>