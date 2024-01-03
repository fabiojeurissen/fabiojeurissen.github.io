<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RuneScapeController extends AbstractController
{
    /**
     * @Route("/rs/home", name="rs/home")
     * @return Response
     */
    public function homeAction(): Response
    {
        dump('here');
        exit;
        return $this->render('rs/home.html.twig');
    }
}
