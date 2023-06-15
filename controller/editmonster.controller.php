<?php
require_once '../controller/setmessage.controller.php';

    $monster_id = $_POST['monster_id'];

    if (isset($_POST['monster_name']) &&
    isset($_POST['monster_health'])) {

        $monster_name = $_POST['monster_name'];
        $monster_info = $_POST['monster_info'];
        $monster_health = $_POST['monster_health'];
        $monster_speed = $_POST['monster_speed'];
        $monster_missileType = $_POST['monster_missileType'];
        $monster_missileDamage = $_POST['monster_missileDamage'];
        $monster_meleeDamage = $_POST['monster_meleeDamage'];
        $monster_idWeapon = $_POST['monster_idWeapon'];
        $monster_image = $_POST['monster_image'];

        if (empty($monster_name)) {
            checkError('Name your monster!');
        } else if (strlen($monster_name) > 50) {
            checkError('Monster Nmae cant be more than 50 chars!!');
        } else if (empty($monster_health)) {
            checkError('give your monster a damage!');
        } else {

            require_once '../model/monster.class.php';
            require_once '../repository/monster.repository.php';

            $monster = new Monster();
            $monster->id = $monster_id;
            $monster->name = $monster_name;
            $monster->info = $monster_info;
            $monster->health = $monster_health;
            $monster->speed = $monster_speed;
            $monster->missileType = $monster_missileType;
            $monster->missileDamage = $monster_missileDamage;
            $monster->meleeDamage = $monster_meleeDamage;
            
            if ($monster_idWeapon == 'none') {
                $monster_idWeapon = null;
            }
        
            $monster->idWeapon = $monster_idWeapon;
            $monster->image = $monster_image;
    
            $monsterRepository = new MonsterRepository();
            $result = $monsterRepository->editMonster($monster);
    
           
        if ($result) {
            setSuccess("Monster updated: $monster_name");
            header('location:../view/monsters.php');
        } else {
            setError("ERROR! Could not edit monster: $monster_name!");
        }
    }
}