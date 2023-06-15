<?php

class Bdd extends PDO
{
    public $bdd;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
    try {
        $this->bdd = new PDO('mysql:host=localhost;dbname=olivboutique;charset=utf8', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
      } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
      }

      return $this->bdd;
    }

   
}