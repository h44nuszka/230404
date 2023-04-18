<?php
/**
 * Fizz-Buzz service interface.
 */

namespace App\Service;

/**
 * Interface FizzBuzzServiceInterface.
 */
interface FizzBuzzServiceInterface
{
    /**
     * Execute Fizz-Buzz.
     *
     * @param int $number Input number
     *
     * @return string Result string
     */
    public function execute(int $number): string;
}