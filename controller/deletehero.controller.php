<?php

require_once '../repository/hero.repository.php';
require_once '../controller/setmessage.controller.php';

$repository = new HeroRepository();
$result = $repository->deleteHero($_POST['hero_id']);

$hero_name = $_POST['hero_name'];

if ($result) {
    setSuccess("Deleted hero: $hero_name");
    header('location:../view/heroes.php');
} else {
    setError("ERROR! Could not delete hero: $hero_name");
}