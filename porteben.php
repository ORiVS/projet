<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>ACCEUIL</title>
        <link rel="stylesheet" href="stiil.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat:wght@300&family=Roboto+Flex:opsz,wght@8..144,300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <style>
            .wrapper{
                width: 700px;
                margin: auto;
            }
            table tr td:last-child{
                width: 120px;
            }
        </style>
    
    </head>
    <body>
    <header>
            <img class="left" src="20230116_020550.jpg" alt="PremièreImage">
            <div class="vertical">
                <p>
                    <strong>ARCHIDIOCESE DE COTONOU</strong>
                </p>
                <p>
                    <strong>VICARIAT FORRAIN DE ZOGBO</strong>
                </p>
                <p>
                    <strong>COMMUNAUTE PAROISSIALE DES SAMUEL D'AKOGBATO</strong>
                </p>
            </div>
            <img class="right" src="20230116_021216.jpg" alt="DeuxiemeImage">
        </header>
        <br />
    <div class="container">
        <br />
        <div class="row">
        <h2>LISTE DES PORTE BENITIER</h2> <br> <br>
    </div>
    <div class="row"> 
        <a href="add.php" class="btn btn-success">Ajouter un enregistrement</a>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <th>N°</th> 
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>Age</th>
                        <th>GRADE</th>
                    </thead>
                    <tbody>
                                            <?php include 'config.php'; //on inclut notre fichier de connection
                                            $pdo = Database::connect(); //on se connecte à la base
                                            $sql = 'SELECT * FROM samuel.acolytes  where grade = "porte_benitier" ORDER BY id ASC'; //on formule notre requete
                                            foreach ($pdo->query($sql) as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                                                echo '<tr>';
                                                echo'<td>' . $row['id'].'</td>';
                                                echo'<td>' . $row['nom'] . '</td>';
                                                echo'<td>' . $row['prenom'] . '</td>';
                                                echo'<td>' . $row['age'] . '</td>';
                                                echo'<td>' . $row['grade'] . '</td>';
                                                echo '<td>';
                                                echo '<a class="btn" href="edit.php?id=' . $row['id'] . '">Read</a>';// un autre td pour le bouton d'edition
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<a class="btn btn-success" href="update.php?id=' . $row['id'] . '">Update</a>';// un autre td pour le bouton d'update
                                                echo '</td>';
                                                echo'<td>';
                                                echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . ' ">Delete</a>';// un autre td pour le bouton de suppression
                                                echo '</td>';
                                                echo '</tr>';
                                            }
                                            Database::disconnect(); //on se deconnecte de la basE;
                                            ?>    
                    </tbody>
                </table>

            </div>

        </div>
        <a class="btn" href="index.php">RETOUR</a>
    </body>
    </html>