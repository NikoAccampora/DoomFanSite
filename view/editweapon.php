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
    <h1 style="font-size: 200%">EDIT WEAPON</h1>
		<hr>
		<p style="font-size:125%;">What's it missing?</p>
        <h4><a href="./weapons.php">Return to Weapons</a></h4>
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


    <form action="../controller/editweapon.controller.php" method="post">

     <input type="hidden" name="weapon_id" value="<?=$_GET['id']?>">

            <label class="form-label" for="weapon_name">Weapon Name?</label>
            <input type="text" name="weapon_name" id="weapon_name" maxlength="50" required>
            <br>
            <label class="form-label" for="weapon_name">Weapon Damage?</label>
            <input type="number" name="weapon_damage" id="weapon_damage" min="0" required>
            <br>
            <label class="form-label" for="weapon_ammoType">Ammo Type?</label>
                <select name="weapon_ammoType" id="weapon_ammoType" required>
                    <option value="none">None</option>
                    <option value="clip">Clip of Bullets</option>
                    <option value="shell">Buckshot shells</option>
                    <option value="rocket">Rockets</option>
                    <option value="cell">Energy Cells</option>
                    <option value="other">Other</option>
                </select>
                <br>

                <label class="form-label" for="weapon_attackType">Weapon Type?</label>
                <select name="weapon_attackType" id="weapon_attackType" required>
                    <option value="melee">Melee</option>
                    <option value="bullet">Bullet</option>
                    <option value="projectile">Projectile</option>
                    <option value="varied">Varied</option>
                    <option value="other">Other</option>
                </select>
                <br>

            <label class="form-label" for="weapon_refireDelay">Refire Delay?</label>
            <input type="number" name="weapon_refireDelay" id="weapon_refireDelay" min="1" max="255" required>
            <br>
            <label class="form-label" for="weapon_shotCount">Shot Count?</label>
            <input type="number" name="weapon_shotCount" id="weapon_shotCount" min="0" max="100" required>
            <br>

            <label class="form-label" for="weapon_image">Weapon Image?</label>
            <select name="weapon_image" id="weapon_image" required>
                    <option value="../data/image/weapon/pistol.png">Pistol</option>
                    <option value="../data/image/weapon/shotgun.png">Shotgun</option>
                    <option value="../data/image/weapon/chaingun.png">Chaingun</option>
                    <option value="../data/image/weapon/supershotgun.png">Super Shotgun</option>
                    <option value="../data/image/weapon/rocketlauncher.png">Rocket Launcher</option>
                    <option value="../data/image/weapon/plasmarifle.png">Plasma Rifle</option>
                    <option value="../data/image/weapon/chainsaw.png">Chainsaw</option>
                    <option value="../data/image/weapon/bfg9000.png">BFG 9000</option>
                    <option value="../data/image/weapon/gauntlets.png">Gauntlets</option>
                    <option value="../data/image/weapon/minizorcher.png">Mini Zorcher</option>
                </select>
                <br><br>
            <label class="form-label" for="weapon_info">Describe weapon?</label>
            <textarea name="weapon_info" id="weapon_info" rows="5" maxlength="500" class="form-control"></textarea>

            <input type="submit" value="Submit" class="btn btn-primary">
                    
    </form>
</body>
</html>