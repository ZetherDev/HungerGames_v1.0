<?php

namespace hg\game;

/**
 * Class Game
 * @package hg\game
 */
class Game
{

    /** @var string */
    private $levelName;
    /** @var int */
    private $slots = 12;
    /** @var array */
    private $spawns = [];

    /**
     * Game constructor.
     * @param string $levelName
     * @param int $slots
     * @param array $spawns
     */
    public function __construct(string $levelName, int $slots, $spawns = [])
    {
        $this->levelName = $levelName;
        $this->slots = $slots;
        $this->spawns = $spawns;
    }

    /**
     * @return string
     */
    public function getLevelName(): string
    {
        return $this->levelName;
    }

    /**
     * @return int
     */
    public function getSlots(): int
    {
        return $this->slots;
    }

    /**
     * @return array
     */
    public function getSpawns(): array
    {
        return $this->spawns;
    }
}