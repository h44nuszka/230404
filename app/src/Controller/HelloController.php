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
        '/{name}',
        name: 'hello_index',
        requirements: ['name' => '[A-Za-z]+'],
        defaults: ['name' => 'World!'],
        methods: 'GET',
    )]
    public function index(string $name): Response
    {
        return $this->render(
            'hello/index.html.twig', ['name' => $name]
        );
    }

}