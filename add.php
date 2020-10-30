
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if ($_POST) {
    try {
        require_once("db.php");
        if($cnx) echo "CONNEXION OK<br>";
        @$title = $_POST['title'];
        @$description = $_POST['description'];
        @$date = $_POST['date'];
        $sql = "INSERT INTO posts (post_title, description, post_at) VALUES('$title','$description','$date')";
        $cnx->exec($sql);

    } catch (Exception $e) {
        die('Erreur : '.$e->getmessage());
    }
    header('location:index.php');
}

?>



<h1> Ajouter un article </h1>
<div class="row">
   
        <form method="post" action="" class="col-12 col-md-6">
            <div class="form-group">
                <label for="title">Saisir le titre :</label>
                <input type="text" required class="form-control" id="title" name="title" placeholder="Entrer le titre">
            </div>
            <div class="form-group">
                <label for="description">Saisir la description :</label>
                <textarea class="form-control" id="description" name="description" required rows="6" placeholder="Saisir une description"></textarea>
            </div>
            <div class="form-group">
                <label for="date">Saisir une date :</label>
                <input type="date" min="1970-01-01" max="<?php echo date('Y-m-d'); ?>" required class="form-control" id="date" name="date" placeholder="Sasir une date">
            </div>
            <button type="submit" class="button" name="button">Valider</button>
        </form>
    </div>

</body>
</html>

