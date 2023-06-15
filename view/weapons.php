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
  body { background-image: url("../data/image/bg/bg2.png"); background-size: 100%;}
  <?php include '../data/css/style.css'; ?>
  </style>
<body>
    <center>
		<h1 style="font-size: 300%">WEAPONS</h1>
		<hr>
		<p style="font-size:150%;">Would you rather use harsh language?</p>
        <h2><a href="./newweapon.php">New Weapon</a></h2>
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
 <?php   require_once '../repository/weapon.repository.php';
$weaponRepository = new WeaponRepository();
$weapons = $weaponRepository->getWeapon();

function checkAmmoType($a) {
  switch($a) {
    case 'none': return 'None'; break;
    case 'clip': return 'Clip of Bullets'; break;
    case 'shell': return 'Buckshot Shells'; break;
    case 'rocket': return 'Rockets'; break;
    case 'cell': return 'Energy Cells'; break;
    default: return 'None'; break;
  }
}  

function checkAttackType($a) {
  switch($a) {
    case 'melee': return 'Melee Attack'; break;
    case 'bullet': return 'Bullets'; break;
    case 'projectile': return 'Projectiles'; break;
    case 'other': return 'Other'; break;
    case 'varied': return 'Varies'; break;
    default: return 'None'; break;
  }
}  
foreach ($weapons as $weapon) {

    ?>
    <div>
    
    <P style="font-size: 150%"><?=$weapon->name?></P>
    <img src="<?=$weapon->image?>"; style="background-color: rgba(0,0,0,0.2); image-rendering: pixelated; height:40px;">

      
        <P><strong>Damage Base: </strong><?=$weapon->damage?></P>
        <P><strong>Ammo used: </strong><?=checkAmmoType($weapon->ammoType)?> </P>
        <P><strong>Fire mode: </strong><?=checkAttackType($weapon->attackType)?> </P>
        <P><strong>Refire delay: </strong><?=$weapon->refireDelay?> tics</P>
        <P><strong>Shots per attack: </strong><?=$weapon->shotCount?></P>
        
        <P><strong>--Info--</strong></P>
        <p style="overflow-wrap: break-word; background-color: rgba(0,0,0,0.4);"> <?=$weapon->info?></p>

        <div>
        <a href="./editweapon.php?id=<?=$weapon->id?>" class="btn btn-primary">Edit</a>
        <a href="./deleteweapon.php?id=<?=$weapon->id?>&name=<?=$weapon->name?>" class="btn btn-danger">Delete</a>
        </div>


        <br>
        <img src="../data/image/div.png" height="10" width="1300">
    </div>
    <?php
}
?>
</body>
</html>