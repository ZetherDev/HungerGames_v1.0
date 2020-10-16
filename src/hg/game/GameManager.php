<?php

namespace hg\game;

use hg\player\PlayerGame;

/**
 * Class GameManager
 * @package hg\game
 */
class GameManager
{

    const FOLDER_NAME = 'mapas';

    /** @var Game[] */
    private $games = [];

    /** @var PlayerGame[] */
    private $player = [];

    /**
     * @return Game[]
     */
    public function getGames(): array
    {
        return $this->games;
    }
}