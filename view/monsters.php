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
  body { background-image: url("../data/image/bg/bg3.png"); background-size: 100%;}
  <?php include '../data/css/style.css'; ?>
  </style>
<body>
    <center>
		<h1 style="font-size: 300%">MONSTERS</h1>
		<hr>
		<p style="font-size:150%;">Show no mercy, 'cause THEY won't!</p>
        <h2><a href="./newmonster.php">New Monster</a></h2>
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
 <?php   require_once '../repository/monster.repository.php';
$monsterRepository = new MonsterRepository();
$monsters = $monsterRepository->getMonster();



function checkMissileType($a) {
  switch($a) {
    case 'none': return '(No ranged attack)'; break;
    case 'hitscan': return 'Hitscan'; break;
    case 'projectile': return 'Projectiles'; break;
    case 'other': return 'Other'; break;
    case 'varied': return 'Varies'; break;
    default: return 'N/A'; break;
  }
}  

require_once '../repository/weapon.repository.php';
require_once '../model/weapon.class.php';

$weaponRepository = new WeaponRepository();
$weapons = $weaponRepository->getWeapon();

function checkWeaponDrop($a) {
    if ($a->idWeapon == null) {
        return 'None';
    } else return $a->weaponName;
  }

foreach ($monsters as $monster) {



    ?>
    <div>

    <P style="font-size: 150%"><?=$monster->name?></P>
    <img src="<?=$monster->image?>"; width="10%"  style="background-color: rgba(0,0,0,0.4); image-rendering: pixelated">

        <P><strong>Health: </strong><?=$monster->health?></P>
        <P><strong>speed: </strong><?=$monster->speed?></P>
        <P><strong>Ranged Attack: </strong><?=checkMissileType($monster->missileType)?> </P>
        <P><strong>Ranged Damage: </strong><?=$monster->missileDamage?></P>
        <P><strong>Melee Damage: </strong><?=$monster->meleeDamage?></P>
        <P><strong>Weapon drop: </strong><?=checkWeaponDrop($monster)?></P>
        
        <P><strong>--Info--</strong></P>
        <p style="overflow-wrap: break-word; background-color: rgba(0,0,0,0.4);"> <?=$monster->info?></p>
        
        <div>
        <a href="./editmonster.php?id=<?=$monster->id?>" class="btn btn-primary">Edit</a>
        <a href="./deletemonster.php?id=<?=$monster->id?>&name=<?=$monster->name?>" class="btn btn-danger">Delete</a>
        </div>

        <br>
        <img src="../data/image/div.png" height="10" width="1300">
    </div>
    <?php
}
?>
</body>
</html>