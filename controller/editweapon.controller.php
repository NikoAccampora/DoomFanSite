<?php
require_once '../controller/setmessage.controller.php';

    $weapon_id = $_POST['weapon_id'];

    if (isset($_POST['weapon_name']) &&
    isset($_POST['weapon_damage']) &&
    isset($_POST['weapon_refireDelay']) &&
    isset($_POST['weapon_shotCount'])) {

    $weapon_name = $_POST['weapon_name'];
    $weapon_info = $_POST['weapon_info'];
    $weapon_ammoType = $_POST['weapon_ammoType'];
    $weapon_damage = $_POST['weapon_damage'];
    $weapon_attackType = $_POST['weapon_attackType'];
    $weapon_refireDelay = $_POST['weapon_refireDelay'];
    $weapon_shotCount = $_POST['weapon_shotCount'];
    $weapon_image = $_POST['weapon_image'];

    if (empty($weapon_name)) {
        checkError('Name your weapon!');
    } else if (strlen($weapon_name) > 50) {
        checkError('Weapon Nmae cant be more than 50 chars!!');
    } else if (empty($weapon_damage)) {
        checkError('give your weapon a damage!');
    } else if (empty($weapon_refireDelay)) {
        checkError('give your weapon a refire!!');
    } else if (empty($weapon_shotCount)) {
        checkError('give your weapon a shotcount!!');
    } else {

        require_once '../model/weapon.class.php';
        require_once '../repository/weapon.repository.php';

        $weapon = new Weapon();
        $weapon->id = $weapon_id;
        $weapon->name = $weapon_name;
        $weapon->info = $weapon_info;
        $weapon->damage = $weapon_damage;
        $weapon->ammoType = $weapon_ammoType;
        $weapon->attackType = $weapon_attackType;
        $weapon->refireDelay = $weapon_refireDelay;
        $weapon->shotCount = $weapon_shotCount;
        $weapon->image = $weapon_image;
    
        $weaponRepository = new WeaponRepository();
        $result = $weaponRepository->editWeapon($weapon);
    
        if ($result) {
            setSuccess("Weapon updated: $weapon_name");
            header('location:../view/weapons.php');
        } else {
            setError("ERROR! Could not edit weapon: $weapon_name!");
        }
    }
}