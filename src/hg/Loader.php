<?php

namespace hg;

use pocketmine\plugin\PluginBase;

/**
 * Class Loader
 * @package hg
 */
class Loader extends PluginBase {

    const FOLDER_MAPS = 'mapas';

    public function onEnable()
    {
        $this->getLogger()->info("Plugin activated");

        /** Folder Config */
        @mkdir($this->getDataFolder());
        @mkdir($this->getDataFolder() . self::FOLDER_MAPS);
        $this->saveDefaultConfig();
    }
}