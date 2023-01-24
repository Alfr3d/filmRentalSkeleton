<?php

namespace Alfred\FilmRental\Framework;

use Alfred\FilmRental\Repository\ActorRepository;
use RuntimeException;

class DiContainer
{
  private array $entries = [];

  public function get(string $id)
  {
    if (!$this->has($id)) {
      throw new RuntimeException('Class ' . $id . 'not found in container.');
    }
    $entry = $this->entries[$id];

    return $entry($this);
  }

  public function has(string $id): bool
  {
    return isset($this->entries[$id]);
  }

  public function set(string $id, callable $callable): void
  {
    $this->entries[$id] = $callable;
  }

  public function loadDependencies()
  {
    $this->set(
      Router::class,
      function (DiContainer $container) {
        return new Router(
          $container->get(ActorRepository::class)
        );
      }
    );

    $this->set(
      ActorRepository::class,
      function (DiContainer $container) {
        return new ActorRepository();
      }
    );
  }
}
