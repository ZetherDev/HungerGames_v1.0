<?php

namespace hg\game;

use hg\Loader;
use hg\player\PlayerGame;
use pocketmine\utils\Config;

/**
 * Class GameManager
 * @package hg\game
 */
class GameManager
{

    /** @var Loader */
    private $plugin;

    /** @var Game[] */
    private $games = [];

    /** @var PlayerGame[] */
    private $player = [];

    /**
     * GameManager constructor.
     * @param Loader $plugin
     */
    public function __construct(Loader $plugin)
    {
        $this->plugin = $plugin;

        /** Run function loadGames */
        $this->loadGames();
    }

    /**
     * @return Loader
     */
    private function getPlugin(): Loader
    {
        return $this->plugin;
    }

    /**
     * @return Game[]
     */
    public function getGames(): array
    {
        return $this->games;
    }

    /**
     * @param string $level
     * @return bool
     */
    public function existGame(string $level): bool
    {
        if (isset($this->games[$level])) {
            return true; // exist game
        }
        return false; // not
    }

    /**
     * @param string $player
     * @param string $level
     * @param int $slots
     */
    public function createGame(string $player, string $level, int $slots = 12)
    {
        /** Create PlayerGame creator */
        $creator = new PlayerGame($level, $slots); // default mode = 'creator' and spawns[]
        /** Save PlayerGame in $player */
        $this->player[$player] = $creator;
    }

    /**
     * void
     */
    private function loadGames() {
        /** Check exist folder maps in data path */
        if (empty(($folder = $this->getPlugin()->getDataFolder() . Loader::GAMES_FOLDER_NAME)))
            return;

        foreach (scandir($folder) as $files) {
            if ($files !== '..' && $files !== '.') {
                $data = (new Config($this->getPlugin()->getDataFolder() . Loader::GAMES_FOLDER_NAME . DIRECTORY_SEPARATOR . $files))->getAll();

                /** Check exist folder map */
                if (file_exists(($folderMap = $this->getPlugin()->getServer()->getDataPath() . 'worlds' . DIRECTORY_SEPARATOR . $data['level']))) {
                    if (!is_dir($folderMap))
                        return;
                }

                /** Load Level */
                $this->getPlugin()->getServer()->loadLevel($data['level']);

                /** Create game */
                $this->games[$data['level']] = new Game($data['level'], $data['slots'], $data['spawns']);
            }
        }
    }
}