<?php require('config.php'); //on appelle notre fichier de config
$id = null; 
if (!empty($_GET['id'])) { 
    $id = $_REQUEST['id']; 
} if (null == $id) { 
    header("location:index.php"); 
} else { 
    //on lance la connection et la requete 
    $pdo = Database ::connect(); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) .
    $sql = "SELECT * FROM samuel.acolytes where id =?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>MODIFIER</title>
        <link rel="stylesheet" href="stiil.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat:wght@300&family=Roboto+Flex:opsz,wght@8..144,300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
    </head>

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
<div class="span10 offset1">
<br />
<div class="row">
<br />
<h3>APERCU</h3>
</div>
<br />
<div class="form-horizontal" >
<br />
<div class="control-group">
                        <label class="control-label">NOM :</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['nom']; ?>
                            </label>
</div>

</div>
<br />
<div class="control-group">
                        <label class="control-label">PRENOM :</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['prenom']; ?>
                            </label>
</div>
<br>
<div class="control-group">
                        <label class="control-label">AGE :</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['age']; ?>
                            </label>
</div>
<br>
<div class="control-group">
                        <label class="control-label">GRADE :</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['grade']; ?>
                            </label>
</div>

<br />
<div class="form-actions">
                        <a class="btn" href="index.php">RETOUR</a>
</div>
</div>
<p>

</div>
<p>


</div>
<p>
<!-- /container -->
    </body>
</html>