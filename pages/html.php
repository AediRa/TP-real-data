<?php

    $content = "Erreur : Page Introuvable";
    if(isset($contenu)) {
        $content = $contenu ;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css-2/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/bootstrap.bundle.min.js.map"></script>
    <title>Document</title>
</head>
<body class="body-b">

    <header>
        <?php if(isset($nav)) { ?>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a href="tb_Department.php">Departement</a>
                    <a href="formulaire.php">Formulaire</a>
                </div>
            </nav>
        <?php } ?>
    </header>

    <main>
        <?= $content ?>
    </main>

    <footer>
        <p>&copy; 2025 4040-4072</p>
    </footer>

</body>
</html>