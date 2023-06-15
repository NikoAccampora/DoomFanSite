<?php

require_once '../repository/monster.repository.php';
require_once '../controller/setmessage.controller.php';

$repository = new MonsterRepository();
$result = $repository->deleteMonster($_POST['monster_id']);

$monster_name = $_POST['monster_name'];

if ($result) {
    setSuccess("Deleted monster: $monster_name");
    header('location:../view/monsters.php');
} else {
    setError("ERROR! Could not delete monster: $monster_name");
}