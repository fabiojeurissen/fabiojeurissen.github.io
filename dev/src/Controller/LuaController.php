<?php
/**
 * Author: Fabio
 * Date: 30/12/2020 23:55
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;

class LuaController extends AbstractController
{
    /**
     * @Route("/lua/{fileName}", name="lua_file")
     * @param KernelInterface $kernel
     * @param Request         $request
     * @param string          $fileName
     * @return Response
     */
    public function luaAction(KernelInterface $kernel, Request $request, string $fileName): Response
    {
        $luaDir = $kernel->getProjectDir() . '/lua';
        $filePath = $luaDir . '/' . $fileName . '.lua';

        if (file_exists($filePath)) {
            return new Response(file_get_contents($filePath));
        }

        return new Response('File not found');
    }
}
