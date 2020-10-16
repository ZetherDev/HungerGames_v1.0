<?php

namespace hg\game;

use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\Server;

/**
 * Class Game
 * @package hg\game
 */
class Game
{

    /** @var int */
    const STATUS_WAITING = 0;
    /** @var int */
    const STATUS_STARTING = 1;
    /** @var int */
    const STATUS_RUNNING = 2;
    /** @var int */
    const STATUS_DEATHMATCH = 3;
    /** @var int */
    const STATUS_WINNER = 4;

    /** @var string */
    private $levelName;
    /** @var int */
    private $slots;
    /** @var array */
    private $spawns;

    /** @var int */
    private $status = self::STATUS_WAITING;

    /** @var int */
    private $cooldown = 30;
    /** @var float|int */
    private $time = 8 * 60;
    /** @var int */
    private $deathmatch = 10;

    /** @var int */
    private $border = 100;

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

        $this->getLevel()->setTime(1200);
        $this->getLevel()->stopTime();
    }

    /**
     * @return string
     */
    public function getLevelName(): string
    {
        return $this->levelName;
    }

    public function getLevel(): Level
    {
        return Server::getInstance()->getLevelByName($this->getLevelName());
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

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getBorder(): int
    {
        return $this->border;
    }

    /**
     * @param int $slot
     * @return false|Vector3
     */
    public function getSpawn(int $slot = 1)
    {
        if (isset($this->spawns[$slot])) {
            $spawn = $this->spawns[$slot];
            return new Vector3($spawn[0], $spawn[1], $spawn[2]);
        }
        return false;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
    }
}