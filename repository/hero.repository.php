<?php

require_once '../data/connection.class.php';
require_once '../model/hero.class.php';

class HeroRepository {

    private $connection;

    public function __construct() {
        $this->connection = Connection::getInstance();
    }

    public function createHero($hero) {
        $operation = $this->connection->prepare(
            'INSERT INTO hero (name, bio, baseHealth, maxArmor, speed, idWeapon, image) VALUES (?, ?, ?, ?, ?, ?, ?)'
        );

        $operation->bindValue(1, $hero->name);
        $operation->bindValue(2, $hero->bio);
        $operation->bindValue(3, $hero->baseHealth);
        $operation->bindValue(4, $hero->maxArmor);
        $operation->bindValue(5, $hero->speed);
        $operation->bindValue(6, $hero->idWeapon);
        $operation->bindValue(7, $hero->image);

        return $operation->execute();
    }

    public function getHero() {
        $operation = $this->connection->prepare(
            'SELECT hero.*, weapon.name as weaponName FROM hero
            LEFT JOIN weapon ON hero.idWeapon = weapon.id'
        );


        $result = $operation->execute();

        if ($result) {
            return $operation->fetchAll(PDO::FETCH_CLASS, 'Hero');
        } else {
            return null;
        }
    }

    public function editHero($hero) {
        $operation = $this->connection->prepare(
            'UPDATE hero SET name = ?, 
            bio = ?,
            baseHealth = ?,
            maxArmor = ?,
            speed = ?,
            idWeapon = ?,
            image = ?
            WHERE id = ?'
        );

        $operation->bindValue(1, $hero->name);
        $operation->bindValue(2, $hero->bio);
        $operation->bindValue(3, $hero->baseHealth);
        $operation->bindValue(4, $hero->maxArmor);
        $operation->bindValue(5, $hero->speed);
        $operation->bindValue(6, $hero->idWeapon);
        $operation->bindValue(7, $hero->image);
        $operation->bindValue(8, $hero->id);

        return $operation->execute();
    }

    public function deleteHero($id) {
        $operation = $this->connection->prepare(
            'DELETE FROM hero WHERE id = ?'
        );
        
        $operation->bindValue(1, $id);

        return $operation->execute();
    }
}