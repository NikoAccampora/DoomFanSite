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
		<h1 style="font-size: 200%">CREATE NEW HERO</h1>
		<hr>
		<p style="font-size:125%;">A new player joins the fray?</p>
        <h4><a href="./heroes.php">Return to Heroes</a></h4>
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


    <form action="../controller/createhero.controller.php" method="post">
            <label class="form-label" for="hero_name">Hero Name?</label>
            <input type="text" name="hero_name" id="hero_name" maxlength="50" required>
            <br>
            <label class="form-label" for="hero_baseHealth">Hero health?</label>
            <input type="number" name="hero_baseHealth" id="hero_baseHealth" min="50" max="300" required>
            <br>
            <label class="form-label" for="hero_maxArmor">Max Armor?</label>
            <input type="number" name="hero_maxArmor" id="hero_maxArmor" min="50" max="300" required>
            <br>
            <label class="form-label" for="hero_speed">Hero speed?</label>
            <input type="number" name="hero_speed" id="hero_speed" step="0.01" min="0.50" max="5.0" required>
            <br>
            
            <label class="form-label" for="hero_idWeapon">Starter Weapon:</label>
            <?php
            // include repo
            // carre
            include_once '../repository/weapon.repository.php';

            $weaponRepository = new WeaponRepository();
            $weapons = $weaponRepository->getWeapon();
            ?>
                <select name="hero_idWeapon" id="hero_idWeapon">
                <?php foreach ($weapons as $weapon) {
                  ?> <option value="<?=$weapon->id?>"><?=$weapon->name?></option>
                <?php } ?>  
                </select>
            <br>

            <label class="form-label" for="hero_image">Hero Image?</label>
            <select name="hero_image" id="hero_image" required>
                    <option value="../data/image/hero/doom.png">Doom</option>
                    <option value="../data/image/hero/heretic.png">Heretic</option>
                    <option value="../data/image/hero/hexen1.png">Hexen Fighter</option>
                    <option value="../data/image/hero/hexen2.png">Hexen Cleric</option>
                    <option value="../data/image/hero/hexen3.png">Hexen Mage</option>
                    <option value="../data/image/hero/strife.png">Strife</option>
                    <option value="../data/image/hero/blaze.png">Trailblazer</option>
                    <option value="../data/image/hero/chex.png">Chex Quest</option>
                </select>
                <br><br>

            <label class="form-label" for="hero_bio">Describe hero?</label>
            <textarea name="hero_bio" id="hero_bio" rows="5" maxlength="500" class="form-control"></textarea>

            <input type="submit" value="Submit" class="btn btn-primary">
                    
    </form>
</body>
</html>