<?php

namespace App\Controller\Quiz;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizController extends AbstractController
{
    /**
     * @Route("/quiz", name="quiz")
     * @IsGranted("ROLE_USER")
     * @return Response
     */
    public function homeAction(): Response
    {
        return new Response('Quiz');
    }

    /**
     * @Route("/quiz/manage", name="quiz_manage")
     * @IsGranted("ROLE_ADMIN")
     * @return Response
     */
    public function manageAction(): Response
    {
        return new Response('Beheer Quiz');
    }
}
