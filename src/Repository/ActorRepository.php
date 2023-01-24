<?php

namespace Alfred\FilmRental\Repository;

use Alfred\FilmRental\Framework\DbConnection;

class ActorRepository
{
  private function db()
  {
    $instance = DbConnection::getInstance();
    return $instance->getConnection();
  }


}
