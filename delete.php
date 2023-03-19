<?php require 'config.php'; 
$id=0; 
if(!empty($_GET['id'])){ 
    $id=$_REQUEST['id']; 
} if(!empty($_POST)){ 
    $id= $_POST['id']; 
    $pdo=Database::connect(); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM samuel.acolytes  WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Database::disconnect();
    header("Location: index.php");
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>AJOUTER</title>
    <link rel="stylesheet" href="stiil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat:wght@300&family=Roboto+Flex:opsz,wght@8..144,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
        <img class="left" src="20230116_020550.jpg" alt="PremièreImage">
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
        <img class="right" src="20230116_021216.jpg" alt="DeuxiemeImage">
</header>
<div class="container">
<div class="span10 offset1">
<div class="row">
<h3>SUPPRIMER UN ENREGISTREMENT</h3>
</div>
<form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      
VOUS ETES SUR LE POINT DE SUPPRIMER UN ENREGISTREMENT. VOULEZ VOUS CONTINUER?

<br>

<br />
<div class="form-actions">
                          <button type="submit" class="btn btn-danger">OUI</button>
                          <a class="btn" href="index.php">NON</a>
</div>
<p>

                    </form>
<p>
</div>
<p>

                 
</div>
<p>
<!-- /container -->
  </body>
</html>