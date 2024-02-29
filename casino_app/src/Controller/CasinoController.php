<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CasinoService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CasinoController extends AbstractController
{
    private CasinoService $casinoService;

    public function __construct(CasinoService $casinoService)
    {
        $this->casinoService = $casinoService;
    }

    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        $gameDetails = null;
        $gameId = $request->query->get('gameId');
        $page = 1;
        $pageSize = 24;
        $games = $this->casinoService->getGamesByPage($page, $pageSize);
        $totalGames = $this->casinoService->getTotalGamesCount();
        if ($gameId) {
            $gameDetails = $this->casinoService->getGameDetails($gameId);
        }

        return $this->render('casino/index.html.twig', [
            'games' => $games,
            'totalGames' => $totalGames,
            'gameDetails' => $gameDetails,
        ]);
    }


    /**
     * @Route("/search", name="game_search")
     */
    public function search(Request $request)
    {
        $page = $request->query->getInt('page', 1);
        $pageSize = 24;
        $searchTerm = $request->query->get('search', '');

        $games = $this->casinoService->getGamesByPage($page, $pageSize, $searchTerm);
        $totalGames = $this->casinoService->getTotalGamesCount($searchTerm);

        if ($request->isXmlHttpRequest()) {
            return new JsonResponse([
                'html' => $this->renderView('casino/search_results.html.twig', ['games' => $games]),
                'totalGames' => $totalGames
            ]);
        } else {
            return $this->render('casino/index.html.twig', [
                'games' => $games,
                'totalGames' => $totalGames
            ]);
        }
    }

    /**
     * @Route("/game", name="game_details")
     */
    public function getGameDetails(Request $request)
    {
        $gameId = $request->query->get('id');

        $gameDetail = $this->casinoService->getGameDetails($gameId);

        if ($request) {
            return $this->render('casino/game_details.html.twig', [
                'game' => $gameDetail
            ]);
        }
    }
}
