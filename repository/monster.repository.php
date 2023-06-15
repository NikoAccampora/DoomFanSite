<?php

require_once '../data/connection.class.php';
require_once '../model/monster.class.php';

class MonsterRepository {

    private $connection;

    public function __construct() {
        $this->connection = Connection::getInstance();
    }

    public function createMonster($monster) {
        $operation = $this->connection->prepare(
            'INSERT INTO monster (name, info, health, speed, missileType, missileDamage, meleeDamage, idWeapon, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)'
        );

        $operation->bindValue(1, $monster->name);
        $operation->bindValue(2, $monster->info);
        $operation->bindValue(3, $monster->health);
        $operation->bindValue(4, $monster->speed);
        $operation->bindValue(5, $monster->missileType);
        $operation->bindValue(6, $monster->missileDamage);
        $operation->bindValue(7, $monster->meleeDamage);
        $operation->bindValue(8, $monster->idWeapon);
        $operation->bindValue(9, $monster->image);

        return $operation->execute();
    }

    public function getMonster() {
        $operation = $this->connection->prepare(
            'SELECT monster.*, weapon.name as weaponName FROM monster
            LEFT JOIN weapon ON monster.idWeapon = weapon.id'
        );


        $result = $operation->execute();

        if ($result) {
            return $operation->fetchAll(PDO::FETCH_CLASS, 'Monster');
        } else {
            return null;
        }
    }

    public function editMonster($monster) {
        $operation = $this->connection->prepare(
            'UPDATE monster SET name = ?, 
            info = ?,
            health = ?,
            speed = ?,
            missileType = ?,
            missileDamage = ?,
            meleeDamage = ?,
            idWeapon = ?,
            image = ?
            WHERE id = ?'
        );

        $operation->bindValue(1, $monster->name);
        $operation->bindValue(2, $monster->info);
        $operation->bindValue(3, $monster->health);
        $operation->bindValue(4, $monster->speed);
        $operation->bindValue(5, $monster->missileType);
        $operation->bindValue(6, $monster->missileDamage);
        $operation->bindValue(7, $monster->meleeDamage);
        $operation->bindValue(8, $monster->idWeapon);
        $operation->bindValue(9, $monster->image);
        $operation->bindValue(10, $monster->id);

        return $operation->execute();
    }

    public function deleteMonster($id) {
        $operation = $this->connection->prepare(
            'DELETE FROM monster WHERE id = ?'
        );
        
        $operation->bindValue(1, $id);

        return $operation->execute();
    }
}