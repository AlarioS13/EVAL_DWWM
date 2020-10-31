
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



<h1 class='text-center mt-2 mb-5'> Créer un article </h1>

<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <form method="post" action="" class="col-6">
        
            <div class="form-group">
                <label for="title"><h5 class="text-muted">Saisir un titre :</h5></label>
                <input value="" type="text" required class="form-control" id="title" name="title" placeholder="Entrer le titre">
            </div>

            <div class="form-group">
                <label for="description"><h5 class="text-muted">Saisir une description :</h5></label>
                <textarea class="form-control" id="description" name="description" required rows="6"></textarea>
            </div>

            <div class="form-group">
                <label for="date"><h5 class="text-muted">Saisir une date :</h5></label>
                <input value="" type="date" min="1970-01-01" max="<?php echo date('Y-m-d'); ?>" required class="form-control" id="date" name="date" placeholder="Sasir une date">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Valider</button>

        </form>
        <div class="col-3"></div>

    </div>
</div>

</body>
</html>

