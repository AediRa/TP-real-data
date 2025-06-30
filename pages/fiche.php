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
        <p>birth_date : <?= $donnee['birth_date'] ?></p>
        <p>title : <?= $donnee['title'] ?></p>
        <p>salary : <?= $donnee['salary'] ?></p>

        <h3>historique du salary</h3>
        <ul>
            <?php while($donnee1 = mysqli_fetch_assoc($salaire)) { ?>
                <li><?= $donnee1['salary'] ?> (<?= $donnee1['from_date'] ?> / <?= $donnee1['to_date'] ?> )</li>
            <?php } ?>
        </ul>

        <h3>historique de l'emploi</h3>
        <ul>
            <?php while($donnee2 = mysqli_fetch_assoc($title)) { ?>
                <li><?= $donnee2['title'] ?> (<?= $donnee2['from_date'] ?> / <?= $donnee2['to_date'] ?> )</li>
            <?php } ?>
        </ul>

        <a href="formulaire.php">Formulaire</a>
    </div>

<?php
    $nav="ok";
    $contenu = ob_get_clean();
    include("html.php");
?>