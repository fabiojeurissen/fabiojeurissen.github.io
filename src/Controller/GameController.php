<?php
/**
 * Author: Fabio
 * Date: 19/03/2021 22:21
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game")
     * @return Response
     */
    public function homeAction(): Response
    {
        return $this->render('game/game.html.twig');
    }
}
