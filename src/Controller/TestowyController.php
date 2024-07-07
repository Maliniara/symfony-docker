<?php

declare(strict_types = 1);

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class TestowyController extends AbstractController
{
    #[Route('/testowy', name: 'testowy-index')]
    public function index(): Response
    {
        return new Response("Hello World!");
    }

}
