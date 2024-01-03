<?php

namespace App\Controller;

use App\Entity\Wedding;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjaxWeddingController
{
    /**
     * @Route("/ajax/wedding", name="ajax_wedding")
     * @return Response
     */
    public function weddingAction(Request $request, EntityManagerInterface $entityManager): Response
    {
        $entityManager->persist(new Wedding($request->request->get('names'), $request->request->getBoolean('present')));
        $entityManager->flush();

        return new Response();
    }
}
