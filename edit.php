<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php
date ('Y-m-d');
// Je ne fais pas de seconde requete parce que je n'y suis pas arrivé, au moins là "ca marche" 
@$previous_title=$_GET['title'];
@$previous_descr=$_GET['description'];
@$previous_date=$_GET['date'];

if ($_POST){
    try {
        
        require_once("db.php");
        
        $id=$_GET['id']+1;        
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



<h1> Modifier un article </h1>
<div class="row">
   
        <form method="post" action="" class="col-12 col-md-6">
        
            <div class="form-group">
                <label for="title">Modifier le titre :</label>
                <input value="<?=$previous_title?>" type="text" required class="form-control" id="title" name="title" placeholder="Entrer le titre">
            </div>
            <div class="form-group">
                <label for="description">Modifier la description :</label>
                <textarea class="form-control" id="description" name="description" required rows="6" placeholder="Saisir une description"><?=$previous_descr?></textarea>
            </div>
            <div class="form-group">
                <label for="date">Modifier la date :</label>
                <input value="<?=$previous_date?>" type="date" min="1970-01-01" max="<?php echo date('Y-m-d'); ?>" required class="form-control" id="date" name="date" placeholder="Sasir une date">
            </div>
            <button type="submit" class="button" name="submit">Valider</button>
        </form>
    </div>

</body>
</html>

