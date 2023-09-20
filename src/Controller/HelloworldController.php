<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloworldController extends AbstractController
{
    #[Route('/emma', name: 'app_public_helloword')]
    public function index(): Response
    {
        return $this->render('helloworld_controller_php/index.html.twig', [
            'nom' => 'emma',

        ]);
    }

}
