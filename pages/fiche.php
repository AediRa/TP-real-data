<?php
    ob_start();
    session_start();
    include("../INC/fonction.php");
    include("data.php");
    $id_emp = $_SESSION['id_emp'];
    $result = getFiche($data,$id_emp);
    $donnee = mysqli_fetch_assoc($result);
    $salaire = getSalaries($data,$id_emp);
    $title = getTitle($data,$id_emp);
?>

    <div class="container-fluid">
        <p>first_name : <?= $donnee['first_name'] ?></p>
        <p>last_name : <?= $donnee['last_name'] ?></p>
        <p>gender : <?= $donnee['gender'] ?></p>
        <p>birth_date : <?= getCorrectDate($donnee['birth_date']) ?></p>
        <p>title : <?= $donnee['title'] ?></p>
        <p>salary : <?= getCorrectSalaire($donnee['salary']) ?></p>

        <h3>historique du salaire</h3>
        <table class="table">
            <tr>
                <th>salaire</th>
                <th>debut</th>
                <th>fin</th>
            </tr>
            
            <?php while($donnee1 = mysqli_fetch_assoc($salaire)) { ?>
                <tr>
                    <td><?= getCorrectSalaire($donnee1['salary']) ?></td>
                    <td><?= getCorrectDate($donnee1['from_date']) ?></td>
                    <td><?= getCorrectDate($donnee1['to_date']) ?></td>
                </tr>
            <?php } ?>
            
        </table>

        <h3>historique de l'emploi</h3>
        <table class="table">
            <tr>
                <th>emploi</th>
                <th>debut</th>
                <th>fin</th>
            </tr>
            
            <?php while($donnee2 = mysqli_fetch_assoc($title)) { ?>
                <tr>
                    <td><?= $donnee2['title'] ?></td>
                    <td><?= getCorrectDate($donnee2['from_date']) ?></td>
                    <td><?= getCorrectDate($donnee2['to_date']) ?> </td>
                </tr>
            <?php } ?>

        </table>

        <a href="tb_Emp.php">Retour</a>
    </div>

<?php
    $contenu = ob_get_clean();
    include("html.php");
?>