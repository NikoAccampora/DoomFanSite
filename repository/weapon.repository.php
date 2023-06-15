<?php

require_once '../data/connection.class.php';
require_once '../model/weapon.class.php';

class WeaponRepository {

    private $connection;

    public function __construct() {
        $this->connection = Connection::getInstance();
    }

    public function createWeapon($weapon) {
        $operation = $this->connection->prepare(
            'INSERT INTO weapon (name, info, damage, ammoType, attackType, shotCount, refireDelay, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)'
        );

        $operation->bindValue(1, $weapon->name);
        $operation->bindValue(2, $weapon->info);
        $operation->bindValue(3, $weapon->damage);
        $operation->bindValue(4, $weapon->ammoType);
        $operation->bindValue(5, $weapon->attackType);
        $operation->bindValue(6, $weapon->shotCount);
        $operation->bindValue(7, $weapon->refireDelay);
        $operation->bindValue(8, $weapon->image);

        return $operation->execute();
    }

    public function getWeapon() {
        $operation = $this->connection->prepare(
            'SELECT * FROM weapon'
        );


        $result = $operation->execute();

        if ($result) {
            return $operation->fetchAll(PDO::FETCH_CLASS, 'Weapon');
        } else {
            return null;
        }
    }

    public function editWeapon($weapon) {
        $operation = $this->connection->prepare(
            'UPDATE weapon SET name = ?, 
            info = ?,
            damage = ?,
            ammoType = ?,
            attackType = ?,
            shotCount = ?,
            refireDelay = ?,
            image = ?
            WHERE id = ?'
        );

        $operation->bindValue(1, $weapon->name);
        $operation->bindValue(2, $weapon->info);
        $operation->bindValue(3, $weapon->damage);
        $operation->bindValue(4, $weapon->ammoType);
        $operation->bindValue(5, $weapon->attackType);
        $operation->bindValue(6, $weapon->shotCount);
        $operation->bindValue(7, $weapon->refireDelay);
        $operation->bindValue(8, $weapon->image);
        $operation->bindValue(9, $weapon->id);

        return $operation->execute();
    }

    public function deleteWeapon($id) {
        $operation = $this->connection->prepare(
            'DELETE FROM weapon WHERE id = ?'
        );
        
        $operation->bindValue(1, $id);

        return $operation->execute();
    }
}