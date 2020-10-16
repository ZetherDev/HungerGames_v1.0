<?php

namespace hg;

use pocketmine\plugin\PluginBase;

/**
 * Class Loader
 * @package hg
 */
class Loader extends PluginBase
{

    /** @var string */
    const GAMES_FOLDER_NAME = 'games';

    public function onEnable()
    {
        $this->getLogger()->info("Plugin activated");

        /** Folder Config */
        @mkdir($this->getDataFolder());
        @mkdir($this->getDataFolder() . self::GAMES_FOLDER_NAME);
        $this->saveDefaultConfig();
    }
}