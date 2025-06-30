<?php
    ob_start();
    include("data.php");
    include("../INC/fonction.php");
    $result = getDepartment($data);
?>

    <table class="table">
        <tr>
            <th>dept_name</th>
            <th>mg_name</th>
        </tr>
        
            <?php while($donnee = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><a href="../INC/traitement/traitement_dept.php?id_dept=<?= $donnee['dept_no'] ?>&&name_dept=<?= $donnee['dept_name'] ?>"><?= $donnee['dept_name'] ?></a></td>
                    <td><?= $donnee['first_name'] ?></td>
                </tr>
            <?php } ?>
        
    </table>

<?php
    $nav="ok";
    $contenu = ob_get_clean();
    include("html.php");
?>