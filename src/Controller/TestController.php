<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\Psr18Client;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use TCGdex\TCGdex;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        TCGdex::$client = new Psr18Client();
        $tcgdex = new TCGdex("fr");
        $card = $tcgdex->fetchCard('136', 'swsh3');
        dd($card, $tcgdex->fetchSerie('swsh'));

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
