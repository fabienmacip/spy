<?php

trait Modele
{
    private $pdo = null;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=spy;charset=utf8', 'root', '');
        } catch (PDOException $e) {
            exit('Erreur : '.$e->getMessage());
        }
    }
}