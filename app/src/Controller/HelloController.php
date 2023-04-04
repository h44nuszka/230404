<?php

/**
 * Hello controller.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HelloController.
 */
#[Route('/hello')]
class HelloController extends AbstractController
{
    /**
     * Index action.
     *
     * @return Response HTTP response
     */
    #[Route(
        '',
        name: 'hello_index',
        methods: 'GET'
    )]
    public function index(): Response
    {
        return new Response('Hello World!');
    }
}