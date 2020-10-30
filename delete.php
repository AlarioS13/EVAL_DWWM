
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
<?php
            try{
                require_once("db.php");
                $id = $_GET["id"];

                $sql = "DELETE FROM posts WHERE id=$id";
                $stmt = $cnx->prepare($sql);
                $stmt-> bindParam(':id', $id);
                $stmt->execute();
                header('location:index.php');
            } catch (Exception $ex) {
                        die('Erreur : '.$ex->getMessage());
            }
?>

</body>
</html>