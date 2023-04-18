<?php
/**
 * Fizz-Buzz Controller.
 */

namespace App\Controller;

use App\Service\FizzBuzzService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FizzBuzzController.
 *
 * @Route(
 *     "/fizz-buzz"
 * )
 */
class FizzBuzzController extends AbstractController
{
    /**
     * Fizz-Buzz service.
     *
     * @var FizzBuzzService
     */
    private FizzBuzzService $fizzBuzzService;

    /**
     * FizzBuzzController constructor.
     *
     * @param FizzBuzzService $fizzBuzzService Fizz-Buzz service
     */
    public function __construct(FizzBuzzService $fizzBuzzService)
    {
        $this->fizzBuzzService = $fizzBuzzService;
    }

    /**
     * Index action.
     *
     * @param int $number User input
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     *
     * @Route(
     *     "/{number}",
     *     name="fizz-buzz_view",
     *     methods={"GET"},
     *     defaults={"number": 0},
     *     requirements={"number": "[0-9]{1,3}"},
     * )
     */
    public function view(int $number): Response
    {
        $result = $this->fizzBuzzService->execute($number);

        return $this->render(
            'fizz-buzz/view.html.twig',
            ['result' => $result]
        );
    }
}