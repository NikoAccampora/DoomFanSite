<?php

require_once '../repository/weapon.repository.php';
require_once '../controller/setmessage.controller.php';

$repository = new WeaponRepository();
$result = $repository->deleteWeapon($_POST['weapon_id']);

$weapon_name = $_POST['weapon_name'];

if ($result) {
    setSuccess("Deleted weapon: $weapon_name");
    header('location:../view/weapons.php');
} else {
    setError("ERROR! Could not delete weapon: $weapon_name");
}