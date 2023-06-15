<?php

require_once '../controller/setmessage.controller.php';

function checkError($message) {
    setError($message);
    header('location:../view/newhero.php');
}

$hero_id = $_POST['hero_id'];

if (isset($_POST['hero_name']) &&
    isset($_POST['hero_baseHealth']) &&
    isset($_POST['hero_maxArmor']) &&
    isset($_POST['hero_speed']) &&
    isset($_POST['hero_idWeapon'])) {

    $hero_name = $_POST['hero_name'];
    $hero_bio = $_POST['hero_bio'];
    $hero_baseHealth = $_POST['hero_baseHealth'];
    $hero_maxArmor = $_POST['hero_maxArmor'];
    $hero_speed = $_POST['hero_speed'];
    $hero_idWeapon = $_POST['hero_idWeapon'];
    $hero_image = $_POST['hero_image'];
    
    
    if (empty($hero_name)) {
        checkError('Name your hero!');
    } else if (strlen($hero_name) > 50) {
        checkError('Hero Nmae cant be more than 50 chars!!');
    } else if ($hero_baseHealth < 50) {
        checkError('hero health must be higher than 50!');
    } else if ($hero_baseHealth > 300) {
        checkError('hero health must be lower than 50!');
    } else if ($hero_maxArmor < 50) {
        checkError('hero armor must be higher than 50!');
    } else if ($hero_maxArmor > 300) {
        checkError('hero armor must be lower than 50!');
    } else if ($hero_speed < 0.5) {
        checkError('hero speed must be higher than 0.5!');
    } else if ($hero_speed > 5.0) {
        checkError('hero speed must be lower than 5.0!');
    } else {
        require_once '../model/hero.class.php';
        require_once '../repository/hero.repository.php';

        $hero = new Hero();
        $hero->id = $hero_id;
        $hero->name = $hero_name;
        $hero->bio = $hero_bio;
        $hero->baseHealth = $hero_baseHealth;
        $hero->maxArmor = $hero_maxArmor;
        $hero->speed = $hero_speed;
        $hero->idWeapon = $hero_idWeapon;
        $hero->image = $hero_image;
    
        $heroRepository = new HeroRepository();
        $result = $heroRepository->editHero($hero);
    
        if ($result) {
            setSuccess("Hero updated: $hero_name");
            header('location:../view/heroes.php');
        } else {
            setError("ERROR! Could not edit hero: $hero_name!");
        }
    }
} else {
    echo "ILLEGAL ACCESS";
}