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
    <h1 style="font-size: 200%">EDIT MONSTER</h1>
		<hr>
		<p style="font-size:125%;">Isn't it bad enough already?</p>
        <h4><a href="./monsters.php">Return to Monsters</a></h4>
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


    <form action="../controller/editmonster.controller.php" method="post">

     <input type="hidden" name="monster_id" value="<?=$_GET['id']?>">

            <label class="form-label" for="monster_name">Monster Name?</label>
            <input type="text" name="monster_name" id="monster_name" maxlength="50" required>
            <br>
            <label class="form-label" for="monster_health">Monster health?</label>
            <input type="number" name="monster_health" id="monster_health" min="1" required>
            <br>
            <label class="form-label" for="monster_speed">Monster speed?</label>
            <input type="number" name="monster_speed" id="monster_speed" min="0" required>
            <br>
            <label class="form-label" for="monster_missileType">Missile Type?</label>
                <select name="monster_missileType" id="monster_missileType" required>
                    <option value="none">None</option>
                    <option value="hitscan">Hitscan</option>
                    <option value="projectile">Projectile</option>
                    <option value="varied">Varied</option>
                    <option value="other">Other</option>
                </select>
                <br>

            <label class="form-label" for="monster_missileDamage">Missile Damage?</label>
            <input type="number" name="monster_missileDamage" id="monster_missileDamage" min="0" required>
            <br>
            <label class="form-label" for="monster_meleeDamage">Melee Damage?</label>
            <input type="number" name="monster_meleeDamage" id="monster_meleeDamage" min="0" required>
            <br>
            <label class="form-label" for="monster_idWeapon">Weapon drop?</label>
            <?php
            include_once '../repository/weapon.repository.php';

            $weaponRepository = new WeaponRepository();
            $weapons = $weaponRepository->getWeapon();
            ?>
                <select name="monster_idWeapon" id="monster_idWeapon">
                <option value="none">(No weapon drop)</option>
                <?php foreach ($weapons as $weapon) {
                  ?> <option value="<?=$weapon->id?>"><?=$weapon->name?></option>
                <?php } ?>  
                </select>
                <br>

            <label class="form-label" for="monster_image">Monster Image?</label>
            <select name="monster_image" id="monster_image" required>
                    <option value="../data/image/monster/zombieman.png">Zombieman</option>
                    <option value="../data/image/monster/shotgunguy.png">Shotgun Guy</option>
                    <option value="../data/image/monster/chaingunguy.png">Heavy Weapon Dude</option>
                    <option value="../data/image/monster/doomimp.png">Imp</option>
                    <option value="../data/image/monster/demon.png">Pinky Demon</option>
                    <option value="../data/image/monster/cacodemon.png">Cacodemon</option>
                    <option value="../data/image/monster/painelemental.png">Pain Elemental</option>
                    <option value="../data/image/monster/lostsoul.png">Lost Soul</option>
                    <option value="../data/image/monster/hellknight.png">Hellknight</option>
                    <option value="../data/image/monster/baronofhell.png">Baron of Hell</option>
                    <option value="../data/image/monster/revenant.png">Revenant</option>
                    <option value="../data/image/monster/arachnotron.png">Arachnotron</option>
                    <option value="../data/image/monster/fatso.png">Mancubus</option>
                    <option value="../data/image/monster/archvile.png">Arch Vile</option>
                    <option value="../data/image/monster/spidermastermind.png">Spider Mastermind</option>
                    <option value="../data/image/monster/cyberdemon.png">Cyberdemon</option>
                </select>
                <br><br>

            <label class="form-label" for="monster_info">Describe monster?</label>
            <textarea name="monster_info" id="monster_info" rows="5" maxlength="500" class="form-control"></textarea>

            <input type="submit" value="Submit" class="btn btn-primary">
                    
    </form>
</body>
</html>