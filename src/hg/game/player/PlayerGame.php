<?php

namespace hg\player;

use pocketmine\math\Vector3;

/**
 * Class Creator
 * @package hg\game\others
 */
class PlayerGame
{

    /** @var string */
    private $levelMap;
    /** @var int */
    private $slots = 12;
    /** @var array */
    private $spawns = [];

    /** @var string */
    private $mode = 'creator';

    /**
     * Creator constructor.
     * @param string $levelMap
     * @param int $slots
     * @param string $mode
     * @param array $spawns
     */
    public function __construct(string $levelMap, int $slots = 12, string $mode = 'creator', array $spawns = [])
    {
        $this->levelMap = $levelMap;
        $this->slots = $slots;
        $this->mode = $mode;

        if ($mode !== 'creator') {
            $this->spawns = $spawns;
        }
    }

    /**
     * @return string
     */
    public function getLevelMap(): string
    {
        return $this->levelMap;
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
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
    }

    /**
     * @param int $slots
     */
    public function setSlots(int $slots)
    {
        $this->slots = $slots;
    }

    /**
     * @param int $slot
     * @param Vector3 $vector3
     */
    public function setSpawn(int $slot, Vector3 $vector3)
    {
        $this->slots[$slot] = $vector3;
    }
}