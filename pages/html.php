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
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body class="body-b">

    <header>
        <?php if(isset($nav)) { ?>

            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    
                    <div class="collapse navbar-collapse">
                        <div class="navbar-nav btn-group">
                            
                            <a class="m-2 btn btn-primary" href="tb_Department.php">Departement</a>
                            <a class="m-2 btn btn-primary" href="formulaire.php">Formulaire</a>
                            <a class="m-2 btn btn-primary" href="emploi.php">Information</a>
                
                        </div>
                    </div>
                    
                </div>
            </nav>

        <?php } ?>

        <?php if(isset($return)) { ?>

            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    
                    <div class="collapse navbar-collapse">
                        <div class="navbar-nav btn-group">
                            
                            <a class="m-2 btn btn-primary" href="<?= $return ?>">Retour</a>
                            <a class="m-2 btn btn-primary" href="<?= $departement ?>">Changer de Departement</a>
                            <a class="m-2 btn btn-primary" href="<?= $d_manager ?>">Devenir Manager</a>
                
                        </div>
                    </div>
                    
                </div>
            </nav>

        <?php } ?>
    </header>

    <main>
        <div class="container-fluid">
            <?= $content ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 4040-4072</p>
    </footer>

</body>
</html>