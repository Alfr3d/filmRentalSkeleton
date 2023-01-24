<?php

namespace Alfred\FilmRental\Framework;

class DbConnection
{
  private static $instance = null;
  private $conn;

  private $host = 'localhost:3306';
  private $user = 'root';
  private $password = 'password';
  private $name = 'film_rental';

  private function __construct()
  {
    $this->conn = new \PDO(
      "mysql:host=$this->host;dbname=$this->name",
      $this->user,
      $this->password,
      [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION],
    );
  }

  public static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new DbConnection();
    }

    return self::$instance;
  }

  public function getConnection()
  {
    return $this->conn;
  }
}
