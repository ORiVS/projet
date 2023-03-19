<?php require 'config.php'; 
$id = null; 
if ( !empty($_GET['id'])) { 
    $id = $_REQUEST['id']; 
} if ( null==$id ) { 
    header("Location: index.php"); 
} if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) { 
    // on initialise nos erreurs 
    $nameError = null; 
    $firstnameError = null; 
    $ageError = null; 
    $gradeError = null;
    // On assigne nos valeurs 
    $name = $_POST['name']; 
    $firstname = $_POST['firstname']; 
    $age = $_POST['age']; 
    $grade = $_POST['grade']; 
    // On verifie que les champs sont remplis 
     $valid = true; 
     if (empty($name)){
         echo 'Veuillez entrer un nom'; 
         $valid = false; 
     }else if (!preg_match("/^[a-zA-Z ]*$/",$name)) { 
         echo "Seuls les lettres sont autorisés"; 
     }
     if(empty($firstname)){ 
         $firstnameError ='Veuillez entrer un prénom'; 
         $valid= false; 
     }else if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) { 
         $firstnameError = "Seuls les lettres sont autorisés";  
     }
     if (empty($age)) { 
         $ageError = 'Veuillez entrer un age'; 
         $valid = false; 
     } 
     if (empty($grade)) { 
             $gradeError = 'Veuillez entrer un grade'; 
             $valid = false;
            } // mise à jour des donnés 
            if ($valid) { 
                $pdo = Database::connect(); 
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE samuel.acolytes SET nom = ?, prenom = ?,age = ?, grade = ? WHERE id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($name, $firstname, $age, $grade, $id));
                Database::disconnect();
                header("Location: index.php");
            } 
        }else {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM samuel.acolytes where id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            $name = $data['nom'];
            $firstname = $data['prenom'];
            $age = $data['age'];
            $grade = $data['grade'];
            
            Database::disconnect();
        }
     
     ?>

<!DOCTYPE html>
<html>
<head>
    <title>AJOUTER</title>
    <link rel="stylesheet" href="stiil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat:wght@300&family=Roboto+Flex:opsz,wght@8..144,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet"> </head>
 <body>
 <header>
        <img class="left" src="20230116_020550.jpg" alt="PremièreImage">
        <div class="vertical">
            <p>
                <strong>ARCHIDIOCESE DE COTONOU</strong>
            </p>
            <p>
                <strong>VICARIAT FORAIN DE ZOGBO</strong>
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

<br />
<h3>MODIFIER UN ENREGISTREMENT</h3>
</div>
<form method="post" action="update.php?id=<?php echo $id ;?>">
<div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">NOM :</label>

<br /> 
<div class="controls">
                            <input name="name" type="text"  placeholder="Entrez votre nom" value="<?php echo !empty($name)?$name:'';?>" required> <br> <br>
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
</div>
</div>
<div class="control-group<?php echo !empty($firstnameError)?'error':'';?>">
                    <label class="control-label">PRENOM :</label>
                    <br />
<div class="controls">
                            <input type="text" name="firstname" placeholder="Entrez votre prénom" value="<?php echo !empty($firstname)?$firstname:''; ?>" required> <br> <br>
                            <?php if(!empty($firstnameError)):?>
                            <span class="help-inline"><?php echo $firstnameError ;?></span>
                            <?php endif;?>
</div>
</div>
<div class="control-group<?php echo !empty($ageError)?'error':'';?>">
                    <label class="control-label">AGE :</label>
<br />
<div class="controls">
                            <input type="number" name="age" value="<?php echo !empty($age)?$age:''; ?>" required min="9" max="15">
                            <?php if(!empty($ageError)):?>
                            <span class="help-inline"><?php echo $ageError ;?></span>
                            <?php endif;?>
</div>
</div>
<br />
<div class="control-group<?php echo !empty($gradeError)?'error':'';?>">
<label class="control-label">GRADE :</label> <br>
                
                 <select name="grade">
<option value="noviciat">NOVICIAT</option>
<option value="acolyte">ACOLYTE</option>
<option value="porte_benitier">PORTE BENITIER</option>
<option value="ceroferaire">CEROFERAIRE</option>
<option value="porte_croix">PORTE CROIX</option>
<option value="naviculaire">NAVICULAIRE</option>
<option value="turiferaire">TURIFERAIRE</option>
</select>
<br /> <br>
<div class="form-actions">
                 <input type="submit" class="btn btn-success" name="submit" value="CONFIRMER">
                 <a class="btn" href="index.php">Retour</a>
</div>
         </form>
</div>
<p>


 </body>
</html>