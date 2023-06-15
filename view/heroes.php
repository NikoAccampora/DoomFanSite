<?php
require_once '../controller/setmessage.controller.php';
if (!isset($_SESSION)) {
  session_start();
}
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
		<h1 style="font-size: 300%">Heroes</h1>
		<hr>
		<p style="font-size:150%;">Saving the world, one bullet at a time.</p>
        <h2><a href="./newhero.php">New Hero</a></h2>
        <h4><a href="./home.php">Return to Home</a></h4>
    </center>
<!--MESSAGE SESSION DISPLAY AREA DECLARATION-->
    <?php
   if (isset($_SESSION['success'])) {
       ?>
        <h3 class="text-success"><?=$_SESSION['success']?></h3>
        <?php
        unset($_SESSION['success']);
   } else if (isset($_SESSION['error'])) {
    ?>
    <h3 class="text-danger"><?=$_SESSION['error']?></h3>
    <?php
    unset($_SESSION['error']);
}
?>
<!--MESSAGE SESSION DISPLAY AREA DECLARATION-->


    <hr>
 <?php   require_once '../repository/hero.repository.php';
$heroRepository = new HeroRepository();
$heroes = $heroRepository->getHero();



require_once '../repository/weapon.repository.php';
require_once '../model/weapon.class.php';

$weaponRepository = new WeaponRepository();
$weapons = $weaponRepository->getWeapon();

foreach ($heroes as $hero) {



    ?>
    <div>

    <img src="<?=$hero->image?>"; width="10%" height="10%" style="background-color: rgba(0,0,0,0.2); image-rendering: pixelated">

        <P><strong>Name: </strong><?=$hero->name?></P>
        <P><strong>Base Health: </strong><?=$hero->baseHealth?></P>
        <P><strong>Max Armor: </strong><?=$hero->maxArmor?></P>
        <P><strong>Speed: </strong><?=$hero->speed?></P>
        <P><strong>Starting weapon: </strong><?=$hero->weaponName?></P>
        
        <P><strong>--Bio--</strong></P>
        <p style="overflow-wrap: break-word; background-color: rgba(0,0,0,0.4);"> <?=$hero->bio?></p>
        
        <div>
        <a href="./edithero.php?id=<?=$hero->id?>" class="btn btn-primary">Edit</a>
        <a href="./deletehero.php?id=<?=$hero->id?>&name=<?=$hero->name?>" class="btn btn-danger">Delete</a>
        </div>

        <br>
        <img src="../data/image/div.png" height="10" width="1300">
    </div>
    <?php
}
?>
</body>
</html>