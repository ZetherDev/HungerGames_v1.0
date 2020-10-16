<?php

namespace hg\player;

use pocketmine\math\Vector3;

/**
 * Class Creator
 * @package hg\game\others
 */
class PlayerGame
{

    /** @var string|null */
    private $levelMap;
    /** @var int */
    private $slots; // Default is 12 slots
    /** @var array */
    private $spawns = [];

    /** @var string */
    private $mode;

    /**
     * Creator constructor.
     * @param string $levelMap
     * @param int $slots
     * @param string $mode
     * @param array $spawns
     */
    public function __construct(string $levelMap, int $slots, string $mode = 'creator', array $spawns = [])
    {
        $this->levelMap = $levelMap;
        $this->slots = $slots;
        $this->mode = $mode;

        if ($mode !== 'creator') {
            $this->spawns = $spawns;
        }
    }

    /**
     * @return string|null
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

    public function save()
    {
        if ($this->getLevelMap() == null)
            return "The map was not selected";

        if (count($this->getSpawns()) < $this->getSlots())
            return "You have not placed all the spawns";

        return [
            'level' => $this->getLevelMap(),
            'slots' => $this->getSlots(),
            'spawns' => $this->getSpawns()
        ];
    }
}