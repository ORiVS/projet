<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styleC.css">
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
        <img class="left" src="Images\20230116_020550.jpg" alt="PremièreImage">
        <div class="vertical">
            <p>
                <strong>4RCH1O1DC5S5 O5 CDTDNDU </strong>
            </p>
            <p>
                <strong>V1C4R147 FDRR41N 05 ZDGBD</strong>
            </p>
            <p>
                <strong>CDMMUN4U7S P4RD15514L3 O5E 54MUSL5 D'4KDGB47D</strong>
            </p>
        </div>
        <img class="right" src="Images\20230116_021216.jpg" alt="DeuxiemeImage">
    </header>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 d-flex justify-content-between">
                        <h2 class="pull-left">Liste des Novices</h2>
                        <a href="index.php" class="btn btn-success"><i class="bi bi-plus"></i> Ajouter</a>
                    </div>
                    <?php 
/* Inclure le fichier config */
require_once "config.php";
                    
                    /* select query execution */
                    $sql = "SELECT * FROM samuel.noviciat";
                    
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nom</th>";
                                        echo "<th>Ecole</th>";
                                        echo "<th>Age</th>";
                                        echo "<th>Grade</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['NOM'] . "</td>";
                                        echo "<td>" . $row['PRENOM'] . "</td>";
                                        echo "<td>" . $row['AGE'] . "</td>";
                                        echo "<td>" . $row['GRADE'] . "</td>";

                                        echo "<td>";
                                            echo '<a href="read.php?id='. $row['id'] .'" class="me-3" ><span class="bi bi-eye"></span></a>';
                                            echo '<a href="update.php?id='. $row['id'] .'" class="me-3" ><span class="bi bi-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" ><span class="bi bi-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            /* Free result set */
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>Pas d\'enregistrement</em></div>';
                        }
                    } else{
                        echo "Oops! Une erreur est survenue";
                    }
 
                    /* Fermer connection */
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>