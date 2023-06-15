<?php
require_once '../controller/setmessage.controller.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOOM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
  body { background-image: url("../data/image/bg/bg1.png"); background-size: 100%;}
  <?php include '../data/css/style.css'; ?>
  </style>
<body>
    <center>
<?php 
$hero_name = $_GET['name'];
?>

<h1 style="font-size: 150%">Are you sure you want to delete: <t><?=$hero_name?></t>?</h1>
		<hr>
        <form action="../controller/deletehero.controller.php" method="post">
        <input type="hidden" name="hero_id" value="<?=$_GET['id']?>">
        <input type="hidden" name="hero_name" value="<?=$_GET['name']?>">
        <input type="submit" value="Yes" class="btn btn-danger">
        <a href="./heroes.php" class="btn btn-primary">No</a>
        </form>
    </center>
    
</body>
</html>