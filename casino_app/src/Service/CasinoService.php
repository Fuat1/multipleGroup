<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Model\Casino;

class CasinoService
{
    private HttpClientInterface $client;
    private $allGames = null;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getGames(): array
    {
        if ($this->allGames === null) {
            $response = $this->client->request('GET', 'https://casino-games-api.united-remote.dev/games');
            $gamesData = $response->toArray();
            foreach ($gamesData as $gameData) {
                $game = new Casino();
                $game->setId($gameData['id'])
                    ->setName($gameData['name'])
                    ->setProvider($gameData['provider'])
                    ->setImage($gameData['icon_2']);
                $this->allGames[] = $game;
            }
        }
        return $this->allGames;
    }


    public function getGameDetails($id)
    {
        $url = 'https://casino-games-api.united-remote.dev/game/' . $id;

        $response = $this->client->request('GET', $url);
        $gameDetails = $response->toArray();

        return $gameDetails;
    }


    public function getGamesByPage(int $page, int $pageSize, $searchTerm = ''): array
    {
        $this->getGames();

        $filteredGames = [];
        if (!empty($searchTerm)) {
            foreach ($this->allGames as $game) {
                if (stripos($game->getName(), $searchTerm) !== false) {
                    $filteredGames[] = $game;
                }
            }
        } else {
            $filteredGames = $this->allGames;
        }

        $offset = ($page - 1) * $pageSize;
        return array_slice($filteredGames, $offset, $pageSize);
    }

    public function getTotalGamesCount($searchTerm = ''): int
    {
        if (!empty($searchTerm)) {
            $filteredGames = array_filter($this->allGames, function ($game) use ($searchTerm) {
                return stripos($game->getName(), $searchTerm) !== false;
            });
            return count($filteredGames);
        }
        $this->getGames();
        return count($this->allGames);
    }
}
