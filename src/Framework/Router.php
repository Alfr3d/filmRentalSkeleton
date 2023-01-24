<?php

namespace Alfred\FilmRental\Framework;

class Router
{
  public function process(string $route, array $request = null)
  {
    switch ($route) {
      case '/':
        die('homepage');
        break;
      case '/actor':
        die('actor');
        break;
      default:
        die('notFound');
        break;
    }
  }
}
