<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

<?php

// Premiere requete pour récuperer les valeurs de la ligne que l'on veut modifier

    try {
        $id=$_GET['id'];        
        require_once("db.php");
        $sql = "SELECT * FROM posts WHERE id=?";
        $stmt = $cnx -> prepare($sql);
        $stmt -> bindValue(1, $id);
        $stmt -> execute();

        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt -> closeCursor();
        $previous_title = $row[1];
        $previous_descr = $row[2];
        $previous_date = $row[3];

     } catch (Exception $e) {
        die('Erreur : '.$e->getmessage());
    }
// Seconde requete pour modifier la dite ligne 

if ($_POST){

    try {
        
        require_once("db.php");
        
        $id=$_GET['id'];        
        $title=$_POST['title'];
        $description=$_POST['description'];
        $date=$_POST['date'];
        $sql = "UPDATE posts 
        SET post_title='$title', description='$description', post_at='$date'
        WHERE id='$id'";
        $data = $cnx->prepare($sql);
        $data->execute();


    } catch (Exception $e) {
        die('Erreur : '.$e->getmessage());
    }
    header('location:index.php');
}
?>



<h1 class='text-center mt-2 mb-5'> Modifier un article </h1>

<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <form method="post" action="" class="col-6">
        
            <div class="form-group">
                <label for="title"><h5 class="text-muted">Modifier le titre :</h5></label>
                <input value="<?=$previous_title?>" type="text" required class="form-control" id="title" name="title" placeholder="Entrer le titre">
            </div>

            <div class="form-group">
                <label for="description"><h5 class="text-muted">Modifier la description :</h5></label>
                <textarea class="form-control" id="description" name="description" required rows="6" placeholder="Saisir une description"><?=$previous_descr?></textarea>
            </div>

            <div class="form-group">
                <label for="date"><h5 class="text-muted">Modifier la date :</h5></label>
                <input value="<?=$previous_date?>" type="date" min="1970-01-01" max="<?php echo date('Y-m-d'); ?>" required class="form-control" id="date" name="date" placeholder="Sasir une date">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Valider</button>

        </form>
        <div class="col-3"></div>

    </div>
</div>

</body>
</html>

